<?php
    class ContactModel {
        private $name;
        private $email;
        private $age;
        private $message;

        public function setData($name, $email, $age, $message)
        {
            $this->name = $name;
            $this->email = $email;
            $this->age = $age;
            $this->message = $message;
        }

        //проверим поля в форме
        public function validForm() {
            if (strlen($this->name) < 3)
                return "Имя слишком короткое";
            elseif (strlen($this->email) < 3)
                return "Email слишком короткий";
            elseif (!is_numeric($this->age) || $this->age <= 0 || $this->age > 90)//если пользователь ввел не число или ноль или число больше 90, то будет выдавать ошибку
                return "Вы ввели не возраст";
            elseif (strlen($this->message) < 10)
                return "Сообщение слишком короткое";
            else
                return 'Верно';
        }

        //отправка сообщения на электронный адрес
        public function mail() {
            $to = "korotun.it@gmail.com";
            $message = "Имя: " . $this->name . ". Возраст: " . $this->age . ". Сообщение: " . $this->message;
            //помещаем тему письма
            $subject = "=?utf-8?B?".base64_encode("Сообщение с нашего сайта") . "?=";
            //заголовки
            $headers = "From: $this->email\r\nReplay-to: $this->email\r\n\Content-type: text/html; charset=utf-8\r\n";
            $success = mail($to, $subject, $message, $headers);// mail - встроенная функция php

            if (!$success)// если success - false, то будет выводиться ошибка
                return "Сообщение не было отправлено";
            else
                return "Сообщение было отправлено";
        }

    }