<?php
    namespace app\controllers;

        class Main extends \app\core\Controller {

            public function index() { //displays publications sorted by date
                $myPublication = new \app\models\Publication();
                $profile_id = (isset($_SESSION['profile_id'])) ? $_SESSION['profile_id'] : false;

               // $publications = ($profile_id) ? $myPublication->getAll($profile_id) : $myPublication->getAllPublic();
                $this->view('Main/index');
            }
        }