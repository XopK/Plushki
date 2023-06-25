<div class="container addEvent">
    <form action="/admin/addEventDB.php" method="post" enctype="multipart/form-data">
        <label for="title">Название</label>
        <input type="text" id="title" name="title" required>
        <label for="price">Цена</label>
        <input type="text" id="price" name="price" required>
        <label for="photo">Фото</label><br>
        <input type="file" id="photo" name="photo" required><br>
        <label for="description">Описание</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <input type="submit" value="Добавить мероприятие">
    </form>
</div>