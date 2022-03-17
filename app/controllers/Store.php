<?php
    namespace app\controllers;

        class Store extends \app\core\Controller { 

            public function index($store_id) { //shows store profile?
                $myStore = new \app\models\Store();
                $store = $myStore->get($store_id);
                $this->view('Store/index', $store);
            }

            public function create($user_id) {
                if (!isset($_POST['action'])) {	//display the view if I don't submit the form
                    $this->view('Store/create');
                }
                else {	//process the data when the form has been submitted, id, title, text
                    $newStore = new \app\models\Store();
                    $newStore->store_name = $_POST['store_name'];
                    $newStore->store_address = $_POST['store_address'];
                    //$newStore->product_list = ; //redo this later, product/create link, add to array, then concatenate to string using , as delimiter for ids
                    $newStore->description = $_POST['description'];
                    $newStore->insert($user_id);

                    $store_id = $newStore->getLast()->store_id; //test this
                    $_SESSION['store_id'] = $store_id;
                    header('location:/Store/index/' . $store_id);
                    //todo: make create view 
                }
            }

            public function update($store_id) {
                $store = new \app\models\Store(); 
                $store = $store->get($store_id);
                if (!isset($_POST['action'])) {	
                    $this->view('Store/update', $store);
                }
                else {
                    $store->store_name = $_POST['store_name'];
                    $store->store_address = $_POST['store_address'];
                    // $store->product_list = ; //redo this later, product/create link, add to array, then concatenate to string using , as delimiter for ids
                    $store->description = $_POST['description'];
                    $store->update($store_id);
                    // $store_id = $newStore->getLast()->store_id; //test this
                    // $_SESSION['store_id'] = $store_id;
                    header('location:/Store/index/' . $store_id);
                    //todo: make create view 
                }
            }
        }