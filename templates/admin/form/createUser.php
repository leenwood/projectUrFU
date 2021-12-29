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
    <form action="/createUser" method="POST">
        <label><?php echo $formName ?></label><br><br>
        <input type="text" name="formUser[username]" class=" form-control" placeholder="Имя"><br>
        <input type="text" name="formUser[surname]" class=" form-control" placeholder="Фамилия"><br>
        <input type="text" name="formUser[secondname]" class=" form-control" placeholder="Отчество / none"><br>
        <input type="text" name="formUser[curRank]" class=" form-control" placeholder="Пояс, 0 по умолчанию" value="0"><br>
        <select name="formUser[root]" class="form-select">
            <option selected value="0">User</option>
            <option value="1">Trainer</option>
            <option value="2">Administrator</option>
        </select>
        <br>
        <input type="text" name="formUser[password]" class=" form-control" placeholder="Пароль"><br>
        <label for="">Дата вступления</label>
        <input type="date" name="formUser[joinDate]" class=" form-control" placeholder="Дата вступления"><br>
        <label for="">День рождения</label>
        <input type="date" name="formUser[dateBirth]" class=" form-control" placeholder="День рождения"><br>
        <input type="text" name="formUser[club]" class=" form-control" placeholder="Название клуба"><br>
        <input type="text" name="formUser[rank]" class=" form-control" placeholder="Звание"><br>
        <button class="btn btn-success" type="submit" style="float: left;">Create</button>
        <button class="btn btn-danger" type="submit" style="float: right;" formaction="/adminPanel">Create</button>
    </form>
</div>
</body>
</html>


<?php
