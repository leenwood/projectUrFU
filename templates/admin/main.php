<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../templates/css/<?php echo $style ?>/style.css" rel="stylesheet">

    <title>Панель Администратора</title>
    <style>
        table
        {
            text-align: center;
        }
        thead
        {
            background-color: #e5e5e5;
        }
        td {
            padding: 7px;
            width: 24%;
        }
    </style>
</head>
<body>
<div style="text-align: center; margin-top: 5px"><a href="/" class="btn btn-primary">Вернутся домой</a> <br>Администратор: </div>
<br>
<div class="center" style="width: 100%">
    <div class="card" style='width: 600px; height: 105px; margin: 0 auto;'>
        <div class="card-header" style="background-color: #dc3545">
            ID: <?php echo $_COOKIE['pAccount']?>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p><?php echo $fio[0] ?> <?php echo $fio[1] ?> <?php echo $fio[2] ?></p>
            </blockquote>
        </div>
    </div>
</div>

<?php if(isset($error)):?>
    <div class="warning"><?php echo $error ?></div>
<?php endif; ?>
<?php if(isset($msg)):?>
    <div class="alert"><?php echo $msg ?></div>
<?php endif; ?>

<hr style="width: 90%; margin: 10px auto;">
<table style="width: 80%; margin: 0 auto;">
    <tr>
        <td>
            <form action="/admin/search" method="get">
                <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 10px auto;">
                    <input type="number" class="form-control" placeholder="Введите номер аккаунта пользователя" aria-label="Белый пояс"
                           aria-describedby="button-addon2" name="userID">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1" >Найти</button>
                </div>
            </form>
        </td>
        <td>
            <a href="/usersList" class="btn btn-warning" style="width: 600px; height: 40px;">
                Перейти к списку пользователей
            </a>
        </td>
    </tr>
    <tr>
        <td>
                <a href="/createNewUserForm" class="btn btn-warning" style="width: 600px; height: 40px;">
                    Создать нового пользователя
                </a>
        </td>
        <td>
            <a href="#" class="btn btn-warning" style="width: 600px; height: 40px;">
                Создать новое звание *
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="#" class="btn btn-warning" style="width: 600px; height: 40px;">
                Скачать БД целиком *
            </a>
        </td>
        <td>
            <a href="#" class="btn btn-warning" style="width: 600px; height: 40px;">
                Скачать выгрузку по последнему семенару *
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <form action="#" method="post">
                <label for=""> Найти информацию по посещенным семенарам</label>
                <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 20px auto;">
                    <input type="text" class="form-control" placeholder="Введите ИД пользователя" aria-label="Белый пояс"
                           aria-describedby="button-addon2" name="userid">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Найти</button>
                </div>
            </form>
        </td>
        <td>
            <a href="#" class="btn btn-warning" style="width: 600px; height: 40px;">
                Создать "ивент страницу" *
            </a>
        </td>
    </tr>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>
</html>



<?php
