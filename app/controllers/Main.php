<?php
    namespace app\controllers;

        class Main extends \app\core\Controller {

            public function index() { //TODO: implement, figure out format
                $stores = new \app\models\Store();
                $stores = $stores->getAll(); 
                $this->view('Main/index', $stores);
            }

            public static function imageUpload($file_uploaded) {
                $filename = false;
                $file = $_FILES[$file_uploaded];
        
                $acceptedTypes = ['image/jpeg'=>'jpg', 'image/gif'=>'gif', 'image/png'=>'png'];
 
                if (empty($file['tmp_name']))
                    return false;
        
                $fileData = getimagesize($file['tmp_name']); 
                if ($fileData && in_array($fileData['mime'],array_keys($acceptedTypes))) {
                    $folder = 'app\\pictures';
                    $filename = uniqid() . '.' . $acceptedTypes[$fileData['mime']];
                    move_uploaded_file($_FILES['picture']['tmp_name'],"$folder\\$filename");
                }
        
                return $filename;
            }
        }