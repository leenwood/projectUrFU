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
    protected $userProfile;

    public function __construct(UploadProfile $uploadProfile, UserProfile $userProfile)
    {
        $this->UP = $uploadProfile;
        $this->userProfile = $userProfile;

        require_once './lang/ru/rankConfig.php';
        require_once './lib/csvReader/csvReader.php';
        $tmpClass = new rankConfig();
        $this->rankColor = $tmpClass->getRankColor();
        $this->rankName = $tmpClass->getRankName();
        $this->statusCode = $tmpClass->getStatusCode();
    }

    /** refactor this */

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
        $this->UP->uploadAddSemLogs($_COOKIE['pAccount'], $date, $_FILES['excelFile']['size'], $desc, $name);
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
        $table = $csvReader->getTable();
        foreach ($table as $key => $value)
        {
            if(empty($value[4]))
            {
                continue;
            }
            $userId = substr($value[4], -6);

            $prevRank = array_search($value[3], $this->rankName);
            $newRank = array_search($value[13], $this->rankName);
            $examDate = $this->UP->makeUnix($value[12]);
            $examDate = $this->UP->makeDate($examDate);
            $semDate = $this->UP->makeUnix($value[10]);
            $semDate = $this->UP->makeDate($semDate);
            $this->UP->inputSem($userId, $semDate, $value[6], $value[15], $examDate, $value[8], $prevRank, $newRank, $id, $value[7]);
            $this->userProfile->addNewRank($userId, $examDate, $newRank, $prevRank);
            $this->userProfile->updateCurRank($userId, $newRank);
        }
        $this->UP->updateStatus($id, 1);
        return new Response(
            $this->render(
                'template', [
                'title' => 'Return home',
                'bs' => $this->bootstrap,
                'style' => $this->style,
            ])
        );
    }

    public function deleteFileFromServerAction(Request $request)
    {
        $id = $request->getQueryParameter('semID');
        $nameFile = $request->getQueryParameter('fileName');
        unlink('./upload/excel/'.$nameFile);
        $this->UP->updateStatus($id, 2);
        return new Response(
            $this->render(
                'template', [
                'title' => 'Return home',
                'bs' => $this->bootstrap,
                'style' => $this->style,
            ])
        );
    }

    public function userTableAction(Request $request)
    {
        $seminarUpload = $this->UP->getUploadUsers();
        $users = $this->UP->takeUser();

        return new Response(
            $this->render(
                'upload/form/usersUpload', [
                'title' => 'Upload Users',
                'bs' => $this->bootstrap,
                'style' => $this->style,
                'semUploads' => $seminarUpload,
                'users' => $users,
                'statusCode' => $this->statusCode,
            ])
        );
    }

    public function usersTableConfirmAction(Request $request)
    {
        $date = time();
        $name = 'Users'.$date.'.csv';
        move_uploaded_file($_FILES['excelFile']['tmp_name'], 'upload/excel/'.$name);
        $desc = $request->getRequestParameter('uploadExcel_desc');

        $this->UP->uploadAddUsersLogs($_COOKIE['pAccount'], $date, $_FILES['excelFile']['size'], $desc, $name);

        return new Response(
            $this->render(
                'template', [
                'title' => 'upload seminar',
                'bs' => $this->bootstrap,
                'style' => $this->style,
            ])
        );
    }

    public function usersUploadDataAction(Request $request)
    {
        $id = $request->getQueryParameter('tableID');
        $seminar = $this->UP->getUsersTableById($id);
        $csvReader = new csvReader($seminar['nameFile']);
        $csvReader->fOpen();
        $csvReader->fClose();
        $table = $csvReader->getTable();
        echo "<pre>";
        foreach ($table as $key => $value)
        {
            $user = [];
            $flag = false;
            foreach ($value as $item)
            {
                if(!isset($item))
                {
                    $flag = true;
                }
            }

            if($flag)
            {
                continue;
            }

            $dateBirth = $this->UP->makeUnix($value[5]);
            $dateBirth = $this->UP->makeDate($dateBirth);

            $joinDate = $this->UP->makeUnix($value[9]);
            $joinDate = $this->UP->makeDate($joinDate);

            $user = [
                'surname' => $value[0],
                'username' => $value[1],
                'secondname' => $value[2],
                'curRank' => array_search($value[3], $this->rankName),
                'root' => $value[4],
                'dateBirth' => $dateBirth,
                'password' => $value[6],
                'joinDate' => $joinDate,
                'club' => $value[7],
                'rank' => $value[8],
            ];
            $this->userProfile->createUser($user);
        }

        echo "</pre>";
        $this->UP->updateStatusUsers($id, 1);
        return new Response(
            $this->render(
                'template', [
                'title' => 'Return home',
                'bs' => $this->bootstrap,
                'style' => $this->style,
            ])
        );
    }

    public function deleteFileFromServerUsersAction(Request $request)
    {
        $id = $request->getQueryParameter('tableID');
        $nameFile = $request->getQueryParameter('fileName');
        unlink('./upload/excel/'.$nameFile);
        $this->UP->updateStatusUsers($id, 2);
        return new Response(
            $this->render(
                'template', [
                'title' => 'Return home',
                'bs' => $this->bootstrap,
                'style' => $this->style,
            ])
        );
    }

}