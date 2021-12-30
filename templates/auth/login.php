<html>
<head>
    <title><?php echo $title ?></title>
    <?php echo $bs ?>
    <link href="templates/css/<?php echo $style ?>/style.css" rel="stylesheet">
    <style>
        body {
            display: flex;	align-items: center;	justify-content: center;
        }
        
        .tmpClass {
            border: 1px solid #e8e8e8;
            padding: 17px;
            border-radius: 7px;
        }
    </style>
</head>
<body>
<div class=" tmpClass">
    <form action="/auth" method="POST">
        <label><?php echo $formName ?></label><br><br>
        <input type="text" name="login" class=" form-control" placeholder="Персональный счет"><br>
        <input type="password" name="password" class=" form-control" placeholder="Пароль"><br>
        <button class="btn btn-success" type="submit" style="float: right;">Sign in</button>
    </form>
</div>
</body>
</html>