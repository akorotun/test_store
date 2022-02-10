<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Корзина товаров">
    <title>Корзина товаров</title>

    <link rel="stylesheet" href="/public/css/main.css"><!-- charset="utf-8" - шторм зачеркивает charset -->
    <link rel="stylesheet" href="/public/css/products.css">

    <!-- подключаем шрифты Font Awesome -->
    <script src="https://kit.fontawesome.com/d5dce6c679.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1>Корзина товаров</h1>
        <?php if (count($data['products']) == null): ?>
            <p><?=$data['empty']?></p>
        <?php else: ?>
            <form action="/basket" method="post">
                <input type="hidden" name="delete_session" value="удалить сессию">
                <button type="submit" class="btn">Удалить все</button>
            </form>
        <div class="products">
            <?php
                $sum = 0;
                for ($i = 0; $i < count($data['products']); $i++):
                    $sum += $data['products'][$i]['price'];
            ?>
                <div class="row">
                    <img src="/public/img/<?=$data['products'][$i]['img']?>" alt="<?=$data['products'][$i]['title']?>">
                    <h4><?=$data['products'][$i]['title']?></h4>
                    <span><?=$data['products'][$i]['price']?> грн.</span>
                    <form action="/basket" method="post">
                        <input type="hidden" name="id" value="<?=$data['products'][$i]['id']?>">
                        <button type="submit" class="btn">Удалить</button>
                    </form>
                </div>
            <?php endfor; ?>
            <button class="btn">Купить (<b><?=$sum?> грн.</b>)</button>
            <br>
        </div>

        <?php endif;?>

    </div>

    <?php require 'public/blocks/footer.php' ?>

</body>
</html>