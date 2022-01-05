<?php

class UploadController extends BaseController
{

    /**
     * Action name
     * @var string
     */
    protected $bootstrap = '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">';
    protected $style = "light";
    protected $rankName = [];
    protected $rankColor = [];
    protected $statusCode = [];
    public $name = 'index';

    /**
     * @var UserProfile
     */
    protected $UP;

    public function __construct(UploadProfile $uploadProfile)
    {
        $this->UP = $uploadProfile;
        require_once './lang/ru/rankConfig.php';
        require_once './lib/csvReader/csvReader.php';
        $tmpClass = new rankConfig();
        $this->rankColor = $tmpClass->getRankColor();
        $this->rankName = $tmpClass->getRankName();
        $this->statusCode = $tmpClass->getStatusCode();
    }

    protected function makeRankArray($inArray = [])
    {
        return parent::makeRankArray($inArray);
    }

    protected function redirect($url)
    {
        return parent::redirect($url); // TODO: Change the autogenerated stub
    }

    public function upSeminarsFormAction(Request $request)
    {
        $seminarUpload = $this->UP->getUploadSeminar();
        $users = $this->UP->takeUser();
        return new Response(
            $this->render(
                'upload/form/seminarUpload', [
                'title' => 'Upload file',
                'bs' => $this->bootstrap,
                'style' => $this->style,
                'semUploads' => $seminarUpload,
                'users' => $users,
                'statusCode' => $this->statusCode,
            ])
        );
    }

    public function uploadConfirmAction(Request $request)
    {
        $date = time();
        $name = 'Seminar'.$date.'.csv';
        move_uploaded_file($_FILES['excelFile']['tmp_name'], 'upload/excel/'.$name);
        $desc = $request->getRequestParameter('uploadExcel_desc');
        $this->UP->uploadAddLogs($_COOKIE['pAccount'], $date, $_FILES['excelFile']['size'], $desc, $name);
        return new Response(
            $this->render(
                'template', [
                'title' => 'upload seminar',
                'bs' => $this->bootstrap,
                'style' => $this->style,
            ])
        );
    }

    public function searchSemByIdAction(Request $request)
    {
        $id = $request->getQueryParameter('semID');
        $user = $this->UP->takeUserById($id);
        if($this->UP->checkId($id))
        {
            $seminar = $this->UP->getSeminarById($id);
            return new Response(
                $this->render(
                    'upload/sembyId', [
                    'title' => 'seminars #'.$id,
                    'bs' => $this->bootstrap,
                    'style' => $this->style,
                    'seminar' => $seminar,
                    'user' => $user,
                ])
            );
        }
        else
        {

        }
    }

    public function updateDataAction(Request $request)
    {
        $id = $request->getQueryParameter('semID');
        $seminar = $this->UP->getSeminarById($id);
        $csvReader = new csvReader($seminar['nameFile']);
        $csvReader->fOpen();
        $csvReader->fClose();
        echo "<pre>";
        print_r($csvReader->getHeader());
        echo "<hr>";
        print_r($this->rankName);
        $table = $csvReader->getTable();
        print_r($table);
        echo "</pre>";
        /*
        if($table[0][4] < 0)
        {
            return new Response(
                $this->render(
                    'template', [
                    'title' => 'upload seminar',
                    'bs' => $this->bootstrap,
                    'style' => $this->style,
                ])
            );
        }
        $userId = substr($table[0][4], -6);

        $prevRank = array_search($table[0][3], $this->rankName);
        $newRank = array_search($table[0][13], $this->rankName);
        $examDate = $this->UP->makeUnix($table[0][12]);
        $examDate = $this->UP->makeDate($examDate);
        $semDate = $this->UP->makeUnix($table[0][10]);
        $semDate = $this->UP->makeDate($semDate);

        $this->UP->inputSem($userId, $semDate, $table[0][6], $table[0][15], $examDate, $table[0][8], $prevRank, $newRank, $id, $table[0][7]);

        МЕХАНИЗМ ДОБАВЛЕНИЯ, РАБОТАЕТ КАК ЧАСЫ!
        */
    }
}