<?php

class IndexController extends BaseController
{
    /**
     * Action name
     * @var string
     */

    protected $bootstrap = '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">';
    protected $style = "light";
    protected $rankName = [];
    protected $rankColor = [];
    public $name = 'index';

    /**
     * @var UserProfile
     */
    protected $UP;

    public function __construct(UserProfile $UserProfile)
    {
        $this->UP = $UserProfile;
        include_once './lang/ru/rank.php';
        $this->rankColor = $rankColor;
        $this->rankName = $rankName;
    }

    protected function makeRankArray($inArray = [])
    {
        return parent::makeRankArray($inArray);
    }

    public function notfoundAction(Request $request)
    {
        return new Response(
            $this->render('template', [
                'bs' => $this->bootstrap,
                'style' => $this->style,
                'error' => 'Запрашиваемая страница отсутствует',
            ])
        );
    }

    /***
     * Основная страница, на которйо и показывается вся информация.
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $tmpUser = $this->UP->getUser($_COOKIE['pAccount']);
        $getRank = $this->UP->getAllRank();
        $payments = $this->UP->getPayments();
        return new Response(
            $this->render('main', [
                'title' => "Имя Фамилия пользователя",
                'rankName' => $this->rankName,
                'rankColor' => $this->rankColor,
                'bs' => $this->bootstrap,
                'style' => $this->style,
                'rankArray' => $getRank,
                'payments' => $payments,
                'user' => $tmpUser,
            ])
        );
    }





    public function usersListAction(Request $request)
    {
        $checkAdmin = $this->UP->getAdminStatus($_COOKIE['pAccount']);
        $allUsers = $this->UP->getAllUsers();
        return new Response(
            $this->render('usersList', [
                'title' => "Список пользователей",
                'bs' => $this->bootstrap,
                'style' => $this->style,
                'allUsers' => $allUsers,
                'adminStatus' => $checkAdmin['root'],
            ])
        );
    }

    public function createNewUserFormAction(Request $request)
    {
        $fio = $this->UP->getFio();
        $checkAdmin = $this->UP->getAdminStatus($_COOKIE['pAccount']);
        if($checkAdmin['root'] > 1)
        {
            return new Response(
                $this->render('admin/form/createUser', [
                    'title' => "Имя Фамилия пользователя",
                    'bs' => $this->bootstrap,
                    'style' => $this->style,
                    'fio' => $fio,
                    'adminRoot' => $checkAdmin['root'],
                    'formName' => 'Форма создания нового пользователя',
                ])
            );
        }
        $rankid = $this->UP->getcurRank();
        $rankname = $this->UP->getRankName();
        $dob = $this->UP->getDob($_COOKIE['pAccount']);
        $getRank = $this->UP->getAllRank();
        return new Response(
            $this->render('main', [
                'title' => "Имя Фамилия пользователя",
                'error' => 'Недостаточно прав для просмотра данного раздела',
                'bs' => $this->bootstrap,
                'style' => $this->style,
                'rank' => $rankid,
                'fio' => $fio,
                'zvanie' => $rankname['rank'],
                'dob' => $dob['dateBirth'],
                'rankArray' => $getRank,
                'adminRoot' => $checkAdmin['root'],
            ])
        );
    }

    public function createNewUserAction(Request $request)
    {
        $fio = $this->UP->getFio();
        $checkAdmin = $this->UP->getAdminStatus($_COOKIE['pAccount']);
        if($checkAdmin['root'] > 1)
        {
            $newUser = $request->getRequestParameter('formUser');
            if($this->UP->createUser($newUser))
            {
                $msg = 'Пользователь успешно создан';
            }
            else
            {
                $error = 'Не удалось создать пользователя';
            }
            return new Response(
                $this->render('admin/main', [
                    'title' => "Имя Фамилия пользователя",
                    'msg' => $msg,
                    'error' => $error,
                    'bs' => $this->bootstrap,
                    'style' => $this->style,
                    'fio' => $fio,
                    'adminRoot' => $checkAdmin['root'],
                ])
            );
        }
        $rankid = $this->UP->getcurRank();
        $rankname = $this->UP->getRankName();
        $dob = $this->UP->getDob($_COOKIE['pAccount']);
        $getRank = $this->UP->getAllRank();
        return new Response(
            $this->render('main', [
                'title' => "Имя Фамилия пользователя",
                'error' => 'Недостаточно прав для просмотра данного раздела',
                'bs' => $this->bootstrap,
                'style' => $this->style,
                'rank' => $rankid,
                'fio' => $fio,
                'zvanie' => $rankname['rank'],
                'dob' => $dob['dateBirth'],
                'rankArray' => $getRank,
                'adminRoot' => $checkAdmin['root'],
            ])
        );
    }

    public function changeRootUserAction(Request $request)
    {
        $fio = $this->UP->getFio();
        $checkAdmin = $this->UP->getAdminStatus($_COOKIE['pAccount']);
        if($checkAdmin['root'] > 1)
        {
            $userID = $request->getQueryParameter("userID");
            $newPas = $request->getRequestParameter('newRoot');
            $this->UP->changeRoot($userID, $newPas);
            $userFIO  = $this->UP->getUserFio($userID);
            $userRank = $this->UP->getUserRank($userID);
            $userClub = $this->UP->getUserClub($userID);
            $curRankUser = $this->UP->getUserCurRank($userID);
            $userRoot = $this->UP->getAdminStatus($userID);
            return new Response(
                $this->render('admin/userProfile', [
                    'title' => "Имя Фамилия пользователя",
                    'bs' => $this->bootstrap,
                    'style' => $this->style,
                    'fio' => $fio,
                    'userid' => $userID,
                    'adminRoot' => $checkAdmin['root'],
                    'userFIO' => $userFIO,
                    'userRank' => $userRank['rank'],
                    'clubUser' => $userClub['club'],
                    'curRankUser' => $curRankUser['curRank'],
                    'userRoot' => $userRoot,
                    'redi' => '1',
                ])
            );
        }
        $rankid = $this->UP->getcurRank();
        $rankname = $this->UP->getRankName();
        $dob = $this->UP->getDob($_COOKIE['pAccount']);
        $getRank = $this->UP->getAllRank();
        return new Response(
            $this->render('main', [
                'title' => "Имя Фамилия пользователя",
                'error' => 'Недостаточно прав для просмотра данного раздела',
                'bs' => $this->bootstrap,
                'style' => $this->style,
                'rank' => $rankid,
                'fio' => $fio,
                'zvanie' => $rankname['rank'],
                'dob' => $dob['dateBirth'],
                'rankArray' => $getRank,
                'adminRoot' => $checkAdmin['root'],
            ])
        );
    }

    public function logoutAction(Request $request)
    {
        setcookie('pAccount', '-1', 1, '/');
        setcookie('password', '0', 1, '/');
        return new Response(
            $this->render('auth/logout', [
                'title' => "Выйти из личного кабинета",
                'formName' => 'Авторизация',
                'bs' => $this->bootstrap,
                'style' => $this->style,
            ])
        );
    }

    /***
     * Путь авторизации, для рендеринга страницы с формой авторизации
     * @param Request $request
     * @return Response
     */
    public function loginAction(Request $request)
    {
        return new Response(
            $this->render('auth/login', [
                'title' => 'Авторизация',
                'formName' => 'Авторизация',
                'bs' => $this->bootstrap,
                'style' => $this->style,
            ])
        );
    }

    /***
     * Путь авторизации, для записи куки и перенаправлению на центральную страницу
     * @param Request $request
     * @return Response
     */
    public function authAction(Request $request)
    {
        $pAccount = sprintf("%s", $_POST['login']);
        $password = sprintf("%s", $_POST['password']);

        setcookie('pAccount', $pAccount);
        setcookie('password', $password);

        return new Response('/', '301', 'homePage');
    }
}