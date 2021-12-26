<html>
<head>
    <title><?php echo $title ?></title>
    <link href="<?php echo $bs ?>" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="templates/css/<?php echo $style ?>/style.css" rel="stylesheet">
    <link href="templates/css/light/tmpStyle.css" rel="stylesheet">
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

</div>
<section class="section">
    <div class="container">
        <div class="menu row justify-content-between">
            <div class="menu__left col-6 flex-column">
                <h1 class="menu__left-name">Перман Георгий Дмитриевич</h1>
                <div class="row">
                    <div class="menu__left-birthday col-6">Дата Рождения: <span>05.05.2001</span></div>
                    <div class="menu__left-rang col-6">Звание: <span>Мастер</span></div>
                </div>
            </div>
            <div class="menu__right col-2 offset-md-4"><span class="menu__right-info mb-2 shadow bg-body">id: 000001
                    </span><span class="menu__right-info shadow bg-body">СТЕПЕНЬ</span></div>
        </div>
        <div class="menu-content row">
            <div class="menu-content__pay col-2">
                <div class="menu-content__list shadow bg-body">
                    <div class="menu-content__list-name">годовые взносы</div>
                    <ul class="menu-content__list__payments">
                        <li class="menu-content__list__payment">2017 / оплачен</li>
                        <li class="menu-content__list__payment">2017 / оплачен</li>
                        <li class="menu-content__list__payment">2017 / оплачен</li>
                        <li class="menu-content__list__payment">2017 / оплачен</li>
                        <li class="menu-content__list__payment">2017 / оплачен</li>
                        <li class="menu-content__list__payment">2017 / оплачен</li>
                        <li class="menu-content__list__payment">2017 / оплачен</li>
                        <li class="menu-content__list__payment">2017 / оплачен</li>
                        <li class="menu-content__list__payment">2017 / оплачен</li>
                        <li class="menu-content__list__payment">2017 / оплачен</li>
                        <li class="menu-content__list__payment">2017 / оплачен</li>
                        <li class="menu-content__list__payment">2017 / оплачен</li>
                    </ul>
                </div>
            </div>
            <div class="menu-content__achievement col-7 offset-md-3">
                <div class="menu-content__achievement-items row">
                    <div class="menu-content__achievement-item shadow col-5 row offset-md-1 bg-body mb-4">
                        <div class="menu-content__achievement-item-left col-3 bg-success text-white p-3">3 кю</div>
                        <div class="menu-content__achievement-item-right col-9 text-wrap"><span>БлалалалаалБлл
                                    БлалалалаалБлл</span></div>
                    </div>
                    <div class="menu-content__achievement-item shadow col-5 row offset-md-1 bg-body mb-4">
                        <div class="menu-content__achievement-item-left col-3 bg-success text-white p-3">3 кю</div>
                        <div class="menu-content__achievement-item-right col-9 text-wrap"><span>БлалалалаалБлл
                                    БлалалалаалБлл</span></div>
                    </div>
                    <div class="menu-content__achievement-item shadow col-5 row offset-md-1 bg-body mb-4">
                        <div class="menu-content__achievement-item-left col-3 bg-success text-white p-3">3 кю</div>
                        <div class="menu-content__achievement-item-right col-9 text-wrap"><span>БлалалалаалБлл
                                    БлалалалаалБлл</span></div>
                    </div>
                    <div class="menu-content__achievement-item shadow col-5 row offset-md-1 bg-body mb-4">
                        <div class="menu-content__achievement-item-left col-3 bg-success text-white p-3">3 кю</div>
                        <div class="menu-content__achievement-item-right col-9 text-wrap"><span>БлалалалаалБлл
                                    БлалалалаалБлл</span></div>
                    </div>
                    <div class="menu-content__achievement-item shadow col-5 row offset-md-1 bg-body mb-4">
                        <div class="menu-content__achievement-item-left col-3 bg-success text-white p-3">3 кю</div>
                        <div class="menu-content__achievement-item-right col-9 text-wrap"><span>БлалалалаалБлл
                                    БлалалалаалБлл</span></div>
                    </div>
                    <div class="menu-content__achievement-item shadow col-5 row offset-md-1 bg-body mb-4">
                        <div class="menu-content__achievement-item-left col-3 bg-success text-white p-3">3 кю</div>
                        <div class="menu-content__achievement-item-right col-9 text-wrap"><span>БлалалалаалБлл
                                    БлалалалаалБлл</span></div>
                    </div>
                </div>
                <div class="col-3 row offset-md-5 mb-4"><a href=""
                                                           class="btn btn-outline-secondary shadow btn-radius btn-white">More</a></div>
            </div>
        </div>
    </div>
</section>
<div class="footer">
    <p style="color white;">
        test
    </p>
</div>
</body>
</html>