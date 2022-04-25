<?php
    namespace app\controllers;

        #[\app\filters\Login]
        class Cart extends \app\core\Controller {

            public function index() {
                $cart = new \app\models\Order();
                $cart = $cart->getUserCart($_SESSION['user_id']);

                $products = new \app\models\Order_detail();
                $products = $products->getOrder($cart->order_id);
                $this->view('Cart/index', $products);
            }


            public function createCart() {
                $cart = new \app\models\Order();
                $cart->user_id = $_SESSION['user_id'];
                $cart->order_status = 0; 
                $cart->order_id = $cart->create();
            }

            public function addToCart($product_id, $store_id){
                $product = new \app\models\Product();
                $product = $product->get($product_id);

                if ($product->product_availability == 1) {

                    $order = new \app\models\Order();
                    $order = $order->getUserCart($_SESSION['user_id']);

                    if($order->store_id == null) {
                        $order->updateStore_id($store_id);
                        $_SESSION['order->store_id'] = $store_id;
                    }

                    if($order->store_id != $product->store_id){
                        $cart = new \app\controllers\Cart();
                        $order->updateStore_id($store_id);
                        $_SESSION['order->store_id'] = $store_id;
                        $cart->clear($order->order_id);
                    }

                    $newProduct = new \app\models\Order_detail();
                    $newProduct->order_id = $order->order_id;
                    $newProduct->product_id = $product_id;
                    $newProduct->quantity = 1;
                    $newProduct->unit_price = $product->product_price;
                    $newProduct->price = $product->product_price;
                    $newProduct->insert();
                    header('location:/Store/index/' . $store_id);
                }
                else
                    header('location:/Store/index/' . $store_id);
            }


            public function deleteFromCart($order_detail_id){
                $product = new \app\models\Order_detail();
                $product = $product->get($order_detail_id);

                $order= new \app\models\Order();
                $order = $order->get($product->order_id);
                if($order->user_id == $_SESSION['user_id']){
                    if($product->quantity != 1){
                        $product->quantity = $product->quantity - 1;
                        $product->price = $product->price - $product->unit_price;
                        $product->updatePriceAndQty();
                    }
                    else {
                        $product->delete(); 
                    } 
                    
                }
                header('location:/Cart/Index');   
            }

            public function clearCart($order_id){
                $this::clear($order_id);
                header('location:/Cart/Index');   
            }

            public function clear($order_id){
                $cart_products = new \app\models\Order_detail();
                $cart_products = $cart_products->getOrder($order_id);
               
                $order= new \app\models\Order();
                $order = $order->get($order_id);
                if($order->user_id == $_SESSION['user_id']){
                    foreach($cart_products as $product){
                        $product->delete();  
                    }
                }
            }
        }