<?php

class IndexController extends BaseController
{
    /**
     * Action name
     * @var string
     */

    protected $bootstrap = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css";
    protected $style = "light";

    public $name = 'index';

    /**
     * @var ArticleRepository
     */
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
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
        $checkAdmin = $this->articleRepository->getAdminStatus($_COOKIE['pAccount']);
        $fio = $this->articleRepository->getFio();
        $rankid = $this->articleRepository->getcurRank();
        $rankname = $this->articleRepository->getRankName();
        $dob = $this->articleRepository->getDob($_COOKIE['pAccount']);
        $getRank = $this->articleRepository->getAllRank();
        $userClub = $this->articleRepository->getUserClub($_COOKIE['pAccount']);
        $payments = $this->articleRepository->getPayments();
        return new Response(
            $this->render('main', [
                'title' => "Имя Фамилия пользователя",
                'bs' => $this->bootstrap,
                'style' => $this->style,
                'rank' => $rankid,
                'fio' => $fio,
                'zvanie' => $rankname['rank'],
                'dob' => $dob['dateBirth'],
                'rankArray' => $getRank,
                'adminRoot' => $checkAdmin['root'],
                'club' => $userClub['club'],
                'payments' => $payments,
            ])
        );
    }

    public function adminAction(Request $request)
    {
        $fio = $this->articleRepository->getFio();
        $checkAdmin = $this->articleRepository->getAdminStatus($_COOKIE['pAccount']);
        if($checkAdmin['root'] > 1)
        {
            return new Response(
                $this->render('admin/main', [
                    'title' => "Имя Фамилия пользователя",
                    'bs' => $this->bootstrap,
                    'style' => $this->style,
                    'fio' => $fio,
                    'adminRoot' => $checkAdmin['root'],
                ])
            );
        }
        $rankid = $this->articleRepository->getcurRank();
        $rankname = $this->articleRepository->getRankName();
        $dob = $this->articleRepository->getDob($_COOKIE['pAccount']);
        $getRank = $this->articleRepository->getAllRank();
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

    public function adminUserAction(Request $request)
    {
        $fio = $this->articleRepository->getFio();
        $checkAdmin = $this->articleRepository->getAdminStatus($_COOKIE['pAccount']);
        if($checkAdmin['root'] > 1)
        {
            $userID = $request->getQueryParameter("userID");
            if(!$this->articleRepository->checkId($userID))
            {
                return new Response(
                    $this->render('admin/main', [
                        'error' => 'Пользователя нет в системе',
                        'title' => "Имя Фамилия пользователя",
                        'bs' => $this->bootstrap,
                        'style' => $this->style,
                        'fio' => $fio,
                        'adminRoot' => $checkAdmin['root'],
                    ])
                );
            }
            $userFIO  = $this->articleRepository->getUserFio($userID);
            $userRank = $this->articleRepository->getUserRank($userID);
            $userClub = $this->articleRepository->getUserClub($userID);
            $curRankUser = $this->articleRepository->getUserCurRank($userID);
            $userRoot = $this->articleRepository->getAdminStatus($userID);
            $dobUser = $this->articleRepository->getDob($userID);
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
                    'dobUser' => $dobUser['dateBirth'],
                ])
            );
        }
        $rankid = $this->articleRepository->getcurRank();
        $rankname = $this->articleRepository->getRankName();
        $dob = $this->articleRepository->getDob($_COOKIE['pAccount']);
        $getRank = $this->articleRepository->getAllRank();
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

    public function changeRankAction(Request $request)
    {
        $fio = $this->articleRepository->getFio();
        $checkAdmin = $this->articleRepository->getAdminStatus($_COOKIE['pAccount']);
        if($checkAdmin['root'] > 1)
        {
            $userID = $request->getQueryParameter("userID");
            $newRank = $request->getRequestParameter('newRank');
            $this->articleRepository->changeRank($userID, $newRank);
            $userFIO  = $this->articleRepository->getUserFio($userID);
            $userRank = $this->articleRepository->getUserRank($userID);
            $userClub = $this->articleRepository->getUserClub($userID);
            $curRankUser = $this->articleRepository->getUserCurRank($userID);
            $userRoot = $this->articleRepository->getAdminStatus($userID);
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
        $rankid = $this->articleRepository->getcurRank();
        $rankname = $this->articleRepository->getRankName();
        $dob = $this->articleRepository->getDob($_COOKIE['pAccount']);
        $getRank = $this->articleRepository->getAllRank();
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

    public function changeClubAction(Request $request)
    {
        $fio = $this->articleRepository->getFio();
        $checkAdmin = $this->articleRepository->getAdminStatus($_COOKIE['pAccount']);
        if($checkAdmin['root'] > 1)
        {
            $userID = $request->getQueryParameter("userID");
            $newRank = $request->getRequestParameter('newClub');
            $this->articleRepository->changeClub($userID, $newRank);
            $userFIO  = $this->articleRepository->getUserFio($userID);
            $userRank = $this->articleRepository->getUserRank($userID);
            $userClub = $this->articleRepository->getUserClub($userID);
            $curRankUser = $this->articleRepository->getUserCurRank($userID);
            $userRoot = $this->articleRepository->getAdminStatus($userID);
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
        $rankid = $this->articleRepository->getcurRank();
        $rankname = $this->articleRepository->getRankName();
        $dob = $this->articleRepository->getDob($_COOKIE['pAccount']);
        $getRank = $this->articleRepository->getAllRank();
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

    public function addNewRankAction(Request $request)
    {
        $fio = $this->articleRepository->getFio();
        $checkAdmin = $this->articleRepository->getAdminStatus($_COOKIE['pAccount']);
        if($checkAdmin['root'] > 1)
        {
            $userID = $request->getQueryParameter("userID");
            $dateTake = $request->getRequestParameter('dateTake');
            $rankName = $request->getRequestParameter('rankName');
            $this->articleRepository->addNewRank($userID, $dateTake, $rankName);
            $userFIO  = $this->articleRepository->getUserFio($userID);
            $userRank = $this->articleRepository->getUserRank($userID);
            $userClub = $this->articleRepository->getUserClub($userID);
            $curRankUser = $this->articleRepository->getUserCurRank($userID);
            $userRoot = $this->articleRepository->getAdminStatus($userID);
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
        $rankid = $this->articleRepository->getcurRank();
        $rankname = $this->articleRepository->getRankName();
        $dob = $this->articleRepository->getDob($_COOKIE['pAccount']);
        $getRank = $this->articleRepository->getAllRank();
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


    public function changeUserPasswordAction(Request $request)
    {
        $fio = $this->articleRepository->getFio();
        $checkAdmin = $this->articleRepository->getAdminStatus($_COOKIE['pAccount']);
        if($checkAdmin['root'] > 1)
        {
            $userID = $request->getQueryParameter("userID");
            $newPas = $request->getRequestParameter('newPassword');
            $this->articleRepository->changePassword($userID, $newPas);
            $userFIO  = $this->articleRepository->getUserFio($userID);
            $userRank = $this->articleRepository->getUserRank($userID);
            $userClub = $this->articleRepository->getUserClub($userID);
            $curRankUser = $this->articleRepository->getUserCurRank($userID);
            $userRoot = $this->articleRepository->getAdminStatus($userID);
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
        $rankid = $this->articleRepository->getcurRank();
        $rankname = $this->articleRepository->getRankName();
        $dob = $this->articleRepository->getDob($_COOKIE['pAccount']);
        $getRank = $this->articleRepository->getAllRank();
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

    public function usersListAction(Request $request)
    {
        $checkAdmin = $this->articleRepository->getAdminStatus($_COOKIE['pAccount']);
        $allUsers = $this->articleRepository->getAllUsers();
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
        $fio = $this->articleRepository->getFio();
        $checkAdmin = $this->articleRepository->getAdminStatus($_COOKIE['pAccount']);
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
        $rankid = $this->articleRepository->getcurRank();
        $rankname = $this->articleRepository->getRankName();
        $dob = $this->articleRepository->getDob($_COOKIE['pAccount']);
        $getRank = $this->articleRepository->getAllRank();
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
        $fio = $this->articleRepository->getFio();
        $checkAdmin = $this->articleRepository->getAdminStatus($_COOKIE['pAccount']);
        if($checkAdmin['root'] > 1)
        {
            $newUser = $request->getRequestParameter('formUser');
            if($this->articleRepository->createUser($newUser))
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
        $rankid = $this->articleRepository->getcurRank();
        $rankname = $this->articleRepository->getRankName();
        $dob = $this->articleRepository->getDob($_COOKIE['pAccount']);
        $getRank = $this->articleRepository->getAllRank();
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
        $fio = $this->articleRepository->getFio();
        $checkAdmin = $this->articleRepository->getAdminStatus($_COOKIE['pAccount']);
        if($checkAdmin['root'] > 1)
        {
            $userID = $request->getQueryParameter("userID");
            $newPas = $request->getRequestParameter('newRoot');
            $this->articleRepository->changeRoot($userID, $newPas);
            $userFIO  = $this->articleRepository->getUserFio($userID);
            $userRank = $this->articleRepository->getUserRank($userID);
            $userClub = $this->articleRepository->getUserClub($userID);
            $curRankUser = $this->articleRepository->getUserCurRank($userID);
            $userRoot = $this->articleRepository->getAdminStatus($userID);
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
        $rankid = $this->articleRepository->getcurRank();
        $rankname = $this->articleRepository->getRankName();
        $dob = $this->articleRepository->getDob($_COOKIE['pAccount']);
        $getRank = $this->articleRepository->getAllRank();
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