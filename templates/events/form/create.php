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
    <form action="/createEvent" method="POST">
        <label><?php echo $formName ?></label><br><br>
        <input type="text" name="eventPage[title]" class=" form-control" placeholder="Введите название страницы"><br>
        <input type="textarea" name="eventPage[body]" class=" form-control" placeholder="Введите HTML код страницы"><br>
        <button class="btn btn-success" type="submit" style="float: left;">Create</button>
        <button class="btn btn-danger" type="submit" style="float: right;" formaction="/">Cancel</button>
    </form>
</div>
</body>
</html>