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
        return date('Y-m-d', $unix);
    }

    public function makeUnix($date)
    {
        return strtotime($date);
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

    public function getUploadUsers()
    {
        $sql = sprintf("select * from uploadExcelUsers");
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }


    public function uploadAddSemLogs($id, $date, $size, $desc, $name)
    {
        $sql = sprintf("INSERT INTO `uploadExcel` (`uid`, `id`, `dateUpload`, `fileSize`, `descr`, `nameFile`, `status`) VALUES (NULL, '%s', '%s', '%s', '%s', '%s','0')", $id, $date, $size, $desc, $name);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }

    public function uploadAddUsersLogs($id, $date, $size, $desc, $name)
    {
        $sql = sprintf("INSERT INTO `uploadExcelUsers` (`uid`, `id`, `dateUpload`, `fileSize`, `descr`, `nameFile`, `status`) VALUES (NULL, '%s', '%s', '%s', '%s', '%s','0')", $id, $date, $size, $desc, $name);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }

    public function checkId($id)
    {
        $sql = sprintf("SELECT * FROM uploadExcel WHERE uid = %s", $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $tmp = $statement->fetch();
        if($tmp) return true;
        else return false;
    }

    public function checkIdRez($id)
    {
        $sql = sprintf("SELECT * FROM uploadExcelUsers WHERE uid = %s", $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $tmp = $statement->fetch();
        if($tmp) return true;
        else return false;
    }

    public function getSeminarById($id)
    {
        $sql = sprintf("SELECT * FROM uploadExcel WHERE uid = %s", $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }

    public function getUsersTableById($id)
    {
        $sql = sprintf("SELECT * FROM uploadExcelUsers WHERE uid = %s", $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }

    public function inputSem($id, $dateSem, $region, $examiner, $examDate, $trainer, $prevRank, $newRank, $uidSem, $clubOrg)
    {
        $sql = sprintf("INSERT INTO `seminars` (`semId`, `id`, `dateSem`, `region`, `examiner`, `examDate`, `trainer`, `prevRank`, `newRank`, `uidSem`, `clubOrg`) 
        VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
            $id, $dateSem, $region, $examiner, $examDate, $trainer, $prevRank, $newRank, $uidSem, $clubOrg);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }

    public function updateStatus($uid, $status)
    {
        $sql = sprintf("UPDATE uploadExcel SET status = %s WHERE uid = %s", $status, $uid);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }

    public function updateStatusUsers($uid, $status)
    {
        $sql = sprintf("UPDATE uploadExcelUsers SET status = %s WHERE uid = %s", $status, $uid);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }
}