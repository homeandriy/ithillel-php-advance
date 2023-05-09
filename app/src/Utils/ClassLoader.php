<?php

namespace Homeandriy\Ithillel\Utils;

class ClassLoader
{
    private string $rootPath;

    public function __construct(string $rootPath)
    {
        $this->rootPath = $rootPath;
        spl_autoload_register([$this, 'load']);
    }

    /**
     * @param  string  $className  classname with namespace
     *
     * @return void
     */
    private function load(string $className): void
    {
        // Remove first 2 elements in namespace
        $rawPath = explode('\\', $className);
        $rawPath = $part = array_splice($rawPath, 2,);

        // Prepare path
        $preparePath = implode(DIRECTORY_SEPARATOR, $rawPath);
        $filePath    = $this->rootPath . '/src/' . $preparePath . '.php';
        /**
         * Можна ще погратись з великою/малою буквою, але в даному випадку це не потрібно
         */
        // Clear memory
        unset($rawPath, $preparePath);

        // Check file
        if ( ! file_exists($filePath)) {
            // Даємо шанс іншим автолоадерам виконати свою роботу
            // Помилку тут викликати неможливо
            return;
        }
        include_once $filePath;
    }
}
