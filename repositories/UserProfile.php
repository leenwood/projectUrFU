<?php

class UserProfile
{
    protected $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAllRank()
    {
        $sql = sprintf("SELECT * FROM ranks WHERE id = %s", $_COOKIE['pAccount']);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
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

    public function changePassword($id, $newPas)
    {
        $sql = sprintf('UPDATE users SET password = "%s" WHERE id = %s', $newPas, $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }

    public function changeRoot($id, $newRoot)
    {
        $sql = sprintf('UPDATE users SET root = %s WHERE id = %s', $newRoot, $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }

    public function addNewRank($id, $dateTake, $rankName)
    {
        $sql = sprintf("INSERT INTO `ranks` (`rankId`, `id`, `dateTake`, `urlImg`, `nameRank`) VALUES (NULL, '%s', '%s', 'none', '%s')", $id, $dateTake, $rankName);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }

    public function getAllUsers()
    {
        $sql = sprintf('SELECT * FROM users');
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function getSeminars($id)
    {
        $sql = sprintf('SELECT * FROM seminars WHERE id = %s', $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function createUser($newUser = [])
    {
        if(empty($newUser))
        {
            return False;
        }
        $sqlTmp = "INSERT INTO `users` (`id`, `surname`, `username`, `secondname`, `curRank`, `root`, `password`, `salt`, `joinDate`, `dateBirth`, `club`, `avatars`, `rank`) VALUES (";
        $sql = sprintf("NULL, '%s', '%s', '%s', '%s', '%s', '%s', 'salt',  '%s', '%s', '%s', 'none', '%s')",
            $newUser['surname'], $newUser['username'], $newUser['secondname'], $newUser['curRank'],
            $newUser['root'], $newUser['password'], $newUser['joinDate'], $newUser['dateBirth'], $newUser['club'], $newUser['rank']);
        $statement = $this->connection->prepare($sqlTmp.$sql);
        return $statement->execute();
    }

    public function getUser($id)
    {
        $sql = sprintf('SELECT * FROM users where id = %s', $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }
}