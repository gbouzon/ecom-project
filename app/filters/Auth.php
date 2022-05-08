<?php
    namespace app\filters;

        #[\Attribute]
        class Auth {

            //user is logged in and authenticated
            function execute() {
                if(!isset($_SESSION['user_id'])) {
                    header('location:/User/login');
                    return true; 
                }
                else if (!isset($_SESSION['secretkey'])) {
                    header('location:/User/validate2fa');
                    return true;
                }
                return false;
            }
        }