<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Админка</title>
</head>

<body>
    <div class="admin">
        <div class="adminnav">
            <h4 style = "margin-left:15px;">Админ-панель</h4>
            <ul>
                <li><a href="/admin/addEvent.php">Добавить мероприятия</a></li>
                <li><a href="/admin/editEvent.php">Редактировать мероприятия</a></li>
                <li><a href="/admin/bookingAdmin.php">Заявки</a></li>
            </ul>
            <a href="../" class="home">На главную</a>
        </div>
        <section id="output"></section>
    </div>
</body>

</html>
<script type="text/javascript">
    let links = document.querySelectorAll('li a');
    let output = document.getElementById('output');

    let ajax = new XMLHttpRequest();
    ajax.addEventListener('readystatechange', function() {
        if (this.readyState == 4 && this.status == 200)
            output.innerHTML = this.responseText;
    });

    function loadHTML(evt) {
        ajax.open('GET', this.href, true);
        ajax.send();
        evt.preventDefault();
    }
    links.forEach((el) => {
        el.addEventListener('click', loadHTML);
    });
</script>