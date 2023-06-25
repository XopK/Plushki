<?php
session_start();
require_once "../connect.php";
$no = !empty($_GET['no']) ? $_GET['no'] : false;
$yes = !empty($_GET['yes']) ? $_GET['yes'] : false;

if (isset($no) || isset($yes)) {
    $_SESSION['status'];
    if (!empty($no)) {
        $query = "UPDATE `bookings` SET `status`= 3 WHERE id_booking = '$no'";
        $result = mysqli_query($con, $query);
    } else {
        $query2 = "UPDATE `bookings` SET `status`= 2 WHERE id_booking = '$yes'";
        $result2 = mysqli_query($con, $query2);
    }
    if ($result || $result2) {
        echo "<script>alert('Успех'); location.href = '/admin';</script>";
    } else {
        echo "<script>alert('Ошибка');</script>";
    }
}
