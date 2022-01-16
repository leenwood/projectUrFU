<?php

class EventProfile
{

    protected $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function addLog($id, $dateUpload, $fileSize, $body, $title, $status)
    {
        $sql = sprintf("INSERT INTO `eventLogs` (`uid`, `id`, `dateUpload`, `fileSize`, `body`, `title`, `status`) 
        VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s')", $id, $dateUpload, $fileSize, $body, $title, $status);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }

    public function getLogs()
    {
        $sql = sprintf("select * from eventLogs");
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
}