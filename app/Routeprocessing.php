<?php

$routes = $rout->getRout();
$path = $rout->getPathlist();

$rout->run($path, $request);
$keyRoute = $rout->getRoutekey();

//array_unshift($out_matches, $request);
//var_dump($request);

$requestMethod = $request->getRequestmethod();

$patth_all_route = $rout->getPathlist();

if (isset($patth_all_route[$keyRoute]) && isset($routes[$requestMethod])) {
    $rout->newClassIncludeing($patth_all_route[$keyRoute], $routes[$requestMethod], $request);
}



