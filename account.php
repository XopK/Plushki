<?php
include "header.php";
require_once "connect.php";
session_start();
$id = !empty($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
$query = "select * from users where id_user = '$id'";
$info = mysqli_fetch_array(mysqli_query($con, $query));
$events = "select * from bookings join events on bookings.event = events.id_event join status on bookings.status = status.id_status where client = '$id' order by id_booking";
$resultQuery = mysqli_query($con, $events);
?>
<div class="container">
    <h1 style=" margin-top: 20px;">Личный кабинет</h1>
    <div class="userBlock">


        <div class="userInfo">
            <form action="/account.php" method="post" enctype="multipart/form-data">
                <div class="photoForm"><img src="/assets/img/<?= $info['photo'] ?>" alt="<?= $info['photo'] ?>" style="width: 340px; margin-top:30px;">
                    <input type="file" id="photo" name="photo" style="margin-top: 15px;">
                </div>
                <div class="inputUser">
                    <label for="name">Имя</label><input type="text" pattern="[A-Za-zА-Яа-яЁё]{2,}" value="<?= $info['name'] ?>"name="name" >
                    <label for="surname">Фамилия</label><input type="text" pattern="[A-Za-zА-Яа-яЁё]{2,}" value="<?= $info['surname'] ?>" name="surname" >
                    <label for="email">Почта</label><input type="email" value="<?= $info['email'] ?>" name="email" >
                    <label for="phone">Телефон</label><input type="text" value="<?= $info['phone'] ?>" pattern="[0-9]{11}" name="phone">
                    <button type="submit" class="btn btn-success btn-lg" id="buttonFormUser">Редактировать</button>
                </div>
            </form>
        </div>
    </div>
    <h1 style="margin-top: 20px;">Ваши заявки</h1>
    <div class="requestUser">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Мероприятие</th>
                    <th scope="col">Дата бронирования</th>
                    <th scope="col">Количество гостей</th>
                    <th scope="col">Комментарий</th>
                    <th scope="col">Статус</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $coun = 0;
                while ($eventsQuery = mysqli_fetch_array($resultQuery)) {
                    $coun++;
                    $dateB = $eventsQuery['date_booking'];
                    $newDate = date("d.m.Y", strtotime($dateB));
                ?>
                    <tr>
                        <th scope="row"><?= $coun ?></th>
                        <td><a href="/event.php?EventId=<?= $eventsQuery['event'] ?>"><?= $eventsQuery['title'] ?></a></td>
                        <td><?= $newDate ?></td>
                        <td><?= $eventsQuery['amount'] ?></td>
                        <td><?= $eventsQuery['comment'] ?></td>
                        <td><?= $eventsQuery['name_status'] ?></td>
                        <?
                        if ($eventsQuery['status'] == 3 || $eventsQuery['status'] == 2) {
                            if ($eventsQuery['status'] == 3){?>
                            <td>Причина: <?= $eventsQuery['reason'] ?></td>
                            <?
                            }
                        } else {
                        ?>
                            <td><a href="/removeBooking.php?booking=<?=$eventsQuery['id_booking'] ?>" type="button" class="btn btn-warning btn-sm">Отменить</a></td>
                        <?
                        }
                        ?>
                    </tr>
                <?
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
if (!empty($_POST)) {
    if (!empty($_FILES['photo']['tmp_name'])) {
        $name = "assets/img/" . $_FILES['photo']['name'];
        $photo = $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], $name);
    } else {
        $query1 = "select * from users where id_user = '$id'";
        $result1 = mysqli_fetch_array(mysqli_query($con, $query1));
        $photo = $result1['photo'];
    }
    $nameUser = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $query3 = "UPDATE `users` SET `name`='$nameUser',`surname`='$surname', `email`='$email',`phone`='$phone',`photo`='$photo' WHERE id_user = '$id'";
    $result3 = mysqli_query($con, $query3);

    if ($result3) {
        echo "<script>alert('Данные изменены'); location.href = '/account.php';</script>";
    } else {
        echo "<script>alert('Ошибка');</script>";
        echo mysqli_error($con);
    }
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>