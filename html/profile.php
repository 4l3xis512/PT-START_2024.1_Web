<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MY_SITE</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
             integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
        <link rel="stylesheet" href="css/style.css">
    </head>

<body>
    <div class="container nav_bar">
        <div class="row">
            <div class="row">
                <div class="col-2 nav_logo"></div>
                <div class="col-10">
                    <div class="nav_text"> Коротко обо мне как о человеке! :)</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Люблю ботанить и творить ересь. Вот прикольная обезьяна:</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <div class="row monkey"></div>
                <div class="col-5 title_photo">
                    <h5>Автор фото: missingno</h2>
                </div>
            </div>
            <div class="col-5"><h3> К сожалению ей стало плохо при фотосьемке и пришлось снять её в коме :(</h3></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class=" button_js col-12">
                <button id="myButton">Click clickity click</button>
                <p id="demo"></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="hello col-12">
                <h1 class="hello">
                    Haaai, <?php echo $_COOKIE['User']; ?>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                    <div class="row form__reg"><input type="text" class="form" type="text" name="title" placeholder="Заголовок вашего поста"></div>
                    <div class="row form__reg"><textarea name="text" cols="30" rows="10" placeholder="Введите текст вашего поста..."></textarea></div>
                    <input type="file" name="file" /><br>
                    <div class="row form__reg"><button type="submit" class="btn_red" name="submit">СОХРАНИТЬ ВАШ ПОСТ</button></div>
                </form>
            </div>
        </div> 
    </div>
    <script type="text/javascript" src="js/my_button.js"></script>
</body>
</html>

<?php
require_once('db.php');

$link = mysqli_connect('db', 'root', 'kali', 'first');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text ) die("Заполните пожалуйста все поля.");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if(!mysqli_query($link, $sql)) {
        echo "Ошибка, пост не удалось создать. Решение: незнаю, блин, спроси у админа";
    }
}

if (!empty($_FILES["file"])){
    if (((@$_FILES["file"]["type"]== "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
    || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
    || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
    && (@$_FILES["file"]["size"] < 102400))
    {
        move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
        echo "Load in: " . "upload/" . $_FILES["file"]["name"];
    }
    else
    {
        echo "upload failed!";
    }
}

?>
