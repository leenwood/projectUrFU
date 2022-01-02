<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

<div class="center" style="margin: 0 auto; width: 90%; text-align: center; font-size: 18pt; background-color: #d6d6d6">Информация о пользователи №<?php echo $seminar['uid'] ?></div>
<table>
    <thead>
    <tr>
        <td>

        </td>
    </tr>
    </thead>
</table>
</body>
</html>
<?php
