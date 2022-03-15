<?php
    namespace app\models;

        class User extends \app\core\Model {

            function __construct() {
                parent::__construct();
            }

            
            function get($username) {
                $SQL = 'SELECT * FROM user WHERE username = :username';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['username'=>$username]);
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

            function getUserProfile($user_id) { //get profile from user? question marrk>>>
                $SQL = 'SELECT * FROM profile WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$user_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Profile");
                return $STMT->fetch();
            }

            function exists() {
                return $this->get($this->username) != false;
            }

            function insert() {
                $SQL = 'INSERT INTO user(username, password_hash) VALUES(:username, :password_hash)';
		        $STMT = self::$_connection->prepare($SQL);
		        $STMT->execute(['username'=>$this->username,'password_hash'=>$this->password_hash]);
            }

            function delete() {
                $SQL = 'DELETE FROM user WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$_SESSION['user_id']]);
            }
        }