<?php
require_once "../connect.php";
$query = "select * from events";
$result = mysqli_query($con, $query);
?>
<div class="containerEdit">
    <?php
    while ($info = mysqli_fetch_array($result)) {
    ?>
        <div class="editItem" style="margin-top:20px;">
            <h3><?= $info['title'] ?></h3>
            <img src="../assets/img/<?= $info['photo'] ?>" alt="<?= $info['photo'] ?> ">
            <div class="btnPanel">
                <a href="/admin/editDB.php?event=<?=$info['id_event']?>"><button class="btn-Edit">Редактировать</button></a>
                <a href="/admin/delDB.php?delete=<?=$info['id_event']?>"><button class="btn-Edit Delete">Удалить</button></a>
            </div>
        </div>
    <?php
    }
    ?>
</div>