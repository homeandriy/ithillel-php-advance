<?php

namespace App\Controllers;

use App\Helpers\Session;
use App\Models\User;
use App\Services\Users\CreateService;
use App\Services\Users\VerifyService;
use App\Validators\Auth\SignUpValidator;
use App\Validators\Auth\VerifyValidator;
use Core\Controller;
use Core\Router;

class AuthController extends Controller
{
    public function login()
    {
        if (User::auth()) {
            redirect('/');
        }
        $params = [];

        if (!empty($_SESSION['login_errors'])) {
            $params['errors'] = $_SESSION['login_errors'];
            unset($_SESSION['login_errors']);
        }
        view('auth/login', $params);
    }

    public function logout()
    {
        if (!Router::$isAjax) {
            return dd('Route call only ajax');
        }
        VerifyService::logout();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['redirect' => 'login']);
    }

    public function register()
    {
        if (User::auth()) {
            redirect('/');
        }

        $params = [];
        // TODO move to FlashService
        if (!empty($_SESSION['register_errors'])) {
            $params['errors'] = $_SESSION['register_errors'];
            unset($_SESSION['register_errors']);
        }

        view('auth/register', $params);
    }

    public function signup()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new SignUpValidator();

        if ($validator->validate($fields) && CreateService::call($fields)) {
            redirect('login');
        }
        $_SESSION['register_errors'] = $validator->getErrors();

        redirect('register');
    }

    public function verify()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new VerifyValidator();
        if ($validator->validate($fields) && VerifyService::login($fields)) {
            if(Session::userIsAdmin()) {
                redirect('/admin/dashboard');
            }
            redirect('/');
        }
        $_SESSION['login_errors'] = $validator->getErrors();
        redirect('login');
    }
}
