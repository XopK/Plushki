<?php
require_once "../connect.php";
$id = !empty($_GET['event']) ? $_GET['event'] : false;
$query = "select * from events where id_event = '$id'";
$result = mysqli_query($con, $query);
$info = mysqli_fetch_array($result)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Админка</title>
</head>

<body>
    <div class="container">
        <h1>Редактирование</h1>
        <img src="/assets/img/<?= $info['photo'] ?>" alt="<?= $info['photo'] ?>" style="width: 600px;">
        <form action="/admin/editDB.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?= $info['id_event'] ?>" name="id">
            <label for="title">Название</label>
            <input type="text" id="title" name="title" value="<?= $info['title'] ?>" required>
            <label for="price">Цена</label>
            <input type="text" id="price" name="price" value="<?= $info['price'] ?>" required>
            <label for="photo">Фото</label><br>
            <input type="file" id="photo" name="photo"><br>
            <label for="description">Описание</label><br>
            <input id="description" name="description" type="text" value="<?= $info['description'] ?>" required></textarea><br>
            <input type="submit" value="Редактировать">
        </form>
        </form>
    </div>
</body>

</html>
<?php
require_once "../connect.php";

if ($_POST) {
    $id = $_POST['id'];
    if (!empty($_FILES['photo']['tmp_name'])) {
        $name = '../assets/img/' . $_FILES['photo']['name'];
        $photo = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tmp_name, $name);
    }else{
       $query1 = "select * from events where id_event = '$id'";
       $result1 = mysqli_fetch_array(mysqli_query($con,$query1));
       $photo = $result1['photo'];
    }
    $title = $_POST['title'];
    $price = $_POST['price'];
    $descr = $_POST['description'];



    $query = "UPDATE `events` SET `title`='$title',`photo`='$photo',`price`='$price',`description`='$descr' WHERE id_event = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Успех'); location.href = '/admin';</script>";
    } else {
        echo "<script>alert('Ошибка');</script>";
        echo mysqli_error($con);
    }
}
