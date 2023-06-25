<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Плюшка</title>
</head>
<body>
    <header>
        <div class="logo">
            <a href="/"><img src="/assets/img/logo.png" alt="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="../#AboutUs">О нас</a></li>
                <li><a href="/#event">Мероприятия</a></li>
                <li><a href="/#booking">Забронировать</a></li>
            </ul>
        </nav>

        <div class="login-buttons">
            <?php
            $name = !empty($_SESSION['name'])?$_SESSION['name']:false;
            if (!empty($_SESSION['id_user'])) {
                if ($_SESSION['id_user'] != 2) {
                    ?>
                    <a href='/account.php'><button class='register'>Личный кабинет</button></a>
                    <a href='/logout.php'><button class='register'>Выйти</button></a>
                    <?
                }
                if ($_SESSION['id_user'] == 2) {
                    ?>
                    <a href='../admin/index.php'><button class='register'>Админка</button></a>
                    <a href='/logout.php'><button class='register'>Выйти</button></a>
                    <?
                }
            } else {
                ?>
                <a href='/login.php'><button class='login'>Вход</button></a>
                <a href='/registration.php'><button class='register'>Регистрация</button></a>
                <?
            }
            ?>


        </div>
    </header>