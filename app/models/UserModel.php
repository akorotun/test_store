<?php
    require 'DB.php';

    class UserModel {
        private $name;
        private $email;
        private $pass;
        private $re_pass;

        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        public function setData($name, $email, $pass, $re_pass)
        {
            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
            $this->re_pass = $re_pass;
        }

        //проверим поля в форме
        public function validForm() {
            if (strlen($this->name) < 3)
                return "Имя слишком короткое";
            elseif (strlen($this->email) < 3)
                return "Email слишком короткий";
            elseif (strlen($this->pass) < 3)
                return "Пароль должен быть не менее 3-х символов";
            elseif ($this->pass != $this->re_pass)
                return "Пароли не совпадают";
            else
                return 'Верно';
        }

        //добавление пользователя в базу данных
        public function addUser() {
            $sql = 'INSERT INTO users(name, email, pass) VALUES(:name, :email, :pass)';
            $query = $this->_db->prepare($sql);

            //Надо пароль хешировать
            //можно использовать функции md5() или sha1(), но они уже устарели
            //функция password_hash() новая, количество символов 60,
            //но функция password_hash() еще усовершенствуется, количество символов будет больше, поэтому можно поставить сразу 255
            $pass = password_hash($this->pass, PASSWORD_DEFAULT);
            $query->execute(['name' => $this->name, 'email' => $this->email, 'pass' => $pass]);
//            var_dump($pass);
//            die();
            $this->setAuth($this->email);
        }

        public function getUser() {
            $email = $_COOKIE['login'];
            $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
            return $result->fetch(PDO::FETCH_ASSOC);//преобразуем данные из базы данных в ассоциативный массив
        }

        public function logOut() {
            setcookie('login', $this->email, time() - 3600, '/');//удаляем cookie
            unset($_COOKIE['login']);
            header('Location: /user/auth');
        }

        public function auth($email, $pass) {
            $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
            $user = $result->fetch(PDO::FETCH_ASSOC);

            //сделаем проверку - существует ли такой пользователь
            if ($user['email'] == '')
                return 'Пользователя с таким email не существует';
            //проверим пароль - есть спец функция password_verify
            else if (password_verify($pass, $user['pass']))
                $this->setAuth($email);
            else
                return 'Пароли не совпали';
        }

        public function setAuth($email) {
            setcookie('login', $email, time() +3600, '/');
            header('Location: /user/dashboard');
        }

        //название файла записываем в таблицу по конкретному пользователю
        public function getFile()
        {
            $user = $this->getUser();
            $id = $user['id'];
            $new_image = $_FILES['user_file']['name'];
            if($new_image != null) {
                $sql = "UPDATE users SET image = '$new_image' WHERE id = $id";
                $query = $this->_db->prepare($sql);
                $query->execute();
            }
            else
                return 'файла нет';

        }
    }