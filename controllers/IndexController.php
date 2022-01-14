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
        require_once './lang/ru/rankConfig.php';
        $tmpClass = new rankConfig();
        $this->rankColor = $tmpClass->getRankColor();
        $this->rankName = $tmpClass->getRankName();
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
        $seminars = $this->UP->getSeminars($_COOKIE['pAccount']);
        return new Response(
            $this->render('main', [
                'title' => "Имя Фамилия пользователя",
                'seminars' => $seminars,
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
        $allUsers = $this->UP->getAllUsers();
        $user = $this->UP->getUser($_COOKIE['pAccount']);
        return new Response(
            $this->render('usersList', [
                'title' => "Список пользователей",
                'bs' => $this->bootstrap,
                'style' => $this->style,
                'allUsers' => $allUsers,
                'rankName' => $this->rankName,
                'rankColor' => $this->rankColor,
                'user' => $user,
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