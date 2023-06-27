<?php
require_once "connect.php";
if(!empty($_POST)){
    $id_user_booking = $_POST['id_user'];
    $event = $_POST['event'];
    $date_booking = $_POST['date'];
    $quantity = $_POST['quantity'];
    $descrtoption = !empty($_POST['description'])?$_POST['description']:"-";
    $date_create = date("Y-m-d H:i:s");

    $query = "INSERT INTO `bookings`(`id_booking`, `client`, `event`, `date_booking`, `comment`, `amount`, `status`, `reason`, `date_submission`)
    VALUES (null,'$id_user_booking','$event','$date_booking','$descrtoption','$quantity', 1, '-', '$date_create')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Заявка подана'); location.href = '/';</script>";
    } else {
        echo "<script>alert('Ошибка');</script>";
        echo mysqli_error($con);
    }
}
