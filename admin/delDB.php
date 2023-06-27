<?php
require_once "../connect.php";
$del = !empty($_GET['delete']) ? $_GET['delete'] : false;

$query = "delete from events where id_event = '$del' ";
$result = mysqli_query($con, $query);

if ($result) {
    echo "<script>alert('Мероприятие удалено'); location.href = '/admin';</script>";
} else {
    echo "<script>alert('Ошибка удаления');</script>";
    echo mysqli_error($con);
}
