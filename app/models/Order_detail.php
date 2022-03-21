<?php
    namespace app\models;

        class Order_detail extends \app\core\Model {

            function __construct() {
                parent::__construct();
            }
               
            function get($order_detail_id) {
                $SQL = 'SELECT * FROM order_detail WHERE order_detail_id = :order_detail_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['order_detail_id'=>$order_detail_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Order_detail");
                return $STMT->fetch();
            }

            function getProduct($product_id) {
                $SQL = 'SELECT * FROM order_detail WHERE product_id = :product_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['product_id'=>$product_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Order_detail");
                return $STMT->fetch();
            }

            function getOrder($order_id) {
                $SQL = 'SELECT * FROM order_detail WHERE order_id = :order_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['order_id'=>$order_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Order_detail");
                return $STMT->fetchAll();
            }

            function getByUser($user_id) {
                $SQL = 'SELECT * FROM order_detail WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$user_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Order_detail");
                return $STMT->fetchAll();
            }

            
            function insert() {
                $SQL = 'INSERT INTO order_detail(order_id, product_id, quantity, price)VALUES(:order_id, :product_id, :quantity, :price)';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['order_id'=>$this->order_id, 'product_id'=>$this->product_id, 'quantity'=>$this->quantity, 'price'=>$this->price]);
            }

            function delete() {
                $SQL = 'DELETE FROM order_detail WHERE order_detail_id = :order_detail_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['order_detail_id'=>$this->order_detail_id]);
            }

            function clearCart($order_id) {
                $SQL = 'DELETE FROM order_detail WHERE order_id = :order_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['order_id'=>$order_id]);
            }

            function update() {

            }
        }