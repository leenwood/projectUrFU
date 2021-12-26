<?php
$rankName = [
        1 => "3 КЮ",
        2 => "4 КЮ",
];

$rankColor = [
    1 => '#15580b',
    2 => '#08186A'
];
?>




<html>
<head>
    <title><?php echo $zvanie ?> - <?php echo $fio[0] ?> <?php echo $fio[1] ?></title>
    <link href="<?php echo $bs ?>" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="templates/css/<?php echo $style ?>/style.css" rel="stylesheet">
    <link rel="stylesheet" href="templates/css/light/tmpStyle.css">
    <style>
        .container {

        }
    </style>
</head>
<body>
<header class="header">
    <nav class="header__nav">
        <?php if($adminRoot > 1):?>
            <a href="/adminPanel" class="btn btn-primary">Панель Администратора</a>
        <?php endif; ?>
        <a href="" class="btn btn-outline-secondary">Георгий Перман</a>
        <a href="/logout2" class="btn btn-danger">Выйти</a>
    </nav>
</header>
<section class="section">
    <div class="container">
        <?php if(isset($error)):?>
            <div class="warning"><?php echo $error ?></div>
        <?php endif; ?>
        <div class="menu1 row justify-content-between">
            <div class="menu__left col-6 flex-column">
                <h1 class="menu__left-name1"><?php echo $fio[0] ?> <?php echo $fio[1] ?> <?php echo $fio[2] ?></h1>
                <div class="row">
                    <div class="menu__left-birthday1 col-6">Дата Рождения: <br><span><?php echo $dob ?></span></div>
                    <div class="menu__left-rang1 col-6">Звание: <br><span><?php echo $zvanie ?></span></div>
                </div>
            </div>
            <div class="menu__right col-2 offset-md-4"><span class="menu__right-info1 mb-2 shadow ">id: <?php echo $_COOKIE['pAccount'] ?></span>
                <span class="menu__right-info1 shadow">СТЕПЕНЬ: <?php echo $rankName[$rank['curRank']] ?></span>
                <span class="menu__right-info1 shadow">Клуб: <?php echo $club ?></span></div>
        </div>
        <div class="menu-content1 row">
            <div class="menu-content__pay col-2">
                <div class="menu-content__list1 shadow">
                    <div class="menu-content__list-name1">годовые взносы</div>
                    <?php if(isset($payments)): ?>
                    <ul class="menu-content__list__payments1">
                        <?php foreach ($payments as $key => $item): ?>
                            <li class="menu-content__list__payment1"><?php echo substr($item['yearPay'], 0, 4) ?> :  <?php echo $item['sumPay'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php else: ?>
                    <ul class="menu-content__list__payments1">
                        <li>
                            Информация отсутствует.
                        </li>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="menu-content__achievement1 col-7 offset-md-1">
                <div class="menu-content__achievement-items1 row">

                        <?php if(isset($rankArray)): ?>
                            <?php foreach ($rankArray as $key => $item): ?>
                                <?php ($item); ?>
                                <div class="menu-content__achievement-item shadow col-5 row offset-md-1 mb-4">
                                    <div class="menu-content__achievement-item-left1 col-3 text-white p-2" style="background-color: <?php echo $rankColor[$item['nameRank']] ?>;"><?php echo $rankName[$item['nameRank']] ?></div>
                                    <div class="menu-content__achievement-item-right1 col-9 text-wrap"><span>Номер записи ранга: <?php echo $item['rankId'] ?><br><?php echo $item['dateTake'] ?></span></div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>
                                Информация отсутствует.
                            </p>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="footer1">
    <p style="  ">
        test
    </p>
</div>
</body>
</html>