<?php
    namespace app\models;

    class Profile extends \app\core\Model {
        
        function __construct(){
            parent::__construct();
        }

        function get($profile_id) {
            $SQL = 'SELECT * FROM profile WHERE profile_id = :profile_id';
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['profile_id'=> $profile_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Profile");
            return $STMT->fetch();
        }

        function getAll() {
            $SQL = 'SELECT * FROM profile';
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute();
            $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Profile");
            return $STMT->fetchAll();
        }

        function insert($user_id) { //fix this and subsequent calls
            $SQL = 'INSERT INTO profile(user_id, first_name, middle_name, last_name) VALUES(:user_id, :first_name, :middle_name, :last_name)';
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['user_id'=>$user_id, 'first_name'=>$this->first_name, 'middle_name'=>$this->middle_name, 'last_name'=>$this->last_name]);
        }

        function update() {
            $SQL = 'UPDATE profile SET first_name = :first_name, middle_name = :middle_name, last_name = :last_name WHERE profile_id = :profile_id';
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['first_name'=>$this->first_name, 'middle_name'=>$this->middle_name, 'last_name'=>$this->last_name, 'profile_id'=>$this->profile_id]);
        }

        function delete($profile_id) { //change this cause we're only supposed to be able to delete an account not the profikle
            $SQL = 'DELETE FROM profile WHERE profile_id = :profile_id';
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['profile_id'=>$profile_id]);
        }

        function getID($user_id) {
            $SQL = 'SELECT profile_id FROM profile WHERE user_id = :user_id';
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['user_id'=>$user_id]);
            return $STMT->fetch()['profile_id'];
        }
    }