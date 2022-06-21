<?php

namespace App\model;


use App\Helper\ConfigDatabase;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;

use Illuminate\Container\Container;

abstract class Database
{
    protected $connection;

    public function __construct()
    {
        $o = new ConfigDatabase();
        $host = $o->getconf("database.mysql.host");
        $dbname = $o->getconf("database.mysql.dbname");
        $username = $o->getconf("database.mysql.username");
        $password = $o->getconf("database.mysql.password");
        $this->connection = new Capsule;
        $this->connection->addConnection([
            'driver' => 'mysql',
            'host' => $host,
            'database' => $dbname,
            'username' => $username,
            'password' => $password,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $this->connection->setAsGlobal();
        $this->connection->bootEloquent();
    }

}