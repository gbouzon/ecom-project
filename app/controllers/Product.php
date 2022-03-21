<?php
    namespace app\controllers;

        class Product extends \app\core\Controller {

            public function index($product_id) { 
                $myProduct = new \app\models\Product();
                $product = $myProduct->get($product_id);
                $this->view('Product/index', $product);
            }

            #[\app\filters\LoginAsStore]
            public function create($store_id) {
                if ($store_id == $_SESSION['store_id']) {
                    if (!isset($_POST['action'])) { 
                        $this->view('Product/create');
                    }
                    else {  //implement pictures later
                        $filename = Main::imageUpload("product_image");
                        $product = new \app\models\Product();
                        $product->store_id = $store_id;
                        $product->product_name = trim($_POST['product_name']);
                        $product->product_image = $filename; 
                        $product->product_availability = $this->getAvailability(trim($_POST['product_quantity']));
                        $product->product_quantity = trim($_POST['product_quantity']);
                        $product->product_price = trim($_POST['product_price']);
                        $product->product_description = trim($_POST['product_description']);

                        $product->insert();
                        header("location:/Store/index/". $_SESSION['store_id']);
                    }
                }
                else 
                    header("location:/Store/index/". $_SESSION['store_id']);
            }

            private function getAvailability($quantity) {
                if ($quantity == 0)
                    return 0;
                else 
                    return 1;
            }

            #[\app\filters\LoginAsStore]
            public function update($product_id) {
                $product = new \app\models\Product(); 
                $product = $product->get($product_id);
                if ($product->store_id == $_SESSION['store_id']) {
                    if (!isset($_POST['action'])) {	
                        $this->view('Product/update', $product);
                    }
                    else {
                        $filename = Main::imageUpload("product_image");
                        if (!$filename) {
                            if ($product->product_image != 'blank.jpg')
                                unlink('app\\pictures\\' . $product->product_image);

                            $product->product_imagee = $filename;
                        }

                        $product->product_name = trim($_POST['product_name']);
                        $product->product_quantity= trim($_POST['product_quantity']);
                        $product->product_price = trim($_POST['product_price']);
                        $product->product_description = trim($_POST['product_description']);

                        $product->update($product_id);        
                        header('location:/Store/index/' . $_SESSION['store_id']);
                    }
                }
                else
                    header('location:/Store/index/' . $_SESSION['store_id']);
            }

            #[\app\filters\LoginAsStore]
            public function delete($product_id) {
                $product = new \app\models\Product(); 
                $product = $product->get($product_id);

                if ($product->store_id == $_SESSION['store_id']) { //checking if product belongs to store
                    if ($product->product_image != 'blank.jpg')
                        unlink('app\\pictures\\' . $product->product_image);
                        
                    $product->delete();
                }

                header('location:/Store/index/' . $_SESSION['store_id']);
            } 
        }