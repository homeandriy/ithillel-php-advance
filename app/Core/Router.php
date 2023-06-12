<?php

namespace Core;

class Router
{
    protected static array $routes = [], $params = [], $uriParams = [];
    protected static array $convertTypes = [
        'd' => 'int',
        'D' => 'string'
    ];
    public static $isAjax = false;
    public static string $siteUrl = '';

    // notes/{id: \d+}/edit
    public static function add(string $route, array $params = []): void
    {
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z_]+):([^}]+)}/', '(?P<$1>$2)', $route);
        $route = "/^{$route}$/i";

        static::$routes[$route] = $params;
    }

    // notes/{id: \d+}/edit
    // notes/5/edit
    /**
     * [
     *  'controller' => '',
     *  'action' => '',
     *  'method' => 'GET',
     *  'id' => 5
     * ]
     * @param string $url
     * @return void
     * @throws \Exception
     */
    public static function dispatch(string $url): void
    {
        static::siteUrl();
        static::chekAjax();
        $url = static::removeQueryVariables($url);
        $url = trim($url, '/');
        if (static::match($url)) {
            static::checkRequestMethod();

            $controller = static::getController();
            $action = static::getAction($controller);
            if ($controller->before($action)) {
                call_user_func_array([$controller, $action], static::$params);
                $controller->after($action);
            }
        }
    }

    public static function chekAjax()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
            if (!isset($_SERVER['HTTP_REFERER']) || !str_contains($_SERVER['HTTP_REFERER'], self::siteUrl())) {
                static::$isAjax = false;
            }
            static::$isAjax = true;
        }
    }

    public static function siteUrl(): string
    {
        if (empty(static::$siteUrl)) {
            static::$siteUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http')
                . '://' . $_SERVER['SERVER_NAME'];
        }
        return static::$siteUrl;
    }

    /**
     * @throws \Exception
     */
    protected static function getAction(Controller $controller): string
    {
        $action = static::$params['action'] ?? null;

        if (!method_exists($controller, $action)) {
            throw new \Exception($controller::class . " doesn't have '{$action}'!");
        }
        unset(static::$params['action']);

        return $action;
    }

    /**
     * @throws \Exception
     */
    protected static function getController(): Controller
    {
        $controller = static::$params['controller'] ?? null;

        if (!class_exists($controller)) {
            throw new \Exception("Controller '{$controller}' doesn't exists!");
        }
        unset(static::$params['controller']);

        return new $controller();
    }

    /**
     * @throws \Exception
     */
    protected static function checkRequestMethod()
    {
        if (array_key_exists('method', static::$params)) {
            $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);

            if ($requestMethod !== strtolower(static::$params['method'])) {
                throw new \Exception("Method '{$_SERVER['REQUEST_METHOD']}' not allowed for this route");
            }

            unset(static::$params['method']);
        }
    }

    /**
     * @throws \Exception
     */
    protected static function match(string $url): bool
    {
        foreach (static::$routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                static::$params = static::setParams($route, $matches, $params);
                return true;
            }
        }

        throw new \Exception("Route [{$url}] not found", 404);
    }

    protected static function setParams(string $route, array $matches, array $params): array
    {
        preg_match_all('/\(\?P<[\w]+>\\\\(\w[\+]*)\)/', $route, $types);
        $matches = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

        if (!empty($types)) {
            $lastKey = array_key_last($types);
            $step = 0;
            $types[$lastKey] = str_replace('+', '', $types[$lastKey]);

            foreach ($matches as $name => $match) {
                settype($match, static::$convertTypes[$types[$lastKey][$step]]);
                $params[$name] = $match;
                $step++;
            }
        }

        return $params;
    }

    protected static function removeQueryVariables(string $url): string
    {
        $queryStr = parse_url($url, PHP_URL_QUERY);
        if (!empty($queryStr)) {
            parse_str($queryStr, $result);
            if (is_array($result) && !empty($result)) {
                static::$uriParams = $result;
            }
        }
        // notes/5/edit(?var=value&) => notes/5/edit
        return strtok($url, '?');
    }
}
