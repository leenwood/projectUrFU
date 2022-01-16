<?php

function makeDate($unix)
{
    return date('Y-m-d g:i A', $unix);
}

function findId($arr, $id)
{
    $arrLen = count($arr);
    for($i=0; $i < $arrLen; $i++) {
        if($arr[$i]['id'] == $id) return $i;
    }
    return -1;
}



?>
<html>
<head>
    <title><?php echo $title ?></title>
    <?php echo $bs ?>
    <link href="../templates/css/<?php echo $style ?>/style.css" rel="stylesheet">
    <style>
    /* update */
    </style>

</head>
<body>
<a href="/"><button type="button" class="btn btn-primary" style="margin: 15px; float: right">Home page</button></a>
<hr style="width: 90%; clear: both; margin: 20px auto;">
<table style="width: 70%; clear: both; margin: 0 auto;">
    <thead>
    <tr>
        <td>
            Номер страницы (UID)
        </td>
        <td>
            ID администратора
        </td>
        <td>
            ФИО администратора
        </td>
        <td>
            Дата загрузки
        </td>
        <td>
            Статус
        </td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($events as $key => $value): ?>
        <tr>
            <?php $id = findId($users, $value['id']) ?>
            <td><?php echo $value['uid'] ?></td>
            <td><?php echo $value['id'] ?></td>
            <td>
                <?php echo $users[$id]['surname'] ?>
                <?php echo $users[$id]['username'] ?>
                <?php echo $users[$id]['secondname'] ?>
            </td>
            <td><?php echo makeDate($value['dateUpload'])?></td>
            <td><?php echo $status[$value['status']]?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>