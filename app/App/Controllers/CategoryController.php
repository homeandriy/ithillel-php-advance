<?php

namespace App\Controllers;

use App\Helpers\Session;
use App\Models\Category;
use App\Services\CategoryService;
use App\Validators\CategoryValidator;

class CategoryController extends \Core\Controller
{
    public function before(string $action): bool
    {
        if(!Session::userIsAdmin()) {
            redirect('/');
        }

        return parent::before($action);
    }

    public function index()
    {
        view(
            'admin/categories/index',
            [
                'categories' => Category::all()
            ]
        );
    }

    public function show(int $id)
    {
        view('admin/categories/show', ['category' => Category::find($id)]);
    }

    public function create()
    {
        view('admin/categories/create');
    }

    public function store()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new CategoryValidator();
        if (CategoryService::create($validator, $fields)) {
            Session::notify('success', 'Category was created!');
            redirect("/admin/categories");
        }

        view('admin/categories/create', $this->getErrors($fields, $validator));
    }

    public function edit(int $id)
    {
        view('admin/categories/edit', ['category' => Category::find($id)]);
    }

    public function update(int $id): void
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new CategoryValidator();
        if (CategoryService::update($validator, $fields)) {
            Session::notify('success', 'Category was success update!');
            redirect("/admin/category/" . $fields['id'] . "/edit");
        }
        $errors = $this->getErrors($fields, $validator);
        $errors['product'] = Category::find($id);
        view('admin/categories/edit', $errors);
    }

    public function destroy(int $id): void
    {
        // TODO move products in this category to default
        $res = CategoryService::destroy($id);
        if ($res) {
            Session::notify('success', 'Category was deleted!');
            redirect("/admin/categories");
        }
        Session::notify('error', 'Some problem with delete Category!');
        redirect("/admin/categories");
    }
}
