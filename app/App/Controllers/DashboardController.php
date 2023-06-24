<?php

namespace App\Controllers;

use App\Helpers\Session;
use Core\Controller;

class DashboardController extends Controller
{
    public function before(string $action): bool
    {
        if(!Session::userIsAdmin()) {
            redirect('/');
        }

        return parent::before($action);
    }

    public function index() {

        view('admin/dashboard/main');
    }
}
