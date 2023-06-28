<?php
session_start();
include "header.php";
require_once "connect.php";
?>
<div class="login-container" style="text-align: center ;">
    <h2 style="margin:20px 0 15px 0;font-family: 'Comfortaa', cursive;text-align:center;">Регистрация</h2>
    <form method="post" action="/registration.php">
        <label for="name">Имя</label>
        <input type="text" placeholder="Введите имя" name="name" pattern="[A-Za-zА-Яа-яЁё]{2,}" required>

        <label for="name">Фамилия</label>
        <input type="text" placeholder="Введите фамилию" name="surname" pattern="[A-Za-zА-Яа-яЁё]{2,}" required>
     
        <label for="name">Email</label>
        <input type="email" placeholder="Введите email" name="email" required>

        <label for="name">Номер телефона</label>
        <input type="text" placeholder="Введите номер телефона" name="phone" pattern="[0-9]{11}" required>
        
        <label for="name">Пароль</label>
        <input type="password" placeholder="Введите пароль" name="password" pattern=".{8,}" required>

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
    $checkResult = mysqli_fetch_array(mysqli_query($con, $check));

    if (!empty($checkResult)){
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
            echo "<script>alert('Успешная регистрация'); location.href = '/';</script>";
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