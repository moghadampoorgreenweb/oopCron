<?php

namespace App\Helper;

class ConfigDatabase
{
    public function getconf($data)
    {
        $data = explode('.', $data);
        $file_path = $data[0];
        array_shift($data);
        $path = __DIR__ . "/../../Config/" . $file_path . ".php";
        if (file_exists($path)) {
            $out = include $path;
            foreach ($data as $item) {
                $out = $out[$item];
            }
            return $out;
        }
    }


    public static function __callStatic($method, $arg)
    {
        return self::getconf($method . '.' . $arg[0]);
    }
}