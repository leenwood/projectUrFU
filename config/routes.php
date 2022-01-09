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
        'controller' => 'admin',
        'action' => 'admin'
    ],

    '/admin/search' => [
        'controller' => 'admin',
        'action' => 'adminUser'
    ],

    '/changeRank' => [
        'controller' => 'admin',
        'action' => 'changeRank'
    ],

    '/changeClub' => [
        'controller' => 'admin',
        'action' => 'changeClub'
    ],

    '/changeUserPassword' =>
    [
        'controller' => 'admin',
        'action' => 'changeUserPassword'
    ],

    '/addNewRankId' =>
    [
        'controller' => 'admin',
        'action' => 'addNewRank'
    ],

    '/usersList' =>
    [
        'controller' => 'index',
        'action' => 'usersList'
    ],

    '/createNewUserForm' =>
    [
        'controller' => 'admin',
        'action' => 'createNewUserForm'
    ],

    '/createUser' =>
    [
        'controller' => 'admin',
        'action' => 'createNewUser'
    ],

    '/changeRootUser' =>
    [
        'controller' => 'admin',
        'action' => 'changeRootUser'
    ],

    '/uploadCSVform' =>
    [
        'controller' => 'upload',
        'action' => 'upSeminarsForm'
    ],

    '/uploadConfirm' =>
    [
        'controller' => 'upload',
        'action' => 'uploadConfirm'
    ],

    '/seminar/search' =>
    [
        'controller' => 'upload',
        'action' => 'searchSemById'
    ],

    '/seminars/update' =>
    [
        'controller' => 'upload',
        'action' => 'updateData'
    ],

    '/seminars/deleteFileFromServer' =>
    [
        'controller' => 'upload',
        'action' => 'deleteFileFromServer'
    ],

    '/users/upload' =>
    [
        'controller' => 'upload',
        'action' => 'userTable'
    ],

    '/users/UploadConfirm' =>
    [
        'controller' => 'upload',
        'action' => 'usersTableConfirm'
    ],

    '/users/updateDataBase' =>
    [
    'controller' => 'upload',
        'action' => 'usersUploadData'
    ],
];
