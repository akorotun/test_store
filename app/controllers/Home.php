<?php
    class Home extends Controller {
        public function index() {
            $products = $this->model('Products');// создали объект на основе модели Products

            $this->view('home/index', $products->getProducts());//обратились к функции в этой модели
        }
    }