<div class="container addEvent">
    <form action="/admin/addEventDB.php" method="post" enctype="multipart/form-data">
        <label for="title">Название</label>
        <input type="text" id="title" pattern="[A-Za-zА-Яа-яЁё]{2,}" name="title" required>
        <label for="price">Цена</label>
        <input type="text" id="price" pattern="[0-9]+(\.[0-9]{2})?" name="price" required>
        <label for="photo">Фото</label><br>
        <input type="file" id="photo" name="photo" required><br>
        <label for="description">Описание</label><br>
        <textarea id="description" name="description" pattern="[A-Za-zА-Яа-яЁё0-9\s]+ required></textarea><br>
        <input type="submit" value="Добавить мероприятие">
    </form>
</div>