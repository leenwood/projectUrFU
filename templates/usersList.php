<?php
$rankName = [
    0 => 'Пояс джедая',
    1 => "3 КЮ",
    2 => "4 КЮ",
    3 => "5 КЮ",
    4 => "6 КЮ",
    5 => "7 КЮ",
];

$rankColor = [
    1 => '#15580b',
    2 => '#08186A',
    3 => '#ffa500',
    4 => '#ffc0cb',
    5 => '#00a1b3',
];
?>




    <html>
<head>
    <title><?php echo $title ?></title>
    <?php echo $bs ?>
    <link href="../templates/css/<?php echo $style ?>/style.css" rel="stylesheet">
    <link rel="stylesheet" href="templates/css/light/tmpStyle.css">
    <style>
        .container {

        }
        td {
            padding: 5px;
            width: 14%;
        }
        thead {
            background-color: #e9e9e9;
        }
    </style>
</head>
    <body>
    <a href="/"><button type="button" class="btn btn-primary" style="margin: 15px; float: right">Home page</button></a>
    <hr style="width: 90%; clear: both; margin: 20px auto;">
<table style="width: 70%; clear: both; margin: 0 auto;">
    <thead>
    <tr>
        <td>
            Номер пользователя
        </td>
        <td>
            Имя
        </td>
        <td>
            Фамилия
        </td>
        <td>
            Дата рождения
        </td>
        <td>
            Пояс
        </td>
        <td>
            Звания
        </td>
        <td>
            Клуб
        </td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($allUsers as $key => $value): ?>
        <tr>
            <?php if($adminStatus > 1):?>
                <td><a style="text-decoration: none;" href="/admin/search?userID=<?php echo $value['id']?>"><?php echo $value['id']?></a></td>
            <?php else: ?>
                <td><?php echo $value['id']?></td>
            <?php endif; ?>
            <td><?php echo $value['username']?></td>
            <td><?php echo $value['surname']?></td>
            <td><?php echo $value['secondname']?></td>
            <td><?php echo $rankName[$value['curRank']] ?></td>
            <td><?php echo $value['rank']?></td>
            <td><?php echo $value['club']?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
    </body>
    </html>
<?php
