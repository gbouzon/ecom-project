<?php
    namespace app\controllers;
   
        class User extends \app\core\Controller {

            //pass on all publications (public and private, check Main)
            function login() { //login here
                if (!isset($_POST['action'])) //there is no form being submitted
                    $this->view('User/login');
                else {//there is a form submitted
                    $user = new \app\models\User();
                    $user = $user->get($_POST['username']);
                    if ($user) 
                        if(password_verify($_POST['password'], $user->password_hash)) {
                            //yay! login - store that state in a session
                            $_SESSION['username'] = $user->username;
                            $_SESSION['user_id'] = $user->user_id;
                            if ($user->getUserProfile($user->user_id)) {
                                $profile = $user->getUserProfile($user->user_id);
                                $_SESSION['profile_id'] = $profile->getID($user->user_id);      
                            }
                            header('location:/Main/index');
                        } 
                        else
                            $this->view('User/login','Incorrect username/password combination.');
                    else
                        $this->view('User/login','Incorrect username/password combination.');
                }
            }
        
            function register() { //register here
                if (!isset($_POST['action'])) //there is no form being submitted
                    $this->view('User/register');
                else { //there is a form submitted
                    $newUser = new \app\models\User();
                    $newUser->username = $_POST['username'];
        
                    if (!$newUser->exists() && $_POST['password'] == $_POST['password_confirm']) {
                         $newUser->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
                        $newUser->insert();
                        header('location:/Main/index');
                    }
                    else 
                        $this->view('User/register','The user account with that username already exists.');
                }
            }
        
            #[\app\filters\Login]
            function logout() {
                session_destroy();//deletes the session ID and all data
                header('location:/User/login');
            }

            function delete() {
                $newUser = new \app\models\User();
                $newUser = $newUser->getById($_SESSION['user_id']);
                $profile = $newUser->getUserProfile($newUser->user_id);
                $publication = new \app\models\Publication();
                $publications = $publication->getAllFromProfile($profile->profile_id);
                $comment = new \app\models\Comment();
                foreach($publications as $pub) {
                    $comments = $comment->getAllFromPublication($pub->publication_id);
                    foreach($comments as $com) {
                        $com->delete($com->publication_comment_id);
                    }
                    $pub->delete($pub->publication_id);
                }
                $comments = $comment->getAllFromProfile($profile->profile_id);
                foreach($comments as $comm) {
                    $comm->delete($comm->publication_comment_id);
                }
                $profile->delete($profile->profile_id);
                $newUser->delete();
                $this->logout();
            }
        }