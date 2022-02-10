<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?=$data['title']?>">
    <title><?=$data['title']?></title>

    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/paginate.css">

    <!-- подключаем шрифты Font Awesome -->
    <script src="https://kit.fontawesome.com/d5dce6c679.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1><?=$data['title']?></h1>
        <div class="products">
            <?php for ($i=0; $i < count($data['products']); $i++): ?>
                <div class="product">
                    <div class="image">
                        <img src="/public/img/<?=$data['products'][$i]['img']?>" alt="<?=$data['products'][$i]['title']?>">
                    </div>
                    <h3><?=$data['products'][$i]['title']?></h3>
                    <p><?=$data['products'][$i]['anons']?></p>
                    <a href="/product/<?=$data['products'][$i]['id']?>"><button class="btn">Детальнее</button></a>
                </div>
            <?php endfor ?>
        </div>

        <div class="paginate">
            <?php
                $count_products = $data['count_products'];// общее количество товаров
                $page = 3;// количество товаров на странице
                $total_pages = ceil($count_products/$page);//количество страниц

                for ($i = 0; $i < $total_pages; $i++)
                {
                    $page_number = $i;
                    echo "<a href='/categories/".($page_number + 1)."'><button class='btn'> ".($i + 1)." </button></a>";
                }
            ?>
        </div>

    </div>

    <?php require 'public/blocks/footer.php' ?>

</body>
</html>