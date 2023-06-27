<?php
session_start();
require_once "../connect.php";
$no = !empty($_GET['no']) ? $_GET['no'] : false;
$yes = !empty($_GET['yes']) ? $_GET['yes'] : false;

if (isset($no) || isset($yes)) {
    $_SESSION['status'];
    $id_user = $_SESSION['id_user'];
    if (!empty($no)) {
        $query_id = "select * from users where id_user = '$id_user'";
        $res = mysqli_fetch_array(mysqli_query($con,$query_id));
        $email = $res['email.com'];
        // несколько получателей
        $to  = "$email"; // обратите внимание на запятую

        // тема письма
        $subject = 'Ответ на заявку';

        // текст письма
        $message = " Ваша заявка принята";

        // Для отправки HTML-письма должен быть установлен заголовок Content-type
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Дополнительные заголовки
        $headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
        $headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";
        $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
        $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

        // Отправляем
        mail($to, $subject, $message, $headers);

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
