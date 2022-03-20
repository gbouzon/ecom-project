<?php
    namespace app\controllers;

        class order extends \app\core\Controller {

            public function index($product_id) { 
                $myProduct = new \app\models\Product();
                $product = $myProduct->get($product_id);
                $this->view('Product/index', $product);
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