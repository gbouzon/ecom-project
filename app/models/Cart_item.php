<?php
    namespace app\models;

        class cart extends \app\core\Model {

            function __construct() {
                parent::__construct();
            }
               
            function get($cart_item_id) {
                $SQL = 'SELECT * FROM cart_item WHERE cart_item_id = :cart_item_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['cart_item_id'=>$cart_item_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Cart_item");
                return $STMT->fetch();
            }

            function getAllByCart($cart_id) {
                $SQL = 'SELECT * FROM cart_item WHERE cart_id = :cart_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['cart_id'=>$cart_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Cart_item");
                return $STMT->fetchAll();
            }
            

            // countinue there not finish
            function insert() {
                $SQL = 'INSERT INTO cart_item(cart_id, product_id, product_quantity, price)VALUES(:cart_id, :product_id, :product_quantity, :price)';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['store_id'=>$this->store_id, 'user_id'=>$this->user_id, 'product_id'=>$this->product_id, 'cart_total'=>$this->cart_total]);
            }

            function deleteProduct() {
                $SQL = 'DELETE FROM cart WHERE cart_id = :cart_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['cart_id'=>$this->cart_id]);
            }

            function deleteAllProduct($user_id) {
                $SQL = 'DELETE FROM cart WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$user_id]);
            }
        }