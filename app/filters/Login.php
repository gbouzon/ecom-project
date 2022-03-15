<?php
    namespace app\filters;

        #[\Attribute]
        class Login {

            function execute() {
                if (!isset($_SESSION['user_id'])) { //user is not logged in
                    header('location:/User/login');
                    return true; //I want to indicate to the framework that the user is filtered
                }
                return false;
            }
        }