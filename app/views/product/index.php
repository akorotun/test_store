<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?=$data['anons']?>">
    <title><?=$data['title']?></title>

    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/product.css">
    <!-- подключаем шрифты Font Awesome -->
    <script src="https://kit.fontawesome.com/d5dce6c679.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <a href="/categories/<?=$data['category']?>">Назад</a>
        <h1><?=$data['title']?></h1>
        <div class="info">
            <div>
                <img src="/public/img/<?=$data['img']?>" alt="<?=$data['title']?>">
            </div>
            <div>
                <p><?=$data['anons']?></p><br>
                <p><?=$data['text']?></p>
            </div>
            <div>
                <form action="/basket" method="post">
                    <input type="hidden" name="item_id" value="<?=$data['id']?>">
                    <button class="btn">Купить за <?=$data['price']?> грн.</button>
                </form>

            </div>
        </div>
    </div>

    <?php require 'public/blocks/footer.php' ?>

</body>
</html>