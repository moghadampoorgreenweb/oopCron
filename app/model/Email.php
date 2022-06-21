<?php

namespace App\model;

use Illuminate\Database\Capsule\Manager as Capsule;

class Email extends Database
{
    public function ispendig($data)
    {
        return Capsule::table('email')
            ->select()
            ->where('id', '=', $data)
            ->where('status', '=', '1')
            ->get();

    }

    public function isfail($data)
    {
        return Capsule::table('email')
            ->select()
            ->where('id', '=', $data)
            ->where('status', '=', '2')
            ->get();

    }

    public function issuccess($data)
    {
        return Capsule::table('email')
            ->select()
            ->where('id', '=', $data)
            ->where('status', '=', '3')
            ->get();

    }

    public function getwheres($id, $data)
    {
        return Capsule::table('email')
            ->select()
            ->where('id', '=', $data)
            ->where('status', '=', '3')
            ->get();

    }


    public function update($id, $status = [])
    {
        return Capsule::table('email')
            ->where('id', '=', $id)
            ->update($status);

    }

    public function getwhere($column, $value)
    {
        return Capsule::table('email')
            ->where($column, '=', $value)
            ->select()
            ->get();

    }

    public function getbeetween($column, $data = [])
    {
        return Capsule::table('email')
            ->select()
            ->whereBetween($column, $data)
            ->get();
    }

    public function insert($data = [])
    {
        Capsule::table('email')
            ->insert($data);
    }


}