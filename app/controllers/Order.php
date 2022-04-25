<?php
    namespace app\controllers;

        class order extends \app\core\Controller {

            #[\app\filters\Auth]
            public function userOrderHistory() { 
                $orders = new \app\models\Order();
                $orders = $orders->getUserOrder($_SESSION['user_id']);
               // retrieve the order and the order_detail 
               $this->view('Order/userOrderHistory', $orders);
            }

            #[\app\filters\LoginAsStore]
            public function storeOrderList() { 
                $orders = new \app\models\Order();
                $orders = $orders->getStoreOrder($_SESSION['store_id']);
                $productArray = [];
                
                $products = new \app\models\Order_detail();
                foreach($orders as $order){
                    array_push($productArray, $products->getAllProducts($order->order_id));
                }
               $this->view('Order/storeOrderList', array($orders, $productArray));
            }

            #[\app\filters\LoginAsStore]
            public function storeOrderHistory() { 
                $orders = new \app\models\Order();
                $orders = $orders->getStoreClosedOrder($_SESSION['store_id']);
                $productArray = [];
                
                $products = new \app\models\Order_detail();
                foreach($orders as $order){
                    array_push($productArray, $products->getAllProducts($order->order_id));
                }
               $this->view('Order/storeOrderHistory', array($orders, $productArray));
            }

            #[\app\filters\Auth]
            public function orderPlace($order_id){
                $order = new \app\models\Order();
                $order = $order->get($order_id);
                $total = $this::totalPrice($order_id);
                if(!isset($_POST['action'])){
                    $store = new \app\models\Store();
                    $store = $store->get($order->store_id);

                    $user = new \app\models\User();
                    $user = $user->getById($_SESSION['user_id']);

                    $items = new \app\models\Order_detail();
                    $items = $items->getOrder($order_id);


                    $this->view('Order/confirmation', array($store, $user, $items, $total));
                } else {
                    $order->updateStatus(1);
                    $order->addTotal($total['Total']); 
                    $cart = new \app\controllers\Cart();
                    $cart->createCart();
                    header('Location:/Order/userOrderHistory');
                }
               
            }

            #[\app\filters\Auth]
            public function viewOrderDetails($id, $order_id, $flag){
                $total = $this::totalPrice($order_id);

                $user = new \app\models\User();
                $user = $user->getById($_SESSION['user_id']);

                $items = new \app\models\Order_detail();
                $items = $items->getOrder($order_id);

                if($flag != 1){
                    $store = new \app\models\Store();
                    $store = $store->get($id);
                    $user = $user->getById($_SESSION['user_id']);
                    
                    $this->view('Order/orderDetails', array($store, $user, $items, $total));
                }else{
                    $user = $user->getById($id);
                    $this->view('Order/storeOrderDetails', array($user, $items, $total));  
                }
                
            }

            private function totalPrice($order_id){
                $TPSratio = 0.05;
                $TVQratio = 0.09975; 
                $subtotal = 0; 

                $items = new \app\models\Order_detail();
                $items = $items->getOrder($order_id);

                foreach ($items as $item){
                    $subtotal += $item->price;
                }
   
                $TPS = $subtotal * $TPSratio;
                $TVQ = $subtotal * $TVQratio;
                $Total = $subtotal + $TPS + $TVQ; 
                $totalPrice = ['subtotal' => $subtotal, 'TPS'=> $TPS, 'TVQ' => $TVQ, 'Total' => $Total]; 
                return $totalPrice; 
            }

            #[\app\filters\Auth]
             public function userCancelOrder($order_id){
                $cart = new \app\controllers\Cart();
                $order = new \app\models\Order();
                $order = $order->get($order_id);

                if($order->order_status == 1){
                    // set the order status to 0; 
                    $order->updateStatus(0);
                    // clear cart
                    $cart->clear($order->order_id);
                    header('Location:/Order/userOrderHistory');
                }
             }

            #[\app\filters\LoginAsStore]
            public function updateStatus($order_id, $newStatus) {
                $order = new \app\models\Order();
                $order = $order->get($order_id);

                $order->updateStatus($newStatus);
                header('Location:/Order/storeOrderHistory');
            }       
        }