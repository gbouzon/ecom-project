<?php
    namespace app\controllers;

        class Product extends \app\core\Controller {

            public function index($product_id) { 
                $myProduct = new \app\models\Product();
                $product = $myProduct->get($product_id);
                $this->view('Product/index', $product);
            }

            public function create($store_id) {
                if (!isset($_POST['action'])) { 
                    $this->view('Product/create');
                }
                else {  //implement pictures later + fix picture folder structure (per controller)
			        $filename = 'blank.png';
                    $product = new \app\models\Product();
                    $product->store_id = $store_id;
                    $product->product_name = $_POST['product_name'];
                    $product->product_image = $filename; //change this later
                    $product->product_availability = $this->getAvailability($_POST['product_quantity']);
                    $product->product_quantity = $_POST['product_quantity'];
                    $product->product_price = $_POST['product_price'];
                    $product->product_description = $_POST['product_description'];
                    $product->insert();
                    header("location:/Store/index/$store_id");
                }
            }

            private function getAvailability($quantity) {
                if ($quantity == 0)
                    return 0;
                else 
                    return 1;
            }
        }