<?php

    class Basket extends Controller
    {
        public function index() {
            $data = [];
            $cart = $this->model('BasketModel');

            if (isset($_POST['id'])) {
                $id_items = $this->model('BasketModel');
                $id_items->delItems($_POST['id']);
            }

            if (isset($_POST['delete_session'])) {
                $id_items = $this->model('BasketModel');
                $id_items->deleteSession();
            }


            //проверим - передаются ли данные методом Post
            if (isset($_POST['item_id'])) {
                //тогда добавляем в сессию новый товар
                $cart->addToCart($_POST['item_id']);
            }

            $data['products'] = [];
            if (!$cart->isSetSession())
                //если сессия не установлена, то устанавливаем в массив data в элемент empty - пустая корзина
                $data['empty'] = 'Пустая корзина';
            else {
                $products = $this->model('Products');
                //помещаем значение сессии в элемент массива data
                //$data['products'] = $cart->getSession(); - если так, то будет через запятую выводиться товары в корзине
                $data['products'] = $products->getProductsCart($cart->getSession());
            }
//            var_dump($data['products']);
//            die();

            $this->view('basket/index', $data);
        }
    }