<?php
spl_autoload_register(function(string $className){
    $path = dirname(__DIR__) . '/' . str_replace('\\', '/', $className) . '.php';
    require($path);
});


$route = isset($_GET['route']) ? $_GET['route'] : '';
$patterns = require('route.php');
$findRoute = false;
foreach($patterns as $pattern=>$controllerAndAction){
    if(preg_match($pattern, $route, $matches)) {
        $findRoute = true;
        unset($matches[0]);
        $action = $controllerAndAction[1];
        $controller = new $controllerAndAction[0];
        $controller->$action(...$matches);
    }
}

if (!$findRoute) echo 'Страница не найдена';


