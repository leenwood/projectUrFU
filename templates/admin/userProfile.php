<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if(!empty($redi)):?>
    <meta http-equiv="refresh" content="0;/admin/search?userID=<?php echo $userid ?>">
    <?php endif; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="templates/css/<?php echo $style ?>/style.css" rel="stylesheet">

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
<hr style="width: 90%; margin: 10px auto;">

<table style="width: 70%; margin: 15px auto;">
    <thead>
    <tr>
        <td>
            Имя
        </td>
        <td>
            Фамилия
        </td>
        <td>
            Отчество
        </td>
        <td>
            Звание
        </td>
    </tr>
    </thead>
    <tr>
        <td>
            <?php echo $userFIO[0] ?>
        </td>
        <td>
            <?php echo $userFIO[1] ?>
        </td>
        <td>
            <?php echo $userFIO[2] ?>
        </td>
        <td>
            <?php echo $userRank ?>
        </td>
    </tr>
    <thead>
    <tr>
        <td>
            Клуб
        </td>
        <td>
            Текущий пояс
        </td>
    </tr>
    </thead>
    <tr>
        <td><?php echo $clubUser ?></td>
        <td><?php echo $curRankUser ?></td>
    </tr>
</table>


    <form action="/changeRank?userID=<?php echo $userid ?>" method="post">
        <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 20px auto;">
        <input type="text" class="form-control" placeholder="Введите новое звание" aria-label="Белый пояс"
               aria-describedby="button-addon2" name="newRank">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Поменять</button>
            <hr style="width: 600px; left: 400px;">
        </div>
    </form>

    <form action="/changeClub?userID=<?php echo $userid ?>" method="post">
    <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 20px auto;">
        <input type="text" class="form-control" placeholder="Введите название клуба" aria-label="Белый пояс"
               aria-describedby="button-addon2" name="newClub">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Поменять</button>
        <hr style="width: 600px; left: 400px;">
    </div>
    </form>



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
