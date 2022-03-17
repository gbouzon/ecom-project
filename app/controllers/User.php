<?php
    namespace app\controllers;
   
        class User extends \app\core\Controller {

            public function index($user_id) {
                $myUser = new \app\models\User();
                $myUser = $myUser->getById($user_id);
                //$store = $myUser->getStore($user_id);
                //if ($store) //figure this out later
                //    $this->view('User/index', ['user'=>$myUser,'store'=>$store]);//pass an array to the view
               // else
                    $this->view('User/index', $myUser);
            }

            function login() { //login here
                if (!isset($_POST['action'])) //there is no form being submitted
                    $this->view('User/login');
                else { //there is a form submitted
                    $user = new \app\models\User();
                    $user = $user->get($_POST['email']);
                    if ($user) {
                        if(password_verify($_POST['password'], $user->password_hash)) {
                            //yay! login - store that state in a session
                            $_SESSION['email'] = $user->email;
                            $_SESSION['user_id'] = $user->user_id;
                            if($user->getStore($_SESSION['user_id']) != false){
                                $_SESSION['store_id'] = $user->getStore($_SESSION['user_id'])->store_id; //test this too
                            }
                            header('location:/User/index/' . $user->user_id); //->back to home page after login?
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
                    $newUser->phone = $_POST['phone'];
                    $newUser->picture = $filename;
        
                    if (!$newUser->exists() && $_POST['password'] == $_POST['password_confirm']) {
                        $newUser->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
                        $newUser->insert();
                        
                        if ($_POST['userType'] == "store") { //change all this to log in later, add new column in db to store store or customer
                            header('location:/Store/create/' . $newUser->get($_POST['email'])->user_id); //will allow for adding products
                        } else if ($_POST['userType'] == "customer") {
                            header('location:/Main/index');
                        }
                        else {
                            echo 'Must choose either Store or Customer';
                        }
                    }
                    else {
                        $this->view('User/register','The user account with that email already exists.');
                    }
                }
            }

            function update($user_id) {
                $user = new \app\models\User();
                $user = $user->get($user_id);//get the specific user
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
                header('location:/User/login');
            }
        }