<?php

namespace App\Infrasructure\Request;

class Request
{

    private $requestmethod;
    private $parameters;
    private $path;
    private $match;


    /**
     * @return mixed
     */
    public function getMatch()
    {
        return $this->match;
    }

    /**
     * @param mixed $match
     */
    public function setMatch($match)
    {
        $this->match = $match;
    }

    public function validEmail($email)
    {
        $pattern = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/m";
        $validEmail = preg_match($pattern, $email) ? true : false;

        if ($validEmail) {
            return true;
        }
        return false;
    }
    public function validDate($date)
    {
        $pattern = "/^([0-9]{4})-([0-1][0-9])-([0-3][0-9])\s([0-1][0-9]|[2][0-3]):([0-5][0-9]):([0-5][0-9])$/";
        $validEmail = preg_match($pattern, $date) ? true : false;

        if ($validEmail) {
            return true;
        }
        return false;
    }

    public function __construct()
    {
        $getrequest = isset($_GET['path']) ? $_GET['path'] : null;
        $this->setParameters($_REQUEST);
        $this->setPath($getrequest);
        $this->setRequestmethod(strtolower($_SERVER['REQUEST_METHOD']));
    }

    public function __get($name)
    {
        $data = $this->getMatch();
        if (array_key_exists($name, $data)) {
            return $data[$name];
        }

        return null;
    }


    /**
     * @return mixed
     */
    public function getRequestmethod()
    {
        return $this->requestmethod;
    }

    /**
     * @param mixed $requestmethod
     */
    protected function setRequestmethod($requestmethod)
    {
        $this->requestmethod = $requestmethod;
    }

    /**
     * @return mixed
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param mixed $parameters
     */
    protected function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return mixed trim($request->getPath(),'/')
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    protected function setPath($path)
    {
        $this->path = trim($path,'/');;
    }


}