<html>
<head>
    <title><?php echo $title ?></title>
    <?php echo $bs ?>
    <link href="templates/css/<?php echo $style ?>/style.css" rel="stylesheet">
    <link rel="stylesheet" href="templates/css/light/tmpStyle.css">
    <meta charset="utf-8">
</head>
<body>

<form action="/uploadConfirm" enctype="multipart/form-data" method="POST">
    <input type="file" name="excelFile">
    <input type="submit" value="Upload excel">
</form>


</body>
</html>
<?php
