<?php
require_once "../connect.php";
if (isset($_FILES['photo']['tmp_name'])) {
    $name = '../assets/img/' . $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp_name, $name);
}
if ($_POST) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $photo = $_FILES['photo']['name'];
    $descr = $_POST['description'];



    $query = "insert into events(id_event, title, photo, price, description) values (null, '$title', '$photo', '$price', '$descr')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Успех'); location.href = '/admin';</script>";
    } else {
        echo "<script>alert('Ошибка');</script>";
        echo mysqli_error($con);
    }
}
