<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\CartService;
use App\Services\Users\CreateService;
use App\Validators\Auth\SignUpValidator;
use App\Validators\CheckoutValidator;
use Core\Router;

class ShopController extends \Core\Controller
{
    public function index(): void
    {
        view('shop/main', ['products' => Product::all()]);
    }

    public function show(string $slug): void
    {
        view('shop/product', [
                'product' => Product::findBy('slug', $slug),
                'related' => Product::all()
            ]
        );
    }

    public function category(string $slug): void
    {
        $category = Category::findBy('slug', $slug);
        if (!$category instanceof Category) {
            redirect('/shop');
        }
        view(
            'shop/main',
            [
                'products' => Product::findByCollection('category_id', $category->id),
                'category' => $category
            ]
        );
    }

    public function cart(): void
    {
        if (Router::$isAjax) {
            jsonResponse(
                [
                    'rendered' => partView(
                        'cart/cart-modal',
                        [
                            'products' => CartService::getCart(),
                            'sum' => CartService::sum(),
                            'amount' => CartService::amount()
                        ]
                    )
                ]
            );
            return;
        }
        view('cart/cart-full', [
                'products' => CartService::getCart(),
                'sum' => CartService::sum(),
                'amount' => CartService::amount()
            ]
        );
    }

    public function add(): void
    {
        if (!Router::$isAjax) {
            echo dd('Route call only ajax');
        }
        $fields = filter_input_array(INPUT_POST, $_POST);

        if (!isset($fields['product_id'])) {
            jsonResponse(['error' => 'Product id is required']);
        }
        $product = Product::find($fields['product_id']);
        if (!$product) {
            jsonResponse(['error' => 'Product not find']);
        }
        $cart = CartService::add($product, $fields['amount'] ?? 1);
        jsonResponse(
            [
                'rendered' => partView(
                    'cart/cart-modal',
                    [
                        'products' => $cart,
                        'sum' => CartService::sum(),
                    ]
                ),
                'sum' => CartService::sum(),
                'amount' => CartService::amount()
            ]
        );
    }

    public function reduce(): void
    {
        if (!Router::$isAjax) {
            echo dd('Route call only ajax');
        }
        $fields = filter_input_array(INPUT_POST, $_POST);

        if (!isset($fields['product_id'])) {
            jsonResponse(['error' => 'Product id is required']);
        }
        $product = Product::find($fields['product_id']);
        if (!$product) {
            jsonResponse(['error' => 'Product not find']);
        }
        $cart = CartService::reduce($product, $fields['amount'] ?? 1);
        jsonResponse(
            [
                'rendered' => partView(
                    'cart/cart-modal',
                    [
                        'products' => $cart,
                        'sum' => CartService::sum(),
                    ]
                ),
                'sum' => CartService::sum(),
                'amount' => CartService::amount()
            ]
        );
    }

    public function remove(): void
    {
        if (!Router::$isAjax) {
            echo dd('Route call only ajax');
        }
        $fields = filter_input_array(INPUT_POST, $_POST);

        if (!isset($fields['product_id'])) {
            jsonResponse(['error' => 'Product id is required']);
        }
        $product = Product::find($fields['product_id']);
        if (!$product) {
            jsonResponse(['error' => 'Product not find']);
        }
        $cart = CartService::remove($product);
        jsonResponse(
            [
                'rendered' => partView(
                    'cart/cart-modal',
                    [
                        'products' => $cart,
                        'sum' => CartService::sum(),
                    ]
                ),
                'sum' => CartService::sum(),
                'amount' => CartService::amount()
            ]
        );
    }

    public function checkout(): void
    {
        if (0 === CartService::amount()) {
            redirect('shop');
        }
        view(
            'checkout/main',
            [
                'products' => CartService::getCart(),
                'sum' => CartService::sum(),
                'amount' => CartService::amount(),

            ]
        );
    }

    public function checkoutProcessing()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);

        if (User::Instance() instanceof User) {
            $user = User::Instance();
        }

        if (isset($fields['password'])) {
            $signUpValidator = new SignUpValidator();
            $validateFields = [];
            $validateFields['name'] = $fields['name'];
            $validateFields['email'] = $fields['email'];
            $validateFields['password'] = $fields['password'];
            $validateFields['password_confirm'] = $fields['password'];
            if (!$signUpValidator->validate($validateFields)) {
                $errors = $this->getErrors($fields, $signUpValidator);
                view(
                    'checkout/main',
                    array_merge(
                        [
                            'products' => CartService::getCart(),
                            'sum' => CartService::sum(),
                            'amount' => CartService::amount(),

                        ],
                        $errors
                    )

                );
                return;
            }
            CreateService::call($validateFields);
            $user = User::find(CreateService::$userId);
        }


        // Validate
        $validator = new CheckoutValidator();
        if ($validator->validate($fields)) {
            $orderId = Order::create(
                [
                    'session_id' => session_id(),
                    'user_id' => $user->id,
                    'sum' => CartService::sum(),
                    'address' => 'Область: ' . $fields['address-city'] . ' / Вулиця: ' . $fields['address-street'] . ' / Будинок: ' . $fields['address-house'],
                    'notice' => isset($fields['notice']) ? htmlspecialchars($fields['notice']) : '',
                ]
            );
            $order = Order::find($orderId);
            foreach (CartService::getCart() as $product) {
                $order->addProduct(
                    $product,
                    $product->amount
                );
            }
            CartService::clearCart();

            redirect('/shop/thanks/' . $orderId);
        }
        $errors = $this->getErrors($fields, $validator);
        view(
            'checkout/main',
            array_merge(
                [
                    'products' => CartService::getCart(),
                    'sum' => CartService::sum(),
                    'amount' => CartService::amount(),

                ],
                $errors
            )
        );
    }

    public function thanks(int $id): void
    {
        $order = Order::find($id);
        view(
            'checkout/thanks',
            [
                'products' => $order->products(),
                'sum' => $order->sum,
                'amount' => count($order->products()),

            ]
        );
    }

    public function search(): void
    {
        $params = Router::getUriParams();
        if (!isset($params['q'])) {
            redirect('/');
        }
        $search = htmlspecialchars($params['q']);

        view(
            'search/main',
            [
                'products' => Product::select()->where('name', 'LIKE', '%' . $search . '%')->get(),

            ]
        );
    }

}
