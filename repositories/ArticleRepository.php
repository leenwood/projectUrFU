<?php

class ArticleRepository
{
    protected $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Return all Articles
     */
    public function getAll()
    {
        $statement = $this->connection->query("SELECT * FROM articles");
        return $statement->fetchAll();
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