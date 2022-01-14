<?php

class EventController
{

    public function testMomentAction(Request $request)
    {
        $myfile = fopen("templates/events/testfile.html", "w");
        fwrite($myfile, '<h1>Тестовая страница</h1> <br> <p>А тут текст типо</p>');
        fclose($myfile);
    }

    public function deleteFileAction(Request $request)
    {
        unlink('templates/events/testfile.html');
    }
}