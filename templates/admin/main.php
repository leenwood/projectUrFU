<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="templates/css/<?php echo $style ?>/style.css" rel="stylesheet">

    <title>Панель Администратора</title>
</head>
<body>

<div style="text-align: center;">Администратор:</div>
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
    <div class="warning" style="margin: 0 auto;"><?php echo $error ?></div>
<?php endif; ?>

<hr style="width: 90%; margin: 10px auto;">
<div class="center" style="width: 100%">
    <form action="/admin/search" method="get">
    <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 10px auto;">
        <input type="number" class="form-control" placeholder="Введите номер аккаунта пользователя" aria-label="Белый пояс"
               aria-describedby="button-addon2" name="userID">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon1" >Найти</button>
        <hr style="width: 600px; margin: 10px auto;">
    </div>
    </form>
</div>
<div class="input-group mb-3" style="margin-top: 30px; width: 600px; height: 40px; left: 400px;">
    <input type="text" class="form-control" placeholder="Введите звание" aria-label="Белый пояс"
           aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary" type="button" id="button-addon1">Поменять</button>
    <hr style="width: 600px; left: 400px;">
</div>

<div class="input-group mb-3" style="margin-top: 30px; width: 600px; height: 40px; left: 400px;">
    <input type="text" class="form-control" placeholder="Введите новый пароль"
           aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Поменять</button>
    <hr style="width: 600px; left: 400px;">
</div>


<div class="card" style='margin-top: 30px; width: 600px; height: 300px; left: 400px;'>
    <div class="card-body">
        <h5 class="card-title">Иформация о семинарах</h5>

        <p class="card-text">
        <div class="card" style='margin-top: 40px; width: 500px; height: 53px;'>
            <div class="card-body">
                <p class="card-text" style='margin-bottom: 15px;'>
                    Значение 1
                </p>
            </div>
        </div>
        </p>

        <p class="card-text">
        <div class="card" style='margin-top: 40px; width: 500px; height: 53px;'>
            <div class="card-body">
                <p class="card-text" style='margin-bottom: 15px;'>
                    Значение 1
                </p>
            </div>
        </div>
        </p>


    </div>
</div>
<button type="button" class="btn btn-primary" style='margin-top: 30px; margin-left: 1100px;'>Скачать бд</button>



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
