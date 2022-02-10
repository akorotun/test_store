<?php

    class User extends Controller
    {
        public function reg() {
            $data = [];
            if (isset($_POST['name'])) {
                //создаем объект user на основе класса UserModel
                $user = $this->model('UserModel');
                $user->setData($_POST['name'], $_POST['email'], $_POST['pass'], $_POST['re_pass']);

                //проверяем форму - обращаемся к функции validForm в UserModel
                $isValid = $user->validForm();
                if ($isValid == "Верно")
                    $user->addUser();// обращаемся к функции addUser в UserModel
                //если были ошибки, то в элемент message укажем ту ошибку, которая была записана в переменную $isValid
                else
                    $data['message'] = $isValid;
            }

            $this->view('user/reg', $data);
        }

        public function dashboard() {
            $user = $this->model('UserModel');
            //выйти из кабинета
            if (isset($_POST['exit_btn'])) {
                $user->logOut();
                exit();
            }

            $data ['file_info'] = '';
            if (isset($_FILES['user_file']['name']))  {
                if (($_FILES['user_file']['name'] != '') &&
                    (($_FILES['user_file']['type'] == 'image/png') ||
                        ($_FILES['user_file']['type'] == 'image/jpeg'))) {

                    $uploaddir = 'C:/OpenServer/domains/it017.store/public/img/user/';
                    $uploadfile = $uploaddir . basename($_FILES['user_file']['name']);
                    move_uploaded_file($_FILES['user_file']['tmp_name'], $uploadfile);
                    $user->getFile();
//                    var_dump($_FILES);
//                    die();
                }
                else
                    $data ['file_info'] = 'Вы не указали файл для загрузки';
            }

            $data ['user_info'] = $user->getUser();
            $this->view('user/dashboard', $data);
        }

        public function auth() {
            $data = [];
            if (isset($_POST['email'])) {
                $user = $this->model('UserModel');
                $data['message'] = $user->auth($_POST['email'], $_POST['pass']);
            }

            $this->view('user/auth', $data);
        }

    }