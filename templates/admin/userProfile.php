<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if(!empty($redi)):?>
    <meta http-equiv="refresh" content="0;/admin/search?userID=<?php echo $sUser['id'] ?>">
    <?php endif; ?>
    <?php echo $bs ?>
    <link href="../templates/css/<?php echo $style ?>/style.css" rel="stylesheet">

    <title><?php echo $title ?></title>
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

<a href="/adminPanel"><div style="text-align: center;">Администратор:</div></a>
<br>
<div class="center" style="width: 100%">
    <div class="card" style='width: 600px; height: 105px; margin: 0 auto;'>
        <div class="card-header" style="background-color: #dc3545">
            ID: <?php echo $user['id'] ?>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p><?php echo $user['surname'] ?>  <?php echo $user['username'] ?> <?php echo $user['secondname'] ?> </p>
            </blockquote>
        </div>
    </div>
</div>
<hr style="width: 90%; margin: 10px auto;">

<div class="center" style="margin: 0 auto; width: 90%; text-align: center; font-size: 18pt; background-color: #d6d6d6">Информация о пользователи №<?php echo $sUser['id'] ?></div>

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
            <?php echo $sUser['surname'] ?>
        </td>
        <td>
            <?php echo $sUser['username'] ?>
        </td>
        <td>
            <?php echo $sUser['secondname'] ?>
        </td>
        <td>
            <?php echo $sUser['rank'] ?>
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
        <td>
            Дата рождения
        </td>
        <td>
            Права пользователя
        </td>
    </tr>
    </thead>
    <tr>
        <td><?php echo $sUser['club'] ?></td>
        <td><?php echo $rankName[$sUser['curRank']] ?> (ID:<?php echo $sUser['curRank'] ?>)</td>
        <td><?php echo $sUser['dateBirth'] ?></td>
        <td><?php echo $sUser['root'] ?></td>
    </tr>
</table>

<table style="width: 70%; margin: 15px auto; border: 1px solid #e5e5e5; border-radius: 80px;">
    <tr>
        <td>
            <form action="/changeRank?userID=<?php echo $sUser['id'] ?>" method="post">
                <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 20px auto;">
                    <input type="text" class="form-control" placeholder="Введите новое звание" aria-label="Белый пояс"
                           aria-describedby="button-addon2" name="newRank">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Поменять</button>
                </div>
            </form>
        </td>
        <td>
            <form action="/changeClub?userID=<?php echo $sUser['id'] ?>" method="post">
                <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 20px auto;">
                    <input type="text" class="form-control" placeholder="Введите название клуба" aria-label="Белый пояс"
                           aria-describedby="button-addon2" name="newClub">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Поменять</button>
                </div>
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <form action="/changeUserPassword?userID=<?php echo $sUser['id'] ?>" method="post">
                <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 20px auto;">
                    <input type="text" class="form-control" placeholder="Введите новый пароль" aria-label="Белый пояс"
                           aria-describedby="button-addon2" name="newPassword">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Поменять</button>
                </div>
            </form>
        </td>
        <td>
            <form action="/changeUserDOB?userID=<?php echo $sUser['id'] ?>" method="post">
                <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 20px auto;">
                    <input type="text" class="form-control" placeholder="Введите новую дату рождения *" aria-label="Белый пояс"
                           aria-describedby="button-addon2" name="newDOB">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Поменять</button>
                </div>
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <form action="/addNewRankId?userID=<?php echo $sUser['id'] ?>" method="post" style="border: 1px solid #e5e5e5; border-radius: 7px;">
                <label for="" style="margin-top: 10px;">Добавить новую запись о звании</label>
                <hr>
                <label for="dateTake">Дата получения</label>
                <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 0 auto;">
                    <input type="date" class="form-control" placeholder="Формат: 2017-12-31" aria-label="Белый пояс"
                           aria-describedby="button-addon2" name="dateTake">
                </div>
                <label for="dateTake">Номер ранга</label>
                <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 0px auto;">
                    <input type="number" class="form-control" placeholder="Формат: 7" aria-label="Белый пояс"
                           aria-describedby="button-addon2" name="rankName">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Поменять</button>
                </div>
            </form>
        </td>
        <td>
            <form action="/addNewPay?userID=<?php echo $sUser['id'] ?>" method="post" style="border: 1px solid #e5e5e5; border-radius: 7px;">
                <label for="" style="margin-top: 10px;">Добавить новую запись о платеже</label>
                <hr>
                <label for="dateTake">Дата платежа</label>
                <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 0 auto;">
                    <input type="date" class="form-control" placeholder="Формат: 2017-12-31 *" aria-label="Белый пояс"
                           aria-describedby="button-addon2" name="datePay">
                </div>
                <label for="dateTake">За какой год платеж</label>
                <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 0px auto;">
                    <input type="date" class="form-control" placeholder="Формат: Формат: 2017-01-01 *" aria-label="Белый пояс"
                           aria-describedby="button-addon2" name="yearPay">
                </div>
                <label for="dateTake">Сумма платежа</label>
                <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 0px auto;">
                    <input type="number" class="form-control" placeholder="Формат: 1000 *" aria-label="Белый пояс"
                           aria-describedby="button-addon2" name="sumPay">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Поменять</button>
                </div>
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <form action="/changeRootUser?userID=<?php echo $sUser['id'] ?>" method="post">
                <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 20px auto;">
                    <input type="number" class="form-control" placeholder="Введите новое значение доступа" aria-label="Белый пояс"
                           aria-describedby="button-addon2" name="newRoot">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Поменять</button>
                </div>
            </form>
        </td>
        <td>
            <form action="#" method="post">
                <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 20px auto;">
                    <input type="text" class="form-control" placeholder="Введите имя *" aria-label="Белый пояс"
                           aria-describedby="button-addon2" name="newName">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Поменять</button>
                </div>
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <a href="#" class="btn btn-warning" style="width: 600px; height: 40px;">
                Перейти к списку званий пользователя
            </a>
        </td>
        <td>
            <form action="#" method="post">
                <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 20px auto;">
                    <input type="text" class="form-control" placeholder="Введите фамилию *" aria-label="Белый пояс"
                           aria-describedby="button-addon2" name="newSurname">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Поменять</button>
                </div>
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <a href="#" class="btn btn-warning" style="width: 600px; height: 40px;">
                Перейти к списку семенаров посещенных пользователем
            </a>
        </td>
        <td>
            <form action="#" method="post">
                <div class="input-group mb-3" style="width: 600px; height: 40px; margin: 20px auto;">
                    <input type="text" class="form-control" placeholder="Введите отчество *" aria-label="Белый пояс"
                           aria-describedby="button-addon2" name="newSecondname">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Поменять</button>
                </div>
            </form>
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
