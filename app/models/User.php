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

            function getStore($user_id) { //user_id is unique for now, see if changes needed later
                $SQL = 'SELECT * FROM store WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=> $user_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Store");
                return $STMT->fetch();
            }

            function getById($user_id) { //get by user_id
                $SQL = 'SELECT * FROM user WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$user_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\User");
                return $STMT->fetch();
            }

            function exists() {
                return $this->get($this->email) != false;
            }

            //check inserts, updates and deletes later
            function insert() {
                $SQL = 'INSERT INTO user(first_name, middle_name, last_name, user_type, email, phone, password_hash, picture)   
                    VALUES(:first_name, :middle_name, :last_name,:user_type , :email, :phone, :password_hash, :picture)';
		        $STMT = self::$_connection->prepare($SQL);
		        $STMT->execute(['first_name'=>$this->first_name,'middle_name'=>$this->middle_name,'last_name'=>$this->last_name, 
                    'user_type'=>$this->user_type,'email'=>$this->email,'phone'=>$this->phone, 'password_hash'=>$this->password_hash, 
                    'picture'=>$this->picture]);
            }

            //check inserts, updates and deletes later
            function update() {
                $SQL = 'UPDATE user SET first_name = :first_name, middle_name = :middle_name, last_name = :last_name, 
                    user_type = :user_type, email = :email , phone = :phone, password_hash = :password_hash, picture = :picture 
                    WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['first_name'=>$this->first_name,'middle_name'=>$this->middle_name,'last_name'=>$this->last_name, 
                    'user_type'=>$this->user_type,'email'=>$this->email,'phone'=>$this->phone, 'password_hash'=>$this->password_hash, 
                    'picture'=>$this->picture,'user_id'=>$this->user_id]);
            }

            function updateUserType() {
                $SQL = 'UPDATE user SET user_type = :user_type WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_type'=>$this->user_type,'user_id'=>$this->user_id]);
            }
            
            function delete() {
                $SQL = 'DELETE FROM user WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$_SESSION['user_id']]);
            }

            function update2fa() {
                $SQL = 'UPDATE user SET secret_key = :secret_key WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['secret_key'=>$this->secret_key,'user_id'=>$this->user_id]);
            }
        }