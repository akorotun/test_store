<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Кабинет пользователя">
    <title>Кабинет пользователя</title>

    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/user.css">
    <!-- подключаем шрифты Font Awesome -->
    <script src="https://kit.fontawesome.com/d5dce6c679.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1>Кабинет пользователя</h1>
        <div class="user-info">
            <p>Привет, <b><?=$data['user_info']['name']?></b></p>
            <?=$data['file_info']?>

            <form action="/user/dashboard" method="post" enctype="multipart/form-data">
                <!--- <input type="hidden" name="max_file_size" value="3000"> -->
                <input type="file" name="user_file" value="<?=$_POST['image']?>">
                <button class="btn" id="send">Загрузить</button>
            </form>
            <div class="image">
                <img src="/public/img/user/<?=$data['user_info']['image']?>" alt="<?=$data['user_info']['image']?>" style="max-width: 130px">
            </div>
            <form action="/user/dashboard" method="post">
                <input type="hidden" name="exit_btn">
                <button type="submit" class="btn">Выйти</button>
            </form>

        </div>

    </div>


    <?php require 'public/blocks/footer.php' ?>

</body>
</html>