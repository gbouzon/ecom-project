<?php
    namespace app\controllers;

        class Main extends \app\core\Controller {

            public function index() { //TODO: implement, figure out format
                $stores = new \app\models\Store();
                $stores = $stores->getAll(); 
                $this->view('Main/index', $stores);
            }
        }