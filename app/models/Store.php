<?php
    namespace app\models;

        class Store extends \app\core\Model {

            function __construct(){
                parent::__construct();
            }
    
            function get($store_id) {
                $SQL = 'SELECT * FROM store WHERE store_id = :store_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['store_id'=> $store_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Store");
                return $STMT->fetch();
            }

            function getProducts($store_id) {
                $SQL = 'SELECT * FROM product WHERE store_id = :store_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['store_id'=>$store_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Product");
                return $STMT->fetchAll();
            }
            
            function getLast() {
                $SQL = 'SELECT * FROM store ORDER BY store_id DESC LIMIT 1';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute();
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Store");
                return $STMT->fetch();
            }
    
            function getAll() {
                $SQL = 'SELECT * FROM store';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute();
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Store");
                return $STMT->fetchAll();
            }
    
            function insert($user_id) { 
                if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $user_id) {
                    $SQL = 'INSERT INTO store(user_id, store_name, store_address, description) VALUES(:user_id, :store_name, :store_address, :description)';
                    $STMT = self::$_connection->prepare($SQL);
                    $STMT->execute(['user_id'=>$user_id, 'store_name'=>$this->store_name, 'store_address'=>$this->store_address, 
                    'description'=>$this->description]);
                }
            }
    
            function update() {
                $SQL = 'UPDATE store SET store_name = :store_name, store_address = :store_address, description = :description WHERE store_id = :store_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['store_name'=>$this->store_name, 'store_address'=>$this->store_address, 'description'=>$this->description, 'store_id'=>$this->store_id]);
            }
    
            function delete($store_id) { 
                $SQL = 'DELETE FROM store WHERE store_id = :store_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['store_id'=>$store_id]);
            }
    
            public function getByStoreName($term) { //for searches
                $SQL = 'SELECT * FROM store WHERE store_name LIKE :term';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['term'=>"%$term%"]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Store");
                return $STMT->fetchAll(); 
            }

            public function getByProductName($term) { //for searches
                $SQL = 'SELECT * FROM product WHERE product_name LIKE :term';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['term'=>"%$term%"]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Product");
                return $STMT->fetchAll(); 
            }
        }