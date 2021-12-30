<html>
<head>
    <title><?php echo $user['rank'] ?> - <?php echo $user['username'] ?> <?php echo $user['surname'] ?></title>
    <?php echo $bs ?>
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
        <?php if($user['root'] > 1):?>
            <a href="/adminPanel" class="btn btn-primary">Панель Администратора</a>
        <?php endif; ?>
        <a href="" class="btn btn-outline-secondary"><?php echo $user['username'] ?> <?php echo $user['surname'] ?></a>
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
                <h1 class="menu__left-name1"><?php echo $user['surname'] ?> <?php echo $user['username'] ?> <?php echo $user['secondname'] ?></h1>
                <div class="row">
                    <div class="menu__left-birthday1 col-6">Дата Рождения: <br><span><?php echo $user['dateBirth'] ?></span></div>
                    <div class="menu__left-rang1 col-6">Звание: <br><span><?php echo $user['rank'] ?></span></div>
                </div>
            </div>
            <div class="menu__right col-2 offset-md-4"><span class="menu__right-info1 mb-2 shadow ">id: <?php echo $user['id'] ?></span>
                <span class="menu__right-info1 shadow">СТЕПЕНЬ: <?php echo $rankName[$user['curRank']] ?></span>
                <span class="menu__right-info1 shadow">Клуб: <?php echo $user['club'] ?></span></div>
        </div>
        <div class="menu-content1 row">
            <div class="menu-content__pay col-2">
                <div class="menu-content__list1 shadow">
                    <div class="menu-content__list-name1">годовые взносы</div>
                    <?php if(!empty($payments)): ?>
                    <ul class="menu-content__list__payments1">
                        <?php foreach ($payments as $key => $item): ?>
                            <li class="menu-content__list__payment1"><?php echo substr($item['yearPay'], 0, 4) ?> :  <?php echo $item['sumPay'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php else: ?>
                            <ul class="menu-content__list__payments1">
                                <li class="menu-content__list__payment1">
                                    Информация отсутствует
                                </li>
                            </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="menu-content__achievement1 col-7 offset-md-1">
                <div class="menu-content__achievement-items1 row">

                        <?php if(isset($rankArray)): ?>
                            <?php $prevRank = null;
                            $tmpArray = array_reverse($rankArray); ?>
                            <?php foreach ($tmpArray as $key => $item): ?>

                                <div class="menu-content__achievement-item shadow col-5 row offset-md-1 mb-4">
                                    <div class="menu-content__achievement-item-left1 col-3 text-white p-2" style="background-color: <?php echo $rankColor[$item['nameRank']] ?>;"><?php echo $rankName[$item['nameRank']] ?></div>
                                    <div class="menu-content__achievement-item-right1 col-9 text-wrap"><span>Дата получения: <br>
                                            <?php echo $item['dateTake'] ?></span><br></div>
                                </div>
                                <?php $prevRank = $rankName[$item['nameRank']] ?>
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