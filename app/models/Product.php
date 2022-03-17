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
                $SQL = 'INSERT INTO product(store_id, product_name, product_image, product_availability, product_quantity, product_price, product_description) 
                VALUES(:store_id, :product_name, :product_image, :product_availability, :product_quantity, :product_price, :product_description)';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['store_id'=>$this->store_id, 'product_name'=>$this->product_name, 'product_image'=>$this->product_image, 'product_availability'=>$this->product_availability,
                'product_quantity'=>$this->product_quantity, 'product_price'=>$this->product_price, 'product_description'=>$this->product_description]);
            }
        
            /* IMPLEMENT THIS LATER
            function update(){
                $SQL = 'UPDATE animal SET name = :name, dob = :dob, picture = :picture WHERE animal_id = :animal_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['name'=>$this->name,'dob'=>$this->dob,'picture'=>$this->picture,'animal_id'=>$this->animal_id]);
            }
        
            function delete($animal_id){
                $SQL = 'DELETE FROM animal WHERE animal_id = :animal_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['animal_id'=>$animal_id]);
            }
            */

        }