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
        $fio = $this->articleRepository->getFio();
        $rankid = $this->articleRepository->getcurRank();
        $rankname = $this->articleRepository->getRankName();
        return new Response(
            $this->render('main', [
                'title' => "Имя Фамилия пользователя",
                'bs' => $this->bootstrap,
                'style' => $this->style,
                'rank' => $rankid,
                'fio' => $fio,
                'zvanie' => $rankname['rank'],
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