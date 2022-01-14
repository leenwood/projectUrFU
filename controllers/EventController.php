<?php

class EventController extends BaseController
{

    protected $bootstrap = '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">';
    protected $style = "light";
    protected $UP;
    protected $rankColor;
    protected $rankName;

    public function __construct(UserProfile $UserProfile)
    {
        $this->UP = $UserProfile;
        require_once './lang/ru/rankConfig.php';
        $tmpClass = new rankConfig();
        $this->rankColor = $tmpClass->getRankColor();
        $this->rankName = $tmpClass->getRankName();
    }

    /* Создание фалйа */

    public function createFileAction(Request $request)
    {
        $path = 'templates/events/'.$_POST['eventPage']['title'].'.html';
        $myfile = fopen($path, "w");
        $page = '<head><title>'.$_POST['eventPage']['title'].'</title></head>';
        $page .= "<body>".$_POST['eventPage']['body']."</body>";
        fwrite($myfile, $page);
        fclose($myfile);
    }

    /* Удаление файла */

    public function deleteFileAction(Request $request)
    {
        unlink('templates/events/testfile.html');
    }

    public function createFormAction(Request $request)
    {
        return new Response(
            $this->render('events/form/create', [
                'title' => 'Создать event',
                'bs' => $this->bootstrap,
                'style' => $this->style,
                'formName' => 'Форма создания event',
            ])
        );
    }
}