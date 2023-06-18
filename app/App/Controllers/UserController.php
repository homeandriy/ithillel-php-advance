<?php

namespace App\Controllers;

use App\Helpers\Session;
use App\Models\User;
use App\Services\Users\CreateService;
use App\Services\Users\UserService;
use App\Validators\Auth\SignUpValidator;
use App\Validators\UserValidator;

class UserController extends \Core\Controller
{

    public function before(string $action): bool
    {
        if (!Session::userIsAdmin()) {
            redirect('/');
        }
        return parent::before($action);
    }

    public function index()
    {
        view(
            'admin/users/index',
            [
                'users' => User::all()
            ]
        );
    }

    public function show(int $id)
    {
        view('admin/users/show', ['user' => User::find($id)]);
    }

    public function create()
    {
        view('admin/users/create');
    }

    public function store(): void
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        if (isset($fields['is_admin'])) {
            $fields['is_admin'] = User::USER_ADMIN;
        } else {
            $fields['is_admin'] = User::USER_CLIENT;
        }
        $validator = new UserValidator();

        if ($validator->validate($fields) && CreateService::call($fields)) {
            redirect('admin/users');
        }
        view('admin/users/create', $this->getErrors($fields, $validator));
    }

    public function edit(int $id): void
    {
        view('admin/users/edit', ['user' => User::find($id)]);
    }

    public function update(int $id): void
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new UserValidator();
        $fields['id'] = $id;

        if (UserService::update($validator, $fields)) {
            Session::notify('success', 'User data was success update!');
            redirect("/admin/user/" . $id . "/edit");
        }
        $errors = $this->getErrors($fields, $validator);
        $errors['user'] = User::find($id);
        view('admin/users/edit', $errors);
    }

    public function destroy(int $id)
    {
    }
}
