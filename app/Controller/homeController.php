<?php

namespace App\Controller;
use App\DB\Querybuilder;

use App\Infrasructure\Request\Request;
use App\model\database;
use App\model\Task;
use App\model\User;


class homeController
{
use Querybuilder;

    public function index($request)
    {
     //  var_dump($request);
      //  echo "ok ";

    // echo  Querybuilder::->select();
//        $model = new User();
//        $model->usertable();
//        echo "<br>";
     //  echo (new Task())->Task();

    //    echo  $model->select();
       // var_dump('ok');

    }
}