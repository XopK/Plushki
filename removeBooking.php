<?php
require_once "connect.php";
$id_book = !empty($_GET['booking']) ? $_GET['booking'] : false;
$query = "delete from bookings where id_booking = '$id_book'";
$result = mysqli_query($con, $query);

if ($result) {
    echo "<script>alert('Успех'); location.href = '/account.php';</script>";
} else {
    echo "<script>alert('Ошибка');</script>";
    echo mysqli_error($con);
}
