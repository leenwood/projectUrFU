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
    public function getRank()
    {
        $sql = sprintf("SELECT curRank FROM users WHERE id = %s", $_COOKIE['pAccount']);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }

    public function getFio()
    {
        $sql = sprintf("SELECT surname, username, secondname FROM users WHERE id = %s", $_COOKIE['pAccount']);
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }

    /**
     * Return Article by ID
     */
    public function getById($id)
    {
        $statement = $this->connection->prepare("SELECT * FROM articles WHERE id = :id LIMIT 1");

        $statement->execute([
            "id" => $id
        ]);

        return $statement->fetch();
    }

    public function add($name, $body)
    {
        $this->connection->prepare("INSERT INTO articles (id, name, body) VALUES (?, ?, ?)")
            ->execute([null, $name, $body]);
    }
}