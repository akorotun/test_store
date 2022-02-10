<?php
    class Contact extends Controller {
        public function index($params = '') {

            $data = [];
            if (isset($_POST['name'])) {
                //создаем объект mail на основе класса ContactModel
                $mail = $this->model('ContactModel');
                $mail->setData($_POST['name'], $_POST['email'], $_POST['age'], $_POST['message']);

                //проверяем форму - обращаемся к функции validForm в ContactModel
                $isValid = $mail->validForm();
                if ($isValid == "Верно")
                    $data['message'] = $mail->mail();// обращаемся к функции mail в ContactModel, сохраняем значение (Сообщение не было отправлено или true) в элемент массива с ключом message
                //если были ошибки, то в элемент message укажем ту ошибку, которая была записана в переменную $isValid
                else
                    $data['message'] = $isValid;
            }
            $data['params'] = $params;
            $this->view("contact/index", $data);
            var_dump($data);
            die();
        }

        public function about($params = '') {
            $data = [];
            $data['params'] = $params;
            $this->view("contact/about", $data);
            //echo $params;
        }
    }