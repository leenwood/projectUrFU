<?php

class UploadProfile
{
    protected $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }


    public function makeDate($unix)
    {
        return date('Y-m-d g:i A', $unix);
    }

    public function takeUser()
    {
        $sql = sprintf("select id, surname, username, secondname, root from users");
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function takeUserById($id)
    {
        $sql = sprintf("select id, surname, username, secondname, root from users WHERE id = %s", $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }

    public function getUploadSeminar()
    {
        $sql = sprintf("select * from uploadExcel");
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function uploadAddLogs($id, $date, $size, $desc, $name)
    {
        $sql = sprintf("INSERT INTO `uploadExcel` (`uid`, `id`, `dateUpload`, `fileSize`, `descr`, `nameFile`, `status`) VALUES (NULL, '%s', '%s', '%s', '%s', '%s','0')", $id, $date, $size, $desc, $name);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }

    public function checkId($id)
    {
        $sql = sprintf("SELECT * FROM uploadExcel WHERE uid = %s", $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $tmp = $statement->fetch();
        if($tmp)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getSeminarById($id)
    {
        $sql = sprintf("SELECT * FROM uploadExcel WHERE uid = %s", $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }

}