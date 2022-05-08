<?php
    namespace app\controllers;

        class Store extends \app\core\Controller { 
            
            public function index($store_id) { 
                $myStore = new \app\models\Store();
                $store = $myStore->get($store_id);
                $this->view('Store/index', $store);
            }
            
            #[\app\filters\Auth]
            public function create($user_id) {
                if ($user_id == $_SESSION['user_id']) {
                    if (!isset($_POST['action'])) 
                        $this->view('Store/create');
                    else {	
                        $newStore = new \app\models\Store();
                        $newStore->store_name = trim($_POST['store_name']);
                        $newStore->store_address = trim($_POST['store_address']);
                        $newStore->description = trim($_POST['description']);

                        $newStore->insert($user_id);

                        $user = new \app\models\User();
                        $user = $user->getById($user_id);
                        $user->user_type = 1;
                        $user->updateUserType();

                        $store_id = $newStore->getLast()->store_id; 
                        $_SESSION['store_id'] = $store_id;
                        header('location:/Store/index/' . $_SESSION['store_id']);
                    }
                }
                else
                    header('location:/User/index/' . $_SESSION['user_id']);
            }

            #[\app\filters\LoginAsStore]
            public function update($store_id) {
                $store = new \app\models\Store(); 
                if ($store_id == $_SESSION['store_id']) {
                    $store = $store->get($store_id);
                    if (!isset($_POST['action'])) 
                        $this->view('Store/update', $store);
                    else {
                        $store->store_name = trim($_POST['store_name']);
                        $store->store_address = trim($_POST['store_address']);
                        $store->description = trim($_POST['description']);

                        $store->update($store_id);
                        header('location:/Store/index/' . $_SESSION['store_id']);
                    }
                }
                else 
                    header('location:/Store/index/' . $store_id); //in case manipulating the url
            }

            #[\app\filters\LoginAsStore]
            public function delete($store_id) {
                $user = new \app\models\User();
                $user = $user->getById($_SESSION['user_id']);
                $store = new \app\models\Store(); 
                if ($store_id == $_SESSION['store_id']) {
                    $store = $store->get($store_id);

                    $product = new \app\models\Product(); 
                    $products = $product->getAllFromStore($store_id); 

                    foreach ($products as $item) 
                        $item->delete(); 

                    $user->updateUserType();
                    $store->delete($store_id);
                    unset($_SESSION['store_id']);
                    header('location:/User/index/' . $_SESSION['user_id']);
                }
                else 
                    header('location:/Store/index/' . $_SESSION['store_id']);
            }
        }