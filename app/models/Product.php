<?php
    namespace app\models;

        class Product extends \app\core\Model {

            function __construct() {
                parent::__construct();
            }
               
            function get($product_id) {
                $SQL = 'SELECT * FROM product WHERE product_id = :product_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['product_id'=>$product_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Product");
                return $STMT->fetch();
            }
        
            function getAllFromStore($store_id) {
                $SQL = 'SELECT * FROM product WHERE store_id = :store_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['store_id'=>$store_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Product");
                return $STMT->fetchAll();
            }
        
            function insert() {
                $SQL = 'INSERT INTO product(store_id, product_name, product_image, product_availability, product_price, product_description) 
                VALUES(:store_id, :product_name, :product_image, :product_availability, :product_price, :product_description)';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['store_id'=>$this->store_id, 'product_name'=>$this->product_name, 'product_image'=>$this->product_image, 'product_availability'=>$this->product_availability,
                'product_price'=>$this->product_price, 'product_description'=>$this->product_description]);
            }

            function delete() {
                $SQL = 'DELETE FROM product WHERE product_id = :product_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['product_id'=>$this->product_id]);
            }

            function update() {
                $SQL = 'UPDATE product SET store_id  = :store_id, product_name = :product_name, product_image = :product_image, product_price = :product_price, product_description = :product_description WHERE product_id = :product_id';
    
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['store_id'=>$this->store_id, 'product_name'=>$this->product_name, 'product_image'=>$this->product_image, 
                'product_price'=>$this->product_price, 'product_description'=>$this->product_description, 'product_id' =>$this->product_id]);
            }
            
            function isAvailable($isAvailable) {
                if (!$isAvailable) {
                    $SQL = 'UPDATE product SET product_availability = 0 WHERE product_id = :product_id';
                    $STMT = self::$_connection->prepare($SQL);
                    $STMT->execute(['product_id'=>$this->product_id]);
                }
                else if ($isAvailable) {
                    $SQL = 'UPDATE product SET product_availability = 1 WHERE product_id = :product_id';
                    $STMT = self::$_connection->prepare($SQL);
                    $STMT->execute(['product_id'=>$this->product_id]);
                }  
            }
        }