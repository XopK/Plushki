<?php
include "headerIndex.php";
session_start();
require_once "connect.php";
$id_user_session = !empty($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
$query = "SELECT * FROM `events` ORDER BY `events`.`id_event` DESC";
$result = mysqli_query($con, $query);
$Booking = "select * from events";
$result2 = mysqli_query($con, $Booking);
?>
<main>
    <div class="maintext">
        <h1>Развлекательный центр</h1>
        <h1>"Плюшка"</h1>
    </div>
</main>
<div class="AboutUs" id="AboutUs">
    <h1 style="text-align:center; margin:20px 0 30px 0; font-family: 'Comfortaa', cursive;">О нас</h1>
    <div class="AboutUsText">
        <img src="../assets/img/mainPhoto2.jpg" alt="MainPhoto2">
        <p style="margin:10px 0 0 20px;">
            Добро пожаловать в наш развлекательный центр!
            Мы рады приветствовать вас на нашем сайте,
            где вы можете найти всю необходимую информацию о нашем центре и его услугах.
        </p>
    </div>
    <div class="AboutUsText2">
        <p style="margin-right: 20px;">
            Мы гарантируем безопасность и комфорт наших посетителей,
            поэтому наш центр оборудован современными системами безопасности.
        </p>
        <img src="/assets/img/mainphoto3.jpg" alt="mainPhoto3">
    </div>
</div>
<div class="events" id="event">
    <h1 style="padding: 20px 0 10px 0;">Мероприятия</h1>
    <div class="container">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <?php
                while ($info = mysqli_fetch_array($result)) {
                ?>
                    <div class="carousel-item active">
                        <a href="/event.php?EventId=<?= $info['id_event'] ?>"><img src="/assets/img/<?= $info['photo'] ?>" class="d-block w-100" alt="2"></a>
                        <p style="font-size:30px;"><?= $info['title'] ?></p>
                    </div>
                <?php
                    break;
                }
                ?>

                <?php
                while ($info = mysqli_fetch_array($result)) {
                    unset($info[0]);
                ?>
                    <div class="carousel-item">
                        <a href="/event.php?EventId=<?= $info['id_event'] ?>"><img src="/assets/img/<?= $info['photo'] ?>" class="d-block w-100" alt="3"></a>
                        <p style="font-size:30px;"><?= $info['title'] ?></p>
                    </div>
                <?php
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
            </button>
        </div>

    </div>
</div>
<div class="booking" id="booking">
    <h1 style="text-align:center; margin:30px 0 30px 0; font-family: 'Comfortaa', cursive;">Забронировать</h1>
    <div class="form-block">
        <div class="form-input" style="margin-left: 50px;">
            <img src="/assets/img/1668866937_1-pibig-info-p-galaktika-razvlekatelnii-tsentr-oboi-1.jpg" alt="booking">
        </div>
        <div class="form-text">
            <p style="color: white; margin-left:20px;">Чтобы забронировать место, выберите мероприятие,
                которое вам интересно, и заполните форму бронирования.
                Мы свяжемся с вами в ближайшее время, чтобы подтвердить
                вашу бронь и предоставить дополнительную информацию.
            </p>
            <?php
            if (!empty($_SESSION['id_user'])) {
            ?>
                <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin:10px 0 0 20px;">Оставить заявку</button>
            <?
            } else {
            ?>
                <a href="/login.php" class="btn btn-dark btn-lg" role="button" aria-disabled="true" style="margin:10px 0 0 20px;">Оставить заявку</a>
            <?
            }
            ?>

        </div>
    </div>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"  style="width: 70%;">
        <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            <h1>Заявка</h1>
            <form action="/bookingDB.php" method="post">
                <select class="form-select" aria-label="Default select example" style="margin-bottom: 10px;" name="event">
                    <option selected>Мероприятия</option>
                    <?php
                    while ($Booking1 = mysqli_fetch_array($result2)) {
                    ?>
                        <option value="<?= $Booking1['id_event'] ?>"><?= $Booking1['title'] ?></option>
                    <?
                    }
                    $today = date("Y-m-d");
                    ?>
                </select>
                <input type="hidden" name="id_user" value="<?= $id_user_session ?>">
                <label for="date_booking">Дата бронирования</label>
                <input type="date" name="date" value="<?=$today?>" min="<?=$today?>" required style = "padding-left:20px;">
                <label for="count">Количество гостей</label>
                <input type="text" placeholder="Количество людей" pattern="^[ 0-9]+$" name="quantity" required>
                <label for="comment">Комментарий</label>
                <textarea id="description" name="description" placeholder="Комментарий" style="margin-top: 10px; padding:10px 0 0 20px;"></textarea>
                <button type="submit">Подать заявку</button>
            </form>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>