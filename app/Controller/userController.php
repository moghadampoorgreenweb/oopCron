<?php

namespace App\Controller;

use App\Infrasructure\Request\Request;
use App\model\database;
use App\model\User;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Capsule\Manager as Capsule;

class userController
{
    public function index(Request $request)
    {
     //   $users = Manager::table('users')->where('email', '=', 'a.moghaddampoor@greenweb.ir')->get();


       $user = new User();

       echo "<pre>";
       echo Capsule::table('users')->select()->where('email','=','a.moghaddampoor@greenweb.ir')->get();
       echo "ok";
    }

    public function login()
    {

    }
}