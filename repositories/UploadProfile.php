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
        $sql = sprintf("select id, surname, username, secondname from users");
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
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
}