<?php
require_once "../connect.php";
$events = "select * from bookings join events on bookings.event = events.id_event join status on bookings.status = status.id_status join users on client = id_user order by date_submission desc";
$resultQuery = mysqli_query($con, $events);
?>
<div class="container">
    <table class="table" style="width: 100%;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Мероприятие</th>
                <th scope="col">Клиент</th>
                <th scope="col">Дата бронирования</th>
                <th scope="col">Дата и время подачи</th>
                <th scope="col">Количество гостей</th>
                <th scope="col">Комментарий</th>
                <th scope="col">Причина отказа</th>
                <th scope="col">Статус</th>

            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            $coun = 0;
            while ($eventsQuery = mysqli_fetch_array($resultQuery)) {
                $coun++;
                $dateB = $eventsQuery['date_booking'];
                $dateS = $eventsQuery['date_submission'];
                $newDate = date("d.m.Y", strtotime($dateB));
                $newDate2 = date("d.m.Y H:i:s", strtotime($dateS));
            ?>
                <tr>
                    <td scope="row"><?= $coun ?></td>
                    <td><?= $eventsQuery['title'] ?></td>
                    <td><?= $eventsQuery['name'] ?> <?= $eventsQuery['surname'] ?></td>
                    <td><?= $newDate ?></td>
                    <td><?= $newDate2 ?></td>
                    <td><?= $eventsQuery['amount'] ?></td>
                    <td><?= $eventsQuery['comment'] ?></td>
                    <td><?= $eventsQuery['reason'] ?></td>
                    <td><?= $eventsQuery['name_status'] ?></td>

                    <?
                    if ($eventsQuery['status'] == 3 || $eventsQuery['status'] == 2) {
                    ?>

                    <?
                    } else {
                    ?>
                        <td>
                            <form action="./bookingStatus.php" method="post" id="no">
                                <label for="reason">Причина</label>
                                <input type="hidden" name="no_id" value="<?= $eventsQuery['id_booking'] ?>">
                                <input type="text" name="reason" required>
                            </form>

                        </td>
                        <td>
                            <button type="submit" class="btn btn-danger btn-sm" form="no">Отклонить</button>
                            <a href="/admin/bookingStatus.php?yes=<?= $eventsQuery['id_booking'] ?>" type="button" class="btn btn-success btn-sm" style="margin-top: 5px;">Принять</a>
                        </td>
                    <?
                    }
                    ?>

                </tr>
            <?
            }
            ?>
        </tbody>
    </table>

</div>