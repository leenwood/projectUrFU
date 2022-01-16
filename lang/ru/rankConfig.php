<?php

class rankConfig
{
    /* Rank names */
    protected $rankName = [
        0 => 'Newbie',
        1 => '6 кю',
        2 => '5 кю',
        3 => '4 кю',
        4 => '3 кю',
        5 => '2 кю',
        6 => '1 кю',
        7 => '1 Дан',
        8 => '2 Дан',
        9 => '3 Дан',
        10 => '4 Дан',
        11 => '5 Дан',
        12 => '6 Дан',
        13 => '7 Дан',
        14 => '8 Дан',
        15 => '9 Дан',
        16 => '10 Дан',
        ];
    
        /* Color with '#'. HTML COLOR */

    protected $rankColor = [
        0 => '#f2f3f4',
        1 => '#ffba00',
        2 => '#cc1d00',
        3 => '#4f7942',
        4 => '#4169e1',
        5 => '#b15ec4',
        6 => '#654321',
        7 => '#000000',
        8 => '#000000',
        9 => '#000000',
        10 => '#000000',
        11 => '#000000',
        12 => '#000000',
        13 => '#000000',
        14 => '#000000',
        15 => '#000000',
        16 => '#000000',
        ];

    protected $statusCode = [
        0 => 'Sent on server',
        1 => 'Update information',
        2 => 'File delete. Table update'
    ];

    protected $statusEvent = [
        0 => 'Страница доступна'
    ];

    public function __construct()
    {

    }

    public function getRankName()
    {
        return $this->rankName;
    }

    public function getRankColor()
    {
        return $this->rankColor;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getStatusEvent()
    {
        return $this->statusEvent;
    }
}