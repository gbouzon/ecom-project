<?php
    namespace app\filters;

        #[\Attribute]
        class LoginAsStore {

            function execute() {
                if (!isset($_SESSION['store_id'])) { //if store_id isn't set -> not a store 
                    if (isset($_SESSION['user_id'])) { //if user is set -> logged in as user
                        header('location:/Store/create/' . $_SESSION['user_id']); //redirecting to create a store
                        return true; 
                    }
                    else {
                        header('location:/User/register'); //if not logged in as user -> redirecting to register
                        return true;
                    }
                }
                return false;
            }
        }