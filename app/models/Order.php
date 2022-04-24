<?php
    namespace app\models;

        class order extends \app\core\Model {

            function __construct() {
                parent::__construct();
            }
               
            function get($order_id) {
                $SQL = 'SELECT * FROM `order` WHERE order_id = :order_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['order_id'=>$order_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Order");
                return $STMT->fetch();
            }

            function getStoreOrder($store_id){
                $SQL = 'SELECT `order`.*,user.first_name, user.middle_name, user.last_name
                FROM `order`
                INNER JOIN user
                ON `order`.`user_id` = user.user_id
                WHERE `order`.`store_id` = :store_id 
                AND `order`.order_status != 0 AND `order`.order_status != 4
                ORDER BY `order`.order_status' ; 
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['store_id'=>$store_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Order");
                return $STMT->fetchAll();
            }

            function getStoreClosedOrder($store_id){
                $SQL = 'SELECT `order`.*,user.first_name, user.middle_name, user.last_name
                FROM `order`
                INNER JOIN user
                ON `order`.`user_id` = user.user_id
                WHERE `order`.`store_id` = :store_id AND `order`.order_status = 4'; 
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['store_id'=>$store_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Order");
                return $STMT->fetchAll();
            }

            function getUserOrder($user_id){
                $SQL = 'SELECT `order`.*, store.store_name, store.store_address 
                FROM `order` 
                INNER JOIN store
                ON `order`.`store_id` = store.store_id
                WHERE `order`.user_id = :user_id AND `order`.order_status != :order_status
                ORDER BY `order`.order_status'; 
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$user_id, 'order_status'=> 0]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Order");
                return $STMT->fetchAll();
            }

            function getUserCart($user_id) {
                $SQL = 'SELECT * FROM `order` WHERE user_id = :user_id AND order_status = :order_status';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$user_id, 'order_status'=> 0]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Order");
                return $STMT->fetch();
            }
            
            function getAllFromUser($user_id) {
                // where status is != to 0
                $SQL = 'SELECT * FROM `order` WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$user_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Order");
                return $STMT->fetchAll();
            }

            function getAllFromStore($store_id) {
                $SQL = 'SELECT * FROM `order` WHERE store_id = :store_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['store_id'=>$store_id ]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Order");
                return $STMT->fetchAll();
            }
        
            function create() {
                $SQL = 'INSERT INTO `order`(store_id, user_id)VALUES(:store_id, :user_id)';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['store_id'=>$this->store_id, 'user_id'=>$this->user_id]);
                $this->order_id = self::$_connection->lastInsertId();
            }

            function delete() {
                $SQL = 'DELETE FROM `order` WHERE order_id = :order_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['order_id'=>$this->order_id]);
            }

            
            function updateStore_id($store_id) {
                $SQL = 'UPDATE `order` SET store_id  = :store_id WHERE order_id = :order_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['store_id'=>$store_id,'order_id'=>$this->order_id]);
            }

            function updateStatus($status) {
                $SQL = 'UPDATE `order` SET order_status  = :status WHERE order_id = :order_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['status'=>$status,'order_id'=>$this->order_id]);
            }

            function addTotal($total) {
                $SQL = 'UPDATE `order` SET total  = :total WHERE order_id = :order_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['total'=>$total,'order_id'=>$this->order_id]);
            }
        }