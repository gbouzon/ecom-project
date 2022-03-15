<?php
    namespace app\models;

        class Publication extends \app\core\Model {

            function __construct() {
                parent::__construct();
            }

            public function get($publication_id) {
                $SQL = 'SELECT * FROM publication WHERE publication_id = :publication_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['publication_id'=>$publication_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Publication");
                return $STMT->fetch(); 
            }

            public function getAllPublic() { 
                $SQL = 'SELECT * FROM publication WHERE publication_status = 0 ORDER BY timestamp ASC'; //because 0 is public
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute();
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Publication");
                return $STMT->fetchAll(); 
            }

            public function getAll($profile_id) { //all public and private publications (only if made by the same user)
                $SQL = 'SELECT * FROM publication WHERE publication_status = 0
                        UNION 
                        SELECT * FROM publication WHERE publication_status = 1 AND profile_id = :profile_id ORDER BY timestamp DESC;';

                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['profile_id'=>$profile_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Publication");
                return $STMT->fetchAll(); 
            }

            public function getAllFromProfile($profile_id) { //all public and private publications (only if made by the same user)
                $SQL = 'SELECT * FROM publication WHERE profile_id = :profile_id ORDER BY timestamp DESC;';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['profile_id'=>$profile_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Publication");
                return $STMT->fetchAll(); 
            }

            public function getProfile($profile_id) {
                $SQL = 'SELECT * FROM profile WHERE profile_id = :profile_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['profile_id'=>$profile_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Profile");
                return $STMT->fetch(); 
            }

            public function getUser($user_id) {
                $SQL = 'SELECT * FROM user WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$user_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\User");
                return $STMT->fetch(); 
            }

            public function getTimestamp($publication_id) {
                $SQL = 'SELECT timestamp FROM publication WHERE publication_id = :publication_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['publication_id'=>$publication_id]);
                return $STMT->fetch()['timestamp'];
            }

            function getComments($publication_id) {
                $SQL = 'SELECT * FROM publication_comment WHERE publication_id = :publication_id ORDER BY timestamp DESC;';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['publication_id'=>$publication_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Comment");
                return $STMT->fetchAll();
            }

            public function insert() { //fix this and subsequent calls
                $SQL = 'INSERT INTO publication(profile_id, publication_title, publication_text, publication_status) 
                VALUES(:profile_id, :publication_title, :publication_text, :publication_status)';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['profile_id'=>$this->profile_id, 'publication_title'=>$this->publication_title, 
                'publication_text'=>$this->publication_text, 'publication_status'=>$this->publication_status]);
            }
    
            public function update() {
                $SQL = 'UPDATE publication SET publication_title = :publication_title, publication_text = :publication_text, 
                publication_status = :publication_status WHERE profile_id = :profile_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['publication_title'=>$this->publication_title, 'publication_text'=>$this->publication_text, 
                'publication_status'=>$this->publication_status, 'profile_id'=>$this->profile_id]);
            }
    
            public function delete($publication_id) {
                $SQL = 'DELETE FROM publication WHERE publication_id = :publication_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['publication_id'=>$publication_id]);
            }
        }