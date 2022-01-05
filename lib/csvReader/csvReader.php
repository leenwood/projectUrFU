<?php

class csvReader
{

    protected $name = '';
    protected $url = './upload/excel/';

    protected $file;

    public function __construct($name)
    {
        $this->name = $name;
        $this->url .= $name;
    }

    public function fOpen()
    {

        $this->file = fopen($this->url, "r");
        $rows = array();
        echo "<pre>";
        while (($data = fgetcsv($this->file , 0, ";")) !== FALSE) {

            $rows[] = $data;
            print_r($rows);

        }
        echo "</pre>";
    }

    public function fClose()
    {
        fclose($this->file);
    }
}