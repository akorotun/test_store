<?php

    class Categories extends Controller
    {
        public function index($params = '') {
            //создадим объект на основе модели products
            /** @var Products $products */
            $products = $this->model('Products');
            //если без пагинации, то используем $products->getProducts()
            //$data = ['products' => $products->getProducts(), 'title' => 'Все товары на сайте'];
            //$this->view('categories/index', $data);
            //$data['params'] = $params;
            if ($params == '') {
                $limit = 0;
            } else {
                $limit = ($params-1) * 3;
            }
            $count_products = $products->getCountProducts();
            $data = [
                'products' => $products->getProductsLimited('id', $limit, '3'),
                'title' => 'Все товары на сайте',
                'count_products' => $count_products,
                'params' => $params
            ];
            $this->view('categories/index', $data);
        }

        public function shoes() {
            //создадим объект на основе модели products
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('shoes'), 'title' => 'Категория обувь'];
            $this->view('categories/index', $data);
        }

        public function hats() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('hats'), 'title' => 'Категория кепки'];
            $this->view('categories/index', $data);
        }

        public function shirts() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('shirts'), 'title' => 'Категория футболки'];
            $this->view('categories/index', $data);
        }

        public function watches() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('watches'), 'title' => 'Категория часы'];
            $this->view('categories/index', $data);
        }

    }