<?php
require_once "connect.php";
session_start();
$id_user_session = !empty($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
$idEvent = !empty($_GET['EventId']) ? $_GET['EventId'] : false;
$query = "select * from events where id_event = '$idEvent'";
$result = mysqli_fetch_array(mysqli_query($con, $query));
include "header.php";
?>
<div class="container">
    <div class="eventTitle">
        <div class="leftEvent">
            <img src="/assets/img/<?= $result['photo'] ?>" alt="<?= $result['photo'] ?>">
        </div>
        <div class="rightEvent">
            <h1><?= $result['title'] ?></h1>
            <p class="event-description"><?= $result['description'] ?></p>
            <p class="event-price">Цена: <?= $result['price'] ?>₽</p>
        </div>
    </div>
    <?php
    $today = date("Y-m-d");
    if (!empty($_SESSION['id_user'])) {
    ?>
        <div class="bookingEvent">
            <h1>Понравилось мероприятие?</h1>
            <h3>Скорее оставляйте заявку!</h3>
            <form action="/bookingDB.php" class="formEvent" method="post">
                <input type="hidden" name="id_user" value="<?= $id_user_session ?>">
                <input type="hidden" name="event" value="<?= $idEvent ?>">
                <label for="date_booking">Дата бронирования</label>
                <input type="date" placeholder="Дата" name="date" value="<?=$today?>" min="<?=$today?>" required style = "padding-left:20px;" >
                <label for="count">Количество гостей</label>
                <input type="text" placeholder="Количество людей" pattern="^[ 0-9]+$" name="quantity" required>
                <label for="comment">Комментарий</label>
                <textarea id="description" name="description" required placeholder="Комментарий" style="margin-top: 10px; padding:10px 0 0 20px; height:200px;"></textarea>
                <button class="btn btn-success" type="submit" style="margin-top: 15px; width:150px;">Отправить</button>
            </form>
        </div>

<?
    }else{
        ?>
        <h2 style="margin-top: 30px;">Для подачи заявки вы должны быть авторизированы!</h2>
        
        <?
    }
?>
</div>
