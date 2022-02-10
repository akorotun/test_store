<?php
    require 'DB.php';

    class Products {
        private $_db = null;
        public $total = 0;

        public function __construct() {
            $this->_db = DB::getInstence();// подключились к базе данных
        }

        public function getProducts() {
            $result = $this->_db->query("SELECT * FROM `products` ORDER BY `id` DESC");
            return $result->fetchAll(PDO::FETCH_ASSOC);//преобразуем данные из базы данных в ассоциативный массив
        }

        public function getProductsLimited($order, $limit, $per_page) {
            $result = $this->_db->query("SELECT * FROM `products` ORDER BY $order ASC LIMIT $limit, $per_page");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProductsCategory($category) {
            $result = $this->_db->query("SELECT * FROM `products` WHERE `category` = '$category' ORDER BY `id` DESC");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOneProduct($id) {
            $result = $this->_db->query("SELECT * FROM `products` WHERE `id` = '$id'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public function getProductsCart($items) {
            //выберем все записи, у которых id равен ... или ... или ... IN ($items)
            $result = $this->_db->query("SELECT * FROM `products` WHERE `id` IN ($items)");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getCountProducts() {
            $result = $this->_db->query("SELECT COUNT('*') as count_products FROM `products` ORDER BY `id` DESC");
            $result = $result->fetch(PDO::FETCH_ASSOC);
//          var_dump($result);
//          die();
            return $result['count_products'];
        }

    }
