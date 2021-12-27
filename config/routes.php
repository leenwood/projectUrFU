<?php

$routes = [
    '/' => [
        'controller' => 'index',
        'action' => 'index'
    ],

    '/login' => [
        'controller' => 'index',
        'action' => 'login'
    ],

    '/auth' => [
        'controller' => 'index',
        'action' => 'auth'
    ],

    '/logout2' => [
        'controller' => 'index',
        'action' => 'logout'
    ],

    '/adminPanel' => [
        'controller' => 'index',
        'action' => 'admin'
    ],

    '/admin/search' => [
        'controller' => 'index',
        'action' => 'adminUser'
    ],

    '/changeRank' => [
        'controller' => 'index',
        'action' => 'changeRank'
    ],

    '/changeClub' => [
    'controller' => 'index',
    'action' => 'changeClub'
    ],
    '/changeUserPassword' =>
    [
        'controller' => 'index',
        'action' => 'changeUserPassword'
    ],

    '/addNewRankId' =>
    [
        'controller' => 'index',
        'action' => 'addNewRank'
    ],

    '/usersList' =>
    [
        'controller' => 'index',
        'action' => 'usersList'
    ],

    '/createNewUserForm' =>
    [
        'controller' => 'index',
        'action' => 'createNewUserForm'
    ],

    '/createUser' =>
    [
        'controller' => 'index',
        'action' => 'createNewUser'
    ],

    '/changeRootUser' =>
    [
        'controller' => 'index',
        'action' => 'changeRootUser'
    ],
];
