<?php
    namespace app\models;

        class Comment extends \app\core\Model {

            function __construct() {
                parent::__construct();
            }

            function get($publication_comment_id) {
                $SQL = 'SELECT * FROM publication_comment WHERE publication_comment_id = :publication_comment_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['publication_comment_id'=>$publication_comment_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Comment");
                return $STMT->fetch();
            }

            function getAll() { 
                $SQL = 'SELECT * FROM publication_comment ORDER BY timestamp DESC';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute();
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Comment");
                return $STMT->fetchAll();
            }

            function getAllFromProfile($profile_id) {
                $SQL = 'SELECT * FROM publication_comment WHERE profile_id = :profile_id ORDER BY timestamp DESC';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['profile_id'=>$profile_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Comment");
                return $STMT->fetchAll();
            }

            function getAllFromPublication($publication_id) {
                $SQL = 'SELECT * FROM publication_comment WHERE publication_id = :publication_id ORDER BY timestamp DESC';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['publication_id'=>$publication_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Comment");
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

            public function getTimestamp($publication_comment_id) {
                $SQL = 'SELECT timestamp FROM publication_comment WHERE publication_comment_id = :publication_comment_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['publication_comment_id'=>$publication_comment_id]);
                return $STMT->fetch()['timestamp'];
            }

            function insert() {
                $SQL = 'INSERT INTO publication_comment(profile_id, publication_id, comment) 
                VALUES(:profile_id, :publication_id, :comment)';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['profile_id'=>$this->profile_id, 'publication_id'=>$this->publication_id, 
                'comment'=>$this->comment]);
            }
    
            function update($publication_comment_id) {
                $SQL = 'UPDATE publication_comment SET comment = :comment WHERE publication_comment_id = :publication_comment_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['comment'=>$this->comment, 'publication_comment_id'=>$publication_comment_id]);
            }
    
            function delete($publication_comment_id) {
                $SQL = 'DELETE FROM publication_comment WHERE publication_comment_id = :publication_comment_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['publication_comment_id'=>$publication_comment_id]);
            }
        }