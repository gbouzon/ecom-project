<?php
    namespace app\controllers;

        class Cart extends \app\core\Controller {

            #[\app\filters\Login]
            public function index(){

                $cart = new \app\models\Order();
                $cart = $cart->getUserCart($_SESSION['user_id']);

                $products = new \app\models\Order_detail();
                $products = $products->getOrder($cart->order_id);
                $this->view('Cart/index', $products);

            }

            #[\app\filters\Login]
            public function addToCart($product_id, $store_id){
                $product = new \app\models\Product();
                $product = $product->get($product_id);

                $cart = new \app\models\Order();
                $cart = $cart->getUserCart($_SESSION['user_id']);
                if($cart == false){
                    $cart = new \app\models\Order();
                    $cart->user_id = $_SESSION['user_id'];
                    $cart->store_id = $store_id;
                    $cart->order_status = 0; 
                    $cart->order_id = $cart->create();
                } 
                    $newProduct = new \app\models\Order_detail();
                    $newProduct->order_id = $cart->order_id;
                    $newProduct->product_id = $product_id;
                    $newProduct->quantity = 1;
                    $newProduct->price = $product->product_price;
                    $newProduct->insert();
                    header('location:/Store/index/' . $store_id);
            }

            #[\app\filters\Login]
            public function deleteFromCart($order_detail_id){
                $product = new \app\models\Order_detail();
                $product = $product->get($order_detail_id);
                $order= new \app\models\Order();
                $order = $order->get($product->order_id);
                if($order->user_id == $_SESSION['user_id']){
                    $product->delete(); 
                }
                header('location:/Cart/Index');   
            }
        }


