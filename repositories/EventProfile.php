<?php

class EventProfile
{

    protected $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

}