<?php

namespace App\DB;

trait Query
{

    protected $pdo;
    protected $table;
    protected $fetchmode = \PDO::FETCH_OBJ;
    protected $stmnt;
    protected $bind = [];
    protected $selecttabls = [];
    protected $whereCluse = [];
    protected $fetchType = 'fetchAll';
    protected $limit;

    public function __construct()
    {
    //    $config = require __DIR__ . '/../config.php';
//        try {
//
//            $this->pdo = new \PDO("mysql:host=127.0.0.1;dbname={$config['db']['database']}", $config['db']['username'], $config['db']['password']);
//
//        } catch (\Exception $e) {
//            die('ERRORE:' . $e->getMessage());
//        }
    }

    function select()
    {
        if (empty($this)) {
            $this->selecttabls = func_get_arg();
        }
        return $this;
    }

    public function from($table)
    {
        $this->table = $table;
        return $this;
    }

    public function wheres($where)
    {
        $this->whereCluse[] = $where;
        return $this;

    }

    public function where($name, $value, $oprator = '=')
    {

        $this->wheres("$name $oprator :$name");

        if ($oprator == 'LIKE')
            $this->bind[$name] = '%' . $value . '%';
        else
            $this->bind[$name] = $value;


        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function result()
    {

        $query[] = "SELECT";
        if (empty($this->selecttabls))
            $query[] = "*";
        else
            $query[] = join(', ', $this->selecttabls);

        $query[] = "FROM";
        $query[] = $this->table;

        if (!empty($this->whereCluse)) {
            $query[] = $this->addwheretoquery();
        }

        if (!empty($this->limit)) {
            $query[] = "LIMIT";
            $query[] = $this->limit;
        }

        var_dump($query);
      //  $this->stmnt = $this->pdo->prepare(join(' ', $query));

//        $this->bindvalue();
//        $this->stmnt->execute();
//        return $this;

    }

    public function find($name, $value)
    {
        return $this->select()->where($name, $value)->first();
    }

    public function first()
    {
        $this->limit(1)->result();
        $this->fetchType = 'fetch';
        return $this->fetch();
    }

    public function get()
    {
        $this->result();
        return $this->fetch();
    }

    public function all()
    {
        return $this->select()->get();
    }

    public function create($data)
    {
        $fild = Join(',', array_keys($data));
        $param = ':' . Join(', :', array_keys($data));
        // var_dump($fild);
        $this->stmnt = $this->pdo->prepare("INSERT INTO `simple_blog`.`users` ($fild) VALUES ($param);");

        $this->bind = $data;
        $this->bindvalue();

        return $this->stmnt->execute();
    }


    public function update($ID, $data)
    {

        $object = $this->find('ID', $ID);

        if (!$object)
            throw new \Exception("این ایدی وجود ندارد در $this->ID");

        $fildforupdate = $this->fildforupdate($data);
        $this->stmnt = $this->pdo->prepare("UPDATE {$this->table} SET {$fildforupdate} WHERE ID = :ID");
        $this->bind = array_merge($data, ['ID' => $ID]);
        $this->bindvalue();
        return $this->stmnt->execute();
        // UPDATE `simple_blog`.`users` SET `remember_token`='ddddddd' WHERE  `ID`=35;

    }

    private function bindvalue()
    {
        foreach ($this->bind as $key => $value) {
            $this->stmnt->bindvalue(":$key", $value);
        }
    }

    private function addwheretoquery()
    {
        $query = [];
        $query[] = "WHERE";
        foreach ($this->whereCluse as $key => $where) {

            if ($key != 0)
                $query[] = "AND";
            $query[] = $where;
        }
        return join(' ', $query);
    }

    protected function fetch()
    {
        return $this->stmnt->{($this->fetchType == 'fetchAll') ? 'fetchAll' : 'fetch'}($this->fetchmode);
    }

    private function fildforupdate($data)
    {
        $fild = [];
        foreach (array_keys($data) as $name) {
            $fild[] = "$name = :$name";
        }
        return join(', ', $fild);
    }


}