<?php

class userData
{
    /**
     * Action name
     * @var string
     */

    protected $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
        if($this->authBool($_COOKIE['pAccount'], $_COOKIE['password']))
        {
            $this->updateRank();
        }
    }

    protected function updateRank()
    {
        $id = $_COOKIE['pAccount'];

        try {
            $sql = sprintf('SELECT nameRank FROM ranks WHERE id = %s ORDER BY rankId DESC LIMIT 1', $id);
            $statement = $this->connection->prepare($sql);
            $statement->execute();
        }
        catch (Exception $e)
        {
            $sql = sprintf("SELECT joinDate FROM users where id = %s", $id);
            $statement = $this->connection->prepare($sql);
            $date = $statement->execute();
            $sql = sprintf("INSERT INTO `ranks` (`rankId`, `id`, `dateTake`, `urlImg`, `nameRank`) VALUES (NULL, '%s', '%s', 'none', '0')", $id, $date['joinDate']);
            $statement = $this->connection->prepare($sql);
            $statement->execute();
        }
        $curRank = $statement->fetch();
        if(!empty($curRank))
        {
            $sql = sprintf('UPDATE users SET curRank = %s WHERE id = %s', $curRank['nameRank'], $id);
            $statement = $this->connection->prepare($sql);
            $statement->execute();
        }
    }
    /***
     * функция авторизации, проверки
     * @param $pAccount
     * @param $password
     * @return bool
     */
    public function authBool($pAccount, $password)
    {
        if(!isset($pAccount) or !isset($password) or ($password) == 'NULL' or $pAccount == 'NULL')
        {
            return False;
        }
        $sqlTmp = 'SELECT password FROM users WHERE id = :uid LIMIT 1';
        $statement = $this->connection->prepare($sqlTmp);
        $statement->execute([
            "uid" => $pAccount
        ]);
        $retPas = $statement->fetch();
        if($retPas['password'] == $password)
        {
            return True;
        }
        else
        {
            return False;
        }
    }
}