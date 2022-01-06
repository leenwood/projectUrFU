<?php



require_once 'config/userData.php';

require_once 'core/Request.php';
require_once 'core/Response.php';
require_once 'core/Router.php';
require_once 'core/BaseController.php';

require_once 'validator/ArticleValidator.php';


require_once 'repositories/UserProfile.php';
require_once 'repositories/UploadProfile.php';

require_once 'controllers/IndexController.php';
require_once 'controllers/AdminController.php';
require_once 'controllers/UploadController.php';

include_once 'config/routes.php';
include_once 'config/database.php';


$router = new Router($routes);
$request = Request::createFromGlobals();


$dsn = sprintf("mysql:host=%s;dbname=%s;charset=%s", $database['database_host'], $database['database_name'],  $database['charset']);
/** @var PDO $connection */
$connection = new PDO( $dsn, $database['username'], $database['password'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$userProfile = new UserProfile($connection);
$uploadProfile = new UploadProfile($connection);
$user = new userData($connection);

try {
    $route = $router->match($request->getPath());
} catch (\InvalidArgumentException $exception) {
    $route = [
        'controller' => 'index',
        'action' => 'notfound',
    ];
}


if($route['action'] == 'login' or $route['action'] == 'auth' or $route['action'] == 'registr')
{
    setcookie("root", "true");
} else
{
    if($user->authBool($_COOKIE['pAccount'], $_COOKIE['password']))
    {
        setcookie("root", "False/True");
    } else
    {
        setcookie("root", "False/False");
        $route = [
            'controller' => 'index',
            'action' => 'login'
        ];
    }
}

if($route['controller'] == 'upload' or $route['controller'] == 'admin')
{
    if($user->checkRoot($_COOKIE['pAccount']) < 2)
    {
        $route['controller'] = 'index';
        $route['action'] = 'index';
    }
}

$controllers = [
    'index' => new IndexController($userProfile),
    'admin' => new AdminController($userProfile),
    'upload' => new UploadController($uploadProfile, $userProfile),
];

$controller = $controllers[$route['controller']];
$actionMethod = $route['action'] . 'Action';

/** @var Response $response */
$response = $controller->$actionMethod($request);
$response->send();