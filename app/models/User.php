<?php
    namespace app\models;

        class User extends \app\core\Model {

            function __construct() {
                parent::__construct();
            }

            function get($email) {
                $SQL = 'SELECT * FROM user WHERE email = :email';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['email'=>$email]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\User");
                return $STMT->fetch();
            }

            function getById($user_id) { //get by user_id
                $SQL = 'SELECT * FROM user WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$user_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\User");
                return $STMT->fetch();
            }

            // function getUserProfile($user_id) { //get profile from user? question marrk>>>
            //     $SQL = 'SELECT * FROM profile WHERE user_id = :user_id';
            //     $STMT = self::$_connection->prepare($SQL);
            //     $STMT->execute(['user_id'=>$user_id]);
            //     $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Profile");
            //     return $STMT->fetch();
            // } // not sure if we need this



            
            function exists() {
                return $this->get($this->email) != false;
            }

            function insert() {
                $SQL = 'INSERT INTO user(first_name, middle_name, last_name, email, phone, password_hash) VALUES(:first_name, :middle_name, :last_name, :email, :phone, :password_hash)';
		        $STMT = self::$_connection->prepare($SQL);
		        $STMT->execute(['first_name'=>$this->first_name,'middle_name'=>$this->middle_name,'last_name'=>$this->last_name,'email'=>$this->email,'phone'=>$this->phone, 'password_hash'=>$this->password_hash]);
            }

            function delete() {
                $SQL = 'DELETE FROM user WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$_SESSION['user_id']]);
            }
        }