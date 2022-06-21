<?php

namespace App\DB;

trait  Querybuilder
{

    protected $table;
    protected $column=[];

    public function selectall($column = null)
    {
        if (isset($column)) {
            $column_name = explode('.', $column);
            $out = "SELECT ";
            $out .= implode(' , ', $column_name);
            $out .= " FROM" . ' ' . $this->table;
            return $out;
        } else {
            $out = "SELECT ";
            $out .= "*";
            $out .= " FROM" . ' ' . $this->table;
            return $out;
        }
    }

    public function selectwhere($where = null)
    {
     $out =  $this->selectall();
        $oo=  str_replace(',','/',$where);
        preg_match('/(?<=(email\=))(([\w\_\.]+)@([\w|\-\.]+))/', $oo, $email);

        preg_match('/(?<=(password\=))((\*)?[\/\][`?",.\'+-._*%\^\$#&\!@\(\)|0-9]*)/', $oo, $password);
        $out .= " WHERE  $email[1]'$email[0]'".' '." $password[1]'$password[0]'";
        var_dump($out);

//  $oo=  str_replace(',','/',$where.'/');
//        preg_match_all('/=(.*)(\/)(.)/im', $oo, $output_array);
//      //  preg_match_all('/=(.*)(\/)(.)/im', $input_lines, $output_array);
//       var_dump($output_array);
   //  $wheres= explode(',','/'.$where.'/');
    // var_dump($wheres);
     //$d=explode('=',$wheres);
//        var_dump($wheres);
   //  $out .= " WHERE ". implode(' AND ',$wheres);
//$params=explode('=',$out);
//var_dump($out);
   //  var_dump($out);
    }
}