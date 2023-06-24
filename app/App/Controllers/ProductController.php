<?php

namespace App\Controllers;

use App\Helpers\Session;
use App\Models\Product;
use App\Services\ProductService;
use App\Validators\ProductValidator;
use Core\Controller;

class ProductController extends Controller
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
            'admin/products/index',
            [
                'products' => Product::all()
            ]
        );
    }

    public function show(int $id): void
    {
        view('admin/products/show', ['product' => Product::find($id)]);
    }

    public function create(): void
    {
        view('admin/products/create');
    }

    public function store(): void
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new ProductValidator();

        if (ProductService::create($validator, $fields)) {
            Session::notify('success', 'Product was created!');
            redirect("/admin/products");
        }

        view('admin/products/create', $this->getErrors($fields, $validator));
    }

    public function edit(int $id): void
    {
        view('admin/products/edit', ['product' => Product::find($id)]);
    }

    public function update(int $id): void
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new ProductValidator();
        $fields['id'] = $id;

        if (ProductService::update($validator, $fields)) {
            Session::notify('success', 'Product was success update!');
            redirect("/admin/product/" . $id . "/edit");
        }
        $errors = $this->getErrors($fields, $validator);
        $errors['product'] = Product::find($id);
        view('admin/products/edit', $errors);
    }

    public function destroy(int $id): void
    {
        $res = ProductService::destroy($id);
        if ($res) {
            Session::notify('success', 'Product was deleted!');
            redirect("/admin/products");
        }
        Session::notify('error', 'Some problem with delete product!');
        redirect("/admin/products");
    }
}
