<?php

use App\Infrasructure\Routing\Rout;

$rout = new Rout();
$rout->add('get', 'article', 'userController', 'index');
$rout->add('get', 'article5', 'userController', 'index');


$rout->get('email', 'emailController', 'createOnce');
$rout->get('email/bulk', 'emailController', 'createBulk');

$rout->post('email', 'emailController', 'createOnce');
$rout->post('email/bulk', 'emailController', 'createBulk');
$rout->post('job', 'cronController', 'run');
$rout->get('cron', 'cronController', 'cron');


$rout->get('amir/333333/{id}', 'userController', 'index');
$rout->get('amir/{id}', 'userController', 'index');
$rout->get('amir/{slug}/{id}', 'userController', 'index');
$rout->get('amir/{slug}/amir/{id}', 'userController', 'index');


$rout->get('ali', ['userController', 'index']);
$rout->get('amir', 'userController@index');
$rout->post('amirr', 'userController@index');

$rout->get('call', function () {
    echo "hello my frind";
});









