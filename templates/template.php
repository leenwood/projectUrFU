<html>
<head>
    <title><?php echo $title ?></title>
    <link href="<?php echo $bs ?>" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="templates/css/<?php echo $style ?>/style.css" rel="stylesheet">
    <style>
        .container {

        }
    </style>
</head>
<body>
<header class="header">
    <nav class="header__nav">
        <a href="" class="btn btn-outline-secondary">Георгий Перман</a>
        <button type="button" class="btn btn-danger">Выйти</button>
    </nav>
</header>
<div class="container">
    <?php if(isset($error)):?>
        <div class="warning"><?php echo $error ?></div>
    <?php endif; ?>
    <p style="text-align: right;">
        <br>
        Всегда можно вернуться домой!
        <br>
        <a href="/" class="btn btn-primary">Домой</a>
    </p>
</div>
<div class="footer">
    test
</div>
</body>
</html>
