<html>
<head>
    <title><?php echo $title ?></title>
    <?php echo $bs ?>
    <link href="templates/css/<?php echo $style ?>/style.css" rel="stylesheet">
    <style>

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
            <?php if($user['root'] > 1):?>
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