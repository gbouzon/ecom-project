<?php
    namespace app\controllers;
   
        class User extends \app\core\Controller {
            
            #[\app\filters\Login]
            public function index($user_id) {
                $myUser = new \app\models\User();
                $myUser = $myUser->getById($user_id);
                $this->view('User/index', $myUser);
            }

            function login() { 
                if (!isset($_POST['action'])) {
                    $this->view('User/login'); 
                }                 
                else { 
                    $user = new \app\models\User();
                    $user = $user->get($_POST['email']);
                    if ($user) {
                        if (password_verify($_POST['password'], $user->password_hash)) {
                            $_SESSION['email'] = $user->email;
                            $_SESSION['user_id'] = $user->user_id;

                            $cart = new \app\controllers\Cart();
                            $cart = $cart->createCart();

                            $store = $user->getStore($_SESSION['user_id']); 
                            
                            if ($user->user_type == 1) {
                                if ($store) {
                                    $_SESSION['store_id'] = $store->store_id;
                                    header('location:/Store/index/' . $_SESSION['store_id']); 
                                }    
                                else 
                                    header('location:/Store/create/' . $_SESSION['user_id']);
                            }
                            else
                                header('location:/Main/index'); 
                        }
                        else 
                            $this->view('User/login', 'Incorrect email/password combination.');
                    }    
                    else 
                        $this->view('User/login', 'Incorrect email/password combination.');
                }
            }
        
            function register() { 
                if (!isset($_POST['action'])) 
                    $this->view('User/register');
                else { 
                    $filename = Main::imageUpload("picture");
			        $filename = (!$filename) ? 'blank.png' : $filename;

                    $newUser = new \app\models\User();
                    $newUser->email = trim($_POST['email']);
                    $newUser->first_name = trim($_POST['first_name']);
                    $newUser->middle_name = trim($_POST['middle_name']);
                    $newUser->last_name = trim($_POST['last_name']);
                    $newUser->user_type = (int) $_POST['user_type'];
                    $newUser->phone = trim($_POST['phone']);
                    $newUser->picture = $filename;
        
                    if (!$newUser->exists() && $_POST['password'] == $_POST['password_confirm']) {
                        $newUser->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
                        $newUser->insert();
                        header('location:/User/login' ); 
                    } else {
                        $this->view('User/register','The user account with that email already exists.');
                    }
                }
            }

            #[\app\filters\Login]
            function update($user_id) {
                $user = new \app\models\User();
                $user = $user->getById($user_id);//get the specific user
                if ($user_id == $_SESSION['user_id']) {
                    if (!isset($_POST['action'])){
                        $this->view('User/update', $user);
                    } else {
                        $filename = Main::imageUpload("picture");
                        if (!$filename) {
                            if ($user->picture != 'blank.png')
                                unlink('pictures\\' . $user->picture);

                            $user->picture = $filename;
                        }

                        $user->email = trim($_POST['email']);
                        $user->first_name = trim($_POST['first_name']);
                        $user->middle_name = trim($_POST['middle_name']);
                        $user->last_name = trim($_POST['last_name']);
                        $user->phone = trim($_POST['phone']);

                        $user->update();
                        header('location:/User/index/' . $_SESSION['user_id']);
                    }
                }
                else
                    header('location:/User/index/' . $user_id); // in case manipulating the url
            }

            #[\app\filters\Login]
            function delete($user_id) {
                if ($user_id == $_SESSION['user_id']) {
                    $user = new \app\models\User();
                    $user = $user->getById($user_id);

                    if($user->user_type == 1){
                        $store = $user->getStore($user_id);
                        $store->delete($store->store_id);  
                    }

                    $user = $user->delete($user_id);
                    $this->logout();    
                }
            }
 
            function updateUserType($user_id) {
                $user = new \app\models\User();
                $user = $user->getById($user_id);

                $user->user_type = ($user->user_type != 0) ? 0 : 1; 
                $user->updateUserType(); 
            }

            //TODO: implement for part 2
            public function changePassword($user_id) {

            }
        
            #[\app\filters\Login]
            function logout() {
                session_destroy(); //deletes the session ID and all data
                header('location:/Main/index');
            }
        }