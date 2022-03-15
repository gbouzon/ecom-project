<?php
    namespace app\controllers;

        #[\app\filters\Login]
        class Profile extends \app\core\Controller {

            public function index($profile_id) { //shows profile page -> basic info, publication and comments subviews and modify button
                $profile = new \app\models\Profile();
                $currentProfile = $profile->get($profile_id);
                $this->view('Profile/index', $currentProfile);
            }

            public function create() {
                if (!isset($_POST['action'])) {
                    $this->view('Profile/create');
                }
                else {
                    $userProfile = new \app\models\Profile();
                    $userProfile->first_name=$_POST['first_name'];
                    $userProfile->middle_name=$_POST['middle_name'];
                    $userProfile->last_name=$_POST['last_name'];
                    $userProfile->insert($_SESSION['user_id']);
                    $_SESSION['profile_id'] = $userProfile->getID($_SESSION['user_id']);
                    header('location:/Main/index');
                }
            }

            #[\app\filters\Profile]
            public function update($profile_id) {
                $profile = new \app\models\Profile();
                $profile = $profile->get($profile_id);
                if (!isset($_POST['action'])) {
                    $this->view('Profile/update', $profile);
                }
                else {
                    $profile->first_name = $_POST['first_name'];
                    $profile->middle_name = $_POST['middle_name'];
                    $profile->last_name = $_POST['last_name'];
                    $profile->update();
                    header("location:/Profile/index/$profile->profile_id");
                }
            }
        }