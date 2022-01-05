<?php

class csvReader
{

    /***
     * name file. This name will concatenate with path and open file.
     * You need write name with '.csv'
     * @var string
     */
    protected $name = '';

    /***
     * url path without name. This url will open the file CSV.
     * @var string
     */
    protected $url = './upload/excel/';

    protected $file;

    protected $table = [ ];
    protected $header = [ ];

    public function __construct($name)
    {
        $this->name = $name;
        $this->url .= $name;
    }

    public function fOpen()
    {

        $this->file = fopen($this->url, "r");
        $flag = True;
        while (($data = fgetcsv($this->file , 0, ";")) !== FALSE) {
            $rows = array();
            foreach ($data as $key => $value)
            {
                array_push($rows, iconv("WINDOWS-1251", "UTF-8", $value));
            }
            if($flag)
            {
                $flag = false;
                array_push($this->header, $rows);
            }
            else
            {
                array_push($this->table, $rows);
            }
        }
    }

    public function fClose()
    {
        fclose($this->file);
    }

    public function getTable()
    {
        return $this->table;
    }

    public function getHeader()
    {
        return $this->header[0];
    }

    public function getCountElement()
    {
        return count($this->table);
    }
}