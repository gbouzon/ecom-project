<?php
    namespace app\controllers;
   
        class User extends \app\core\Controller {
            
            #[\app\filters\Login]
            public function index($user_id) {
                $myUser = new \app\models\User();
                $myUser = $myUser->getById($user_id);
                $this->view('User/index', $myUser);
            }

            function login() { //login here
                if (!isset($_POST['action'])) {//there is no form being submitted
                    $this->view('User/login'); 
                }                 
                else { //there is a form submitted
                    $user = new \app\models\User();
                    $user = $user->get($_POST['email']);
                    if ($user) {
                        if(password_verify($_POST['password'], $user->password_hash)) {
                            //yay! login - store that state in a session
                            $_SESSION['email'] = $user->email;
                            $_SESSION['user_id'] = $user->user_id;

                            $store = $user->getStore($_SESSION['user_id']); 
                            
                            if($user->user_type == 1){
                                if($store != false){
                                    $_SESSION['store_id'] = $store->store_id;
                                    header('location:/Main/index'); 
                                }    
                                else 
                                    header('location:/Store/create/' . $user->user_id);
                            }else
                                header('location:/Main/index'); 
                        }
                        else 
                            $this->view('User/login','Incorrect email/password combination.');
                    }    
                    else 
                        $this->view('User/login','Incorrect email/password combination.');
                }
            }
        
            //TODO: add picture to view 
            function register() { //register here
                if (!isset($_POST['action'])) //there is no form being submitted
                    $this->view('User/register');
                else { //there is a form submitted
                    $filename = $this->imageUpload();
			        $filename = (!$filename) ? 'blank.png' : $filename;

                    $newUser = new \app\models\User();
                    $newUser->email = $_POST['email'];
                    $newUser->first_name = $_POST['first_name'];
                    $newUser->middle_name = $_POST['middle_name'];
                    $newUser->last_name = $_POST['last_name'];
                    $newUser->user_type = ($_POST['user_type'] != 1) ? 0 : 1;
                    $newUser->phone = $_POST['phone'];
                    $newUser->picture = $filename;
        
                    if (!$newUser->exists() && $_POST['password'] == $_POST['password_confirm']) {
                        $newUser->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
                        $newUser->insert();
                        header('location:/User/login' ); 
                    }else {
                        $this->view('User/register','The user account with that email already exists.');
                    }
                }
            }

            #[\app\filters\Login]
            function update($user_id) {
                $user = new \app\models\User();
                $user = $user->getById($user_id);//get the specific user
                //TODO: check if the user exists
                if (!isset($_POST['action'])){
                    $this->view('User/update', $user);
                } else {
                    $filename = $this->imageUpload();
                    if (!$filename) {
                        if ($user->picture != 'blank.jpg')
                            unlink('pictures/' . $user->picture);

                        $user->picture = $filename;
                    }

                    $user->email = $_POST['email'];
                    $user->first_name = $_POST['first_name'];
                    $user->middle_name = $_POST['middle_name'];
                    $user->last_name = $_POST['last_name'];
                    $user->phone = $_POST['phone'];
                    $user->update();
                    header('location:/User/index/' . $user_id);
                }
            }

            #[\app\filters\Login]
            function delete($user_id) {
                $user = new \app\models\User();
                $user = $user->getById($user_id);

                if($user->user_type == 1){
                    $store = $user->getStore($user_id);
                    $store->delete($store->store_id);  
                }

                $user = $user->delete($user_id);
                $this::logout();
              
            }
 
            static function updateUserType($user_id){
                $user = new \app\models\User();
                $user = $user->get($user_id);

                $user->user_type = ($user->user_type != 0)? 0 : 1 ; 
                $user->updateUserType(); 
            }

            
            public function imageUpload() {
                $filename = false;
                $file = $_FILES['picture'];
        
                $acceptedTypes = ['image/jpeg'=>'jpg', 'image/gif'=>'gif', 'image/png'=>'png'];
 
                if (empty($file['tmp_name']))
                    return false;
        
                $fileData = getimagesize($file['tmp_name']); 
                if ($fileData && in_array($fileData['mime'],array_keys($acceptedTypes))) {
                    $folder = 'pictures';
                    $filename = uniqid() . '.' . $acceptedTypes[$fileData['mime']];
                    move_uploaded_file($_FILES['picture']['tmp_name'],"$folder/$filename");
                }
        
                return $filename;
            }
        
            #[\app\filters\Login]
            function logout() {
                session_destroy(); //deletes the session ID and all data
                header('location:/Main/index');
            }
        }