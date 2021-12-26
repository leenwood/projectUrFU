<?php

class ArticleRepository
{
    protected $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Возращает номер звания
     */
    public function getcurRank()
    {
        $sql = sprintf("SELECT curRank FROM users WHERE id = %s", $_COOKIE['pAccount']);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }

    /***
     * получить звание из бд
     * @return mixed
     */
    public function getRankName()
    {
        $sql = sprintf("SELECT rank FROM users WHERE id = %s", $_COOKIE['pAccount']);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }

    /***
     * получить иио
     * @return mixed
     */
    public function getFio()
    {
        $sql = sprintf("SELECT surname, username, secondname FROM users WHERE id = %s", $_COOKIE['pAccount']);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }

    public function getDob()
    {
        $sql = sprintf("SELECT dateBirth FROM users WHERE id = %s", $_COOKIE['pAccount']);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }

    public function getAllRank()
    {
        $sql = sprintf("SELECT * FROM ranks WHERE id = %s", $_COOKIE['pAccount']);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function getAdminStatus()
    {
        $sql = sprintf("SELECT root FROM users WHERE id = %s", $_COOKIE['pAccount']);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }

    public function getUserFio($id)
    {
        $sql = sprintf("SELECT surname, username, secondname FROM users WHERE id = %s", $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }

    public function getPayments()
    {
        $sql = sprintf("SELECT * FROM payments WHERE id = %s", $_COOKIE['pAccount']);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function checkId($id)
    {
        $sql = sprintf("SELECT *FROM users WHERE id = %s", $id);
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

    public function getUserRank($id)
    {
        $sql = sprintf("SELECT rank FROM users WHERE id = %s", $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }

    public function getUserClub($id)
    {
        $sql = sprintf("SELECT club FROM users WHERE id = %s", $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }

    public function getUserCurRank($id)
    {
        $sql = sprintf("SELECT curRank FROM users WHERE id = %s", $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }

    public function changeRank($id, $newRank)
    {
        $sql = sprintf('UPDATE users SET rank = "%s" WHERE id = %s', $newRank, $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }

    public function changeClub($id, $newRank)
    {
        $sql = sprintf('UPDATE users SET club = "%s" WHERE id = %s', $newRank, $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }
}