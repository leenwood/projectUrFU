<html>
<head>
    <title><?php echo $title ?></title>
    <link href="<?php echo $bs ?>" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
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