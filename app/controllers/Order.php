<?php
    namespace app\controllers;

        class order extends \app\core\Controller {

            public function index($product_id) { 
               
            }

            public function orderHistory($user_id) { 
               // retrieve the order and the order_detail 
               $this->view('Order/orderHistory');
            }

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
                    header('Location:/Order/orderHistory/' . $_SESSION['user_id']);
                }
               
            }

            public function totalPrice($order_id){
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

            #[\app\filters\LoginAsStore]
            public function create($store_id) {
               
            }

            #[\app\filters\LoginAsStore]
            public function update($product_id) {
               
            }

            #[\app\filters\LoginAsStore]
            public function delete($product_id) {

            }
            
        }