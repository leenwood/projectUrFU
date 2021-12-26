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

    public function indexAction(Request $request)
    {
        $articles = $this->articleRepository->getAll();
        return new Response(
            $this->render('main', [
                'articles' => $articles,
                'bs' => $this->bootstrap,
                'style' => $this->style,
            ])
        );
    }

    public function showAction(Request $request)
    {
        $id = $request->getQueryParameter("id");

        $article = is_numeric($id) ? $this->articleRepository->getById($id) : null;

        if ($article === null) {
            return new Response('Page not found', '404', 'Not found');
        }

        return new Response(
            $this->render('article', [
                'article' => $article
            ])
        );
    }

    /**
     * Show form far article create.
     * @param Request $request
     * @return Response
     */
    public function createFormAction(Request $request)
    {
        return new Response (
                $this->render('article/form', [])
        );

    }

    /**
     * Add new article
     * @param Request $request
     * @return Response|void
     */
    public function createAction(Request $request)
    {
        if ($request->isPost() && !empty($request->getRequestParameter('article'))) {

            $article = $request->getRequestParameter('article');
            $articleValidator = new ArticleValidator();

            $errors = $articleValidator->validate($article);

            if (empty($errors)) {

                $this->articleRepository->add($article['name'], $article['body']);

                return new Response(
                    '/', '301', 'Moved'
                );

            } else {

                return new Response (
                    $this->render('article/form', [
                        'errors' => $errors
                    ])
                );

            }

        }

    }





}