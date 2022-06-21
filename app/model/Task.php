<?php

namespace App\model;

use App\DB\Querybuilder;

class Task
{
use Querybuilder;

    public function Task()
    {
        $this->table='task';
        return $this->selectall();
    }

}