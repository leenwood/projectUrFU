<html>
<head>
    <title><?php echo $user['rank'] ?> - <?php echo $user['username'] ?> <?php echo $user['surname'] ?></title>
    <?php echo $bs ?>
    <link href="templates/css/<?php echo $style ?>/style.css" rel="stylesheet">
    <link rel="stylesheet" href="templates/css/light/tmpStyle.css">
    <meta charset="utf-8">
    <style>
        table {
            text-align: center;
        }

        td {
            padding: 5px;
            border-bottom: 1px solid #e9e9e9;
        }

        thead {
            background-color: #e9e9e9;
        }
    </style>
</head>
<body>
<header class="header">
    <nav class="header__nav">
        <?php if($user['root'] > 2):?>
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
            <hr style="width: 85%; margin: 0 auto;">
            <div class="card" style='width: 85%; min-height: 105px; margin: 0 auto;'>
                <div class="card-header" style="background-color: white">
                    Инфмаорция о семенараха. <br><?php echo $user['surname'] ?> <?php echo $user['username'] ?> <?php echo $user['secondname'] ?>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <table style="width: 100%; clear: both; margin: 0 auto;">
                            <thead>
                            <tr>
                                <td>
                                    ИД семенара
                                </td>
                                <td>
                                    Клуб организатор
                                </td>
                                <td>
                                    Дата
                                </td>
                                <td>
                                    Регион
                                </td>
                                <td>
                                    Экзаменатор
                                </td>
                                <td>
                                    Дата экзамена
                                </td>
                                <td>
                                    Тренер
                                </td>
                                <td>
                                    Клуб
                                </td>
                                <td>
                                    Новое звание
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($seminars as $key => $value): ?>
                                <tr>
                                    <td><?php echo $value['uidSem']?></td>
                                    <td><?php echo $value['clubOrg']?></td>
                                    <td><?php echo $value['dateSem']?></td>
                                    <td><?php echo $value['region']?></td>
                                    <td><?php echo $value['examiner'] ?></td>
                                    <td><?php echo $value['examDate']?></td>
                                    <td><?php echo $value['trainer']?></td>
                                    <td><?php echo $user['club'] ?></td>
                                    <td><?php echo $rankName[$value['newRank']] ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </blockquote>
                </div>
            </div>
            <?php if($user['root'] > 0): ?>
            <hr style="width: 85%; margin: 15px auto;">
            <br>
            <div style="text-align: justify; width: 100%;">
                    <a href="/event/createForm" class="btn btn-primary">View Events Page</a>
                    <a href="/event/createForm" class="btn btn-primary">Create Event Page</a>
                    <a href="/adminPanel" class="btn btn-primary">Delete Event Page</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
</body>
</html>