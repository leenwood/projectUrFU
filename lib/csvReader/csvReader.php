<?php

class csvReader
{

    protected $name = '';
    protected $url = './upload/excel/';

    protected $file;

    protected $table = [ ];

    public function __construct($name)
    {
        $this->name = $name;
        $this->url .= $name;
    }

    public function fOpen()
    {

        $this->file = fopen($this->url, "r");
        while (($data = fgetcsv($this->file , 0, ";")) !== FALSE) {
            $rows = array();
            foreach ($data as $key => $value)
            {
                array_push($rows, iconv("WINDOWS-1251", "UTF-8", $value));
            }
            array_push($this->table, $rows);
        }
        echo "<pre>";
        print_r($this->table);
        echo "</pre>";
    }

    public function fClose()
    {
        fclose($this->file);
    }
}