<?php
    namespace app\controllers;

        class Product extends \app\core\Controller {

            public function index($product_id) { 
                $myProduct = new \app\models\Product();
                $product = $myProduct->get($product_id);
                $this->view('Product/index', $product);
            }

            public function create($product_id) {
                if (!isset($_POST['action'])) { 
                    $this->view('Product/create');
                }
                else {  //implement pictures later + fix picture folder structure (per controller)
			        $filename = 'blank.png';
                    $product = new \app\models\Product();
                    $product->product_id = $product_id;
                    $product->product_name = $_POST['product_name'];
                    $product->product_image = $filename; //change this later
                    $product->product_availability = $this->getAvailability($_POST['product_quantity']);
                    $product->product_quantity = $_POST['product_quantity'];
                    $product->product_price = $_POST['product_price'];
                    $product->product_description = $_POST['product_description'];
                    $product->insert();
                    header("location:/product/index/$product_id");
                }
            }

            private function getAvailability($quantity) {
                if ($quantity == 0)
                    return 0;
                else 
                    return 1;
            }


            public function update($product_id) {
                $product = new \app\models\Product(); 
                $product = $product->get($product_id);
                if (!isset($_POST['action'])) {	
                    $this->view('product/update', $product);
                }
                else {
                    $product->product_name = $_POST['product_name'];
                    $product->product_quantity= $_POST['product_quantity'];
                    $product->product_price = $_POST['product_price'];
                    // $product->product_list = ; //redo this later, product/create link, add to array, then concatenate to string using , as delimiter for ids
                    $product->product_description = $_POST['product_description'];
                    $product->update($product_id);
                    // $product_id = $newproduct->getLast()->product_id; //test this
                    // $_SESSION['product_id'] = $product_id;
                   
                    header('location:/store/index/' . $product->store_id);
                }
            }

            public function delete($product_id) {
                $product = new \app\models\Product(); 
                $product = $product->get($product_id);
               
                $product->delete(); 

                header('location:/store/index/' . $product->store_id);
            }
            
        }