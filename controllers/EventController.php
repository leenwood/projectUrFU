<?php

class EventController
{

    /* Создание фалйа */

    public function createFileAction(Request $request)
    {
        $myfile = fopen("templates/events/testfile.html", "w");
        fwrite($myfile, '<h1>Тестовая страница</h1> <br> <p>А тут текст типо</p>');
        fclose($myfile);
    }

    /* Удаление файла */

    public function deleteFileAction(Request $request)
    {
        unlink('templates/events/testfile.html');
    }
}