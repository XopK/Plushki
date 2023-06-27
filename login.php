<?php
include "header.php";
require_once "connect.php";
session_start();
?>
<div class="container">
    <div class="login-container" style="text-align: center ;">
        <h2>Авторизация</h2>
        <form action="/login.php" method="POST">
            <input type="email" placeholder="Почта пользователя" name="Email" required>
            <input type="password" placeholder="Пароль" name="password" pattern=".{8,} required>
            <button type="submit" style = "margin-bottom:10px;">Войти</button>
        </form>
        <a href="/registration.php">Регистрация</a>
    </div>
</div>
<?php
if (!empty($_POST)) {
    $email = $_POST['Email'];
    $password = $_POST['password'];

    $query = "select id_user, email, password, name, roles from users where email = '$email' and password = '$password'";
    $user_info = mysqli_fetch_array(mysqli_query($con, $query));

    if ($user_info) {
        $_SESSION['id_user'] = $user_info['id_user'];
        $_SESSION['name'] = $user_info['name'];
        if ($user_info['roles'] == 1) {
            echo "<script>alert('Здраствуй админ');location.href = '/admin';</script>";
        } else {
            echo "<script>alert('Успешная авторизация');location.href = '/';</script>";
        }
    } else { ?>
        <div class='alert alert-danger' role='alert' id='block-to-remove'>
            <button type='button' class='btn-close' aria-label='Close' onclick='removeBlock()'></button>
            <h3>Ошибка авторизации!</h3>
            <p>проверьте пароль или почту</p>
        </div>
<?
    }
}
?>