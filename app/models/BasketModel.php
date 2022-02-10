<?php
    session_start();

    class BasketModel{
        private $session_name = 'cart';

        public function isSetSession() {
            //установлена ли сейчас сессия
            return isset($_SESSION[$this->session_name]);
        }

        public function deleteSession() {
            //удаляет сессию
            unset($_SESSION[$this->session_name]);
        }

        public function getSession() {
            //возвращает значение, которое было записано в определенную сессию
            return $_SESSION[$this->session_name];
        }

        public function addToCart($itemID) {
            //добавим в сессию id товаров, которые были добавлены в корзину
            //проверим установлена ли сейчас сессия
            if(!$this->isSetSession())
                //если сессия не установлена, то добавляем первый id товара, который хотим приобрести
                $_SESSION[$this->session_name] = $itemID;
            //если же сессия была установлена, то к предыдущему значению добавляем через запятую id нового товара
            else {
                //сначала сделаем, чтобы элемент не добавлялся в сессию, если он уже там есть
                //например - пользователь нажимает несколько раз на кнопку купить
                //разделяем все элементы, которые уже есть в сессии
                $items = explode(",",$_SESSION[$this->session_name]);
                $itemExist = false;
                foreach ($items as $el) {
                    if ($el == $itemID)
                        //если выбираемый товар (itemID) уже есть в сессии (el), тогда
                        $itemExist = true;
                }
                if (!$itemExist)
                    //если такого элемента в сессии нет, то добавляем его в сессию
                    $_SESSION[$this->session_name] = $_SESSION[$this->session_name] . ',' . $itemID;

            }
        }

        public function countItems() {
            //будет подсчитывать количество элементов, которые есть внутри сессии
            if(!$this->isSetSession())
                //если сессия не установлена, то возвращаем количество равное нулю
                return 0;
            else {
                //если же сессия установлено, то
                //разделяем элементы по запятой - функция explode()
                $items = explode(",",$_SESSION[$this->session_name]);

                //возвращаем количество элементов
                return count($items);
            }

        }

        public function delItems($id)
        {
            $_SESSION[$this->session_name] = str_replace("$id", "", $_SESSION[$this->session_name]);
            $_SESSION[$this->session_name] = str_replace(",,", ",", $_SESSION[$this->session_name]);
            $_SESSION[$this->session_name] = trim($_SESSION[$this->session_name], ",");
            return $_SESSION[$this->session_name];
        }
    }