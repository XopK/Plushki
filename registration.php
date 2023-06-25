<?php
session_start();
include "header.php";
require_once "connect.php";
?>
<div class="login-container" style="text-align: center ;">
    <h2 style="margin:20px 0 15px 0;font-family: 'Comfortaa', cursive;text-align:center;">Регистрация</h2>
    <form method="post" action="/registration.php">

        <input type="text" placeholder="Введите имя" name="name" required>


        <input type="text" placeholder="Введите фамилию" name="surname" required>


        <input type="email" placeholder="Введите email" name="email" required>

        <input type="text" placeholder="Введите номер телефона" name="phone" required>

        <input type="password" placeholder="Введите пароль" name="password" required>

        <button type="submit" style = "margin-bottom:10px;">Зарегистрироваться</button>
    </form>
    <a href="/login.php">Авторизация</a>
</div>
<?php
if (!empty($_POST)) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $check = "select * from users where email = '$email' limit 1";
    $checkResult = mysqli_query($con, $check);

    if ($checkResult) {
        ?>
        <div class='alert alert-warning' role='alert' id='block-to-remove'>
                <button type='button' class='btn-close' aria-label='Close' onclick='removeBlock()'></button>
                <h3>Ошибка регистрации</h3>
                <p>Пользователь с такой почтой уже есть!</p>
            </div>
        <?
    } else {
        $query = "insert into users(id_user, name, surname, password, email, phone, photo, roles) values (null, '$name', '$surname', '$password', '$email', '$phone', 'unknownUser.png', '2')";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<script>alert('Успех'); location.href = '/';</script>";
        } else { ?>
            <div class='alert alert-danger' role='alert' id='block-to-remove'>
                <button type='button' class='btn-close' aria-label='Close' onclick='removeBlock()'></button>
                <h3>Ошибка регистрации</h3>
                <p>Проверьте введеные данные</p>
            </div>
<?
        }
    }
}
?>