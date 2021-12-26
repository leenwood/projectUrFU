<?php

class userData
{
    /**
     * Action name
     * @var string
     */
    protected $countersID= [];
    protected $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
        $this->countersID = [
            "GVS" => -1,
            "HVS" => -1,
            "ELE" => -1,
        ];
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