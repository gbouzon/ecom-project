<?php
    namespace app\controllers;

        class Search extends \app\core\Controller {

            public function searchStores() {
                $store = new \app\models\Store();
                $stores = $store->getByStoreName(trim($_POST['search']));

                if (isset($_POST['action'])) 
                    $this->view('subviews/search', $stores);
            } 

            public function searchProducts() { //figure out what this entails
                $store = new \app\models\Store();
                $product = new \app\models\Product();
                $products = $store->getByProductName($_POST['search']);

                if (isset($_POST['action'])) 
                    $this->view('subviews/search', $products);
            }
        }