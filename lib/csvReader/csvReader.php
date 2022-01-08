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
    protected $codeFrom;
    protected $codeTo;

    protected $table = [ ];
    protected $header = [ ];

    public function __construct($name, $codeFrom = 'WINDOWS-1251', $codeTo = 'UTF-8')
    {
        $this->name = $name;
        $this->url .= $name;
        $this->codeFrom = $codeFrom;
        $this->codeTo = $codeTo;
    }

    public function fOpen()
    {

        $this->file = fopen($this->url, "r");
        $flag = True;
        while (($data = fgetcsv($this->file , 0, ";")) !== FALSE) {
            $rows = array();
            foreach ($data as $key => $value)
            {
                array_push($rows, iconv($this->codeFrom, $this->codeTo, $value));
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