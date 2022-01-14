<?php

class EventController
{

    public function testMomentAction(Request $request)
    {
        $myfile = fopen("templates/events/testfile.txt", "w");
        var_dump($myfile);
        fclose($myfile);
    }
}