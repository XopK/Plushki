<?php
session_start();
require_once "../connect.php";
$no = !empty($_GET['no']) ? $_GET['no'] : false;
$yes = !empty($_GET['yes']) ? $_GET['yes'] : false;

if (isset($no) || isset($yes)) {
    $_SESSION['status'];
    $id_user = $_SESSION['id_user'];
    $query_id = "select * from bookings join users on bookings.client = users.id_user where id_booking = '$no' or id_booking = '$yes'";
    $res = mysqli_fetch_array(mysqli_query($con, $query_id));
    $email = $res['email'];
    if (!empty($no)) {

        $to = "$email";
        $subject = "Статус заявки";
        $message = "Ваша заявка отклонена";
        $mailheaders = "Content-type:text/plain;charset=windows-1251rn";
        $mailheaders .= "From: dmahmutov12@gmail.com";
        $mailheaders .= "Reply-To: dmahmutov12@gmail.com";
        mail($to, $subject, $message, $mailheaders);

        $query = "UPDATE `bookings` SET `status`= 3 WHERE id_booking = '$no'";
        $result = mysqli_query($con, $query);
    } else {

        $to = "$email";
        $subject = "Статус заявки";
        $message = "Ваша заявка принята";
        $mailheaders = "Content-type:text/plain;charset=windows-1251rn";
        $mailheaders .= "From: dmahmutov12@gmail.com";
        $mailheaders .= "Reply-To: dmahmutov12@gmail.com";
        mail($to, $subject, $message, $mailheaders);

        $query2 = "UPDATE `bookings` SET `status`= 2 WHERE id_booking = '$yes'";
        $result2 = mysqli_query($con, $query2);
    }
    if ($result || $result2) {
        echo "<script>alert('Успех'); location.href = '/admin';</script>";
    } else {
        echo "<script>alert('Ошибка');</script>";
    }
}
