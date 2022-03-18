<?php
    namespace app\filters;

        #[\Attribute]
        class LoginAsStore {

            function execute() {
                if (!isset($_SESSION['store_id'] || $_SESSION['store_id']  )) { //user is not logged in
                    header('location:/Store/create');
                    return true; //I want to indicate to the framework that the user is filtered
                }
                return false;
            }
        }