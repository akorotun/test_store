<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Страница про компанию">
    <title>Страница про компанию</title>

    <link rel="stylesheet" href="/public/css/main.css">
    <!-- подключаем шрифты Font Awesome -->
    <script src="https://kit.fontawesome.com/d5dce6c679.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1>Про компанию</h1>
        <p>Здесь просто текст про компанию</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque autem consequatur cum dignissimos
            doloremque, dolores dolorum eaque earum enim esse incidunt itaque maiores molestiae nihil non repellat
            temporibus, voluptas voluptatibus.Animi dolorem incidunt itaque nesciunt totam. Corporis cumque dolore,
            dolorum hic illo illum ipsa, minima minus molestiae nisi officia pariatur recusandae, sequi sint soluta
            sunt suscipit tenetur vitae voluptatem voluptatibus! Adipisci aliquid animi aperiam at aut consequatur
            dolore dolorem dolorum eum excepturi facere ipsa natus nemo nihil perspiciatis provident quam quidem
            quisquam quo quod recusandae similique, tempore velit? Consectetur, consequuntur.
        </p><br>

        <?php
        if ($data['params'] != '') {
            echo '<h2>Есть дополнительный параметр</h2><br>Данные из URL: ' . '<b>' . $data['params'] . '</b>';
        }
        ?>
    </div>


    <?php require 'public/blocks/footer.php' ?>

</body>
</html>