<?php
    namespace app\filters;

        #[\Attribute]
        class Profile {

            function execute() {
                if (!isset($_SESSION['profile_id'])) {
                    header('location:/Profile/create');
                    return true;
                }
                return false;
            }
        }