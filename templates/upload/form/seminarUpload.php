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
    <link href="templates/css/<?php echo $style ?>/style.css" rel="stylesheet">
    <link rel="stylesheet" href="templates/css/light/tmpStyle.css">
    <meta charset="utf-8">
    <style>
        body {
            padding: 20px 0;
        }
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
        }
    </style>
</head>
<body>
<div style="width: 15%; margin: 0 auto;">
<form action="/uploadConfirm" enctype="multipart/form-data" method="POST">
        <input type="file" name="excelFile" style="margin-bottom: 10px;"> <br>
        <input type="textarea" name="uploadExcel_desc" style="margin-bottom: 10px;"> <br>
        <input type="submit" value="Upload excel" style="margin-bottom: 10px; float: right;">
</form>
</div>
<hr style="clear: both; margin: 40px auto; width: 85%;">
<table style="width: 90%; margin: 0 auto;">
    <thead>
    <tr>
        <td>
            uid
        </td>
        <td>
            upload date
        </td>
        <td>
            upload admin
        </td>
        <td>
            upload admin id
        </td>
        <td>
            size (KB)
        </td>
        <td>
            description
        </td>
        <td>
            file name
        </td>
        <td>
            status
        </td>
        <td>
        </td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($semUploads as $key => $value):?>
    <tr>
        <?php $id = findId($users, $value['id'])?>
        <td>
            <?php echo $value['uid'] ?>

        </td>
        <td>
            <?php echo makeDate($value['dateUpload']) ?>

        </td>
        <td>
            <?php echo $users[$id]['surname'] ?>
            <?php echo $users[$id]['username'] ?>
            <?php echo $users[$id]['secondname'] ?>
        </td>
        <td>
            <a href="/admin/search?userID=<?php echo $value['id'] ?>"><?php echo $value['id'] ?></a>
        </td>
        <td>
            <?php echo $value['fileSize'] ?>
        </td>
        <td>
            <?php echo $value['descr'] ?>
        </td>
        <td>
            <?php echo $value['nameFile'] ?>
        </td>
        <td class="status__code__<?php echo $value['status'] ?>">
            <?php echo $statusCode[$value['status']] ?>
        </td>
        <?php if($value['status'] == 0): ?>
        <td>
            <a href="/seminars/update?semID=<?php echo $value['uid'] ?>" class="btn btn-warning">
                Update database
            </a>
        </td>
        <?php endif; ?>
        <?php if($value['status'] == 1): ?>
            <td>
                <a href="/seminars/deleteFileFromServer?semID=<?php echo $value['uid'] ?>&fileName=<?php echo $value['nameFile'] ?>" class="btn btn-success">
                    Delete File
                </a>
            </td>
        <?php endif; ?>
        <?php if($value['status'] == 4): ?>
            <td>
                <a href="#" class="btn btn-danger">
                    Button
                </a>
            </td>
        <?php endif; ?>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
<?php
