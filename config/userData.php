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
        $this->updateRank();
    }

    protected function updateRank()
    {
        $id = $_COOKIE['pAccount'];
        $sql = sprintf('SELECT nameRank FROM ranks WHERE id = %s ORDER BY rankId DESC LIMIT 1', $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $curRank = $statement->fetch();
        $sql = sprintf('UPDATE users SET curRank = %s WHERE id = %s', $curRank['nameRank'], $id);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
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