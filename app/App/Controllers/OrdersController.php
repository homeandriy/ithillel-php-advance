<?php

namespace App\Controllers;

use App\Helpers\Session;
use App\Models\Order;
use App\Services\OrderService;
use App\Validators\OrderValidator;

class OrdersController extends \Core\Controller
{
    public function before(string $action): bool
    {
        if (!Session::userIsAdmin()) {
            redirect('/');
        }

        return parent::before($action);
    }

    public function index(): void
    {
        view(
            'admin/orders/index',
            [
                'orders' => Order::all()
            ]
        );
    }

    public function show(int $id): void
    {
        view('admin/orders/show', ['order' => Order::find($id)]);
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function edit(int $id)
    {
        view('admin/orders/edit', ['order' => Order::find($id)]);
    }

    public function update(int $id)
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new OrderValidator();
        if (OrderService::update($validator, $fields)) {
            Session::notify('success', 'Order was success update!');
            redirect("/admin/order/" . $id . "/edit");
        }
        $errors = $this->getErrors($fields, $validator);
        $errors['order'] = Order::find($id);
        view('admin/orders/edit', $errors);
    }
}
