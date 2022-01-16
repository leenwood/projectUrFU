<?php

class EventController extends BaseController
{

    protected $bootstrap = '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">';
    protected $style = "light";
    protected $userProfile;
    protected $eventProfile;
    protected $status;


    public function __construct(UserProfile $UserProfile, EventProfile $eventProfile)
    {
        $this->userProfile = $UserProfile;
        $this->eventProfile = $eventProfile;
        require_once './lang/ru/rankConfig.php';
        $tmpClass = new rankConfig();
        $this->status = $tmpClass->getStatusEvent();
    }

    /* Создание фалйа */

    public function createFileAction(Request $request)
    {
        $path = 'templates/events/'.$_POST['eventPage']['title'].'.html';
        $myfile = fopen($path, "w");
        $page = '<head><title>'.$_POST['eventPage']['title'].'</title></head>';
        $page .= "<body>".$_POST['eventPage']['body']."</body>";
        $dateUpload = time();
        $this->eventProfile->addLog($_COOKIE['pAccount'], $dateUpload, 20, $_POST['eventPage']['body'], $_POST['eventPage']['title'], 0);
        fwrite($myfile, $page);
        fclose($myfile);
        echo "Действие успешно выполнено, вернуться на стартовую страницу <br>";
        echo "<a href='/'>HOME</a>";
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

    public function viewEventAction(Request $request)
    {
        $users = $this->userProfile->getAllUsers();
        $events = $this->eventProfile->getLogs();
        return new Response(
            $this->render('events/form/view_events', [
                'title' => 'View Events',
                'bs' => $this->bootstrap,
                'style' => $this->style,
                'events' => $events,
                'users' => $users,
                'status' => $this->status,
            ])
        );
    }
}