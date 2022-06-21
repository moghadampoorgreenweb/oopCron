<?php

namespace App\Infrasructure\Routing;

use App\Infrasructure\Request\Request;

class Rout
{
    protected $rout;
    private $method;
    private $path;
    private $controller;
    private $action;
    private $pathlist = [];
    private $routekey;

    /**
     * @param array $path
     * @param Request $request
     * @return bool
     */
    public function run(array $path, Request $request)
    {

        $strReplace = str_replace(['/', '{', '}'], ['\/', '(?<', '>[\w-]*)'], $path);
        foreach ($strReplace as $key => $value) {
            $pattern = '/^' . $value . '$/m';
            $matchBool = preg_match($pattern, $request->getPath(), $out_matches);
            if ($matchBool) {
                $keyRoute = $key;
                foreach ($out_matches as $k => $v) {
                    if (is_int($k)) {
                        unset($out_matches[$k]);
                    }
                }

                $request->setMatch($out_matches);
                $this->setRoutekey($keyRoute);


            }
        }

        return null;
    }


    /**
     * @param $patth_all_route
     * @param $array
     * @param Request $request
     */
    public function newClassIncludeing($patth_all_route, $array, Request $request)
    {
        $requestController = $patth_all_route;

        if (array_key_exists($patth_all_route, $array)) {
            if (is_callable($array[$patth_all_route]['controller'])) {
                call_user_func($array[$patth_all_route]['controller']);
                return true;
            }
        }
        if (isset($requestController)) {

            if (array_key_exists($requestController, $array)) {
                $class = "App\\Controller\\{$array[$requestController]["controller"]}";

                if (class_exists($class)) {
                    $object = new $class;
                    if (method_exists($class, $array[$requestController]["method"])) {
                        $object->{$array[$requestController]["method"]}($request, ...array_values($request->getMatch()));
                    } else {
                        die("not found method");
                    }
                } else {
                    die("not found class");
                }
            } else {
                die("route not fond");
            }
        } else {
            die("route empity");
        }
    }


    /**
     * @return mixed
     */
    public function getRoutekey()
    {
        return $this->routekey;
    }

    /**
     * @param mixed $routekey
     */
    public function setRoutekey($routekey)
    {
        $this->routekey = $routekey;
    }


    public function add($method, $path, $controller, $action = null)
    {
        $this->setMethod($method);
        $this->setPath($path);
        $this->setController($controller);
        $this->setAction($action);
        $this->rout[$this->getMethod()][$this->getPath()] = [
            'controller' => $this->getController(),
            'method' => $this->getAction(),
        ];
        $this->setPathlist($this->getPath());
    }

    public function get($path, $controller, $action = null)
    {

        if (is_null($action)) {
            if (is_array($controller)) {
                $this->routeHandel('get', $path, $controller[0], $controller[1]);
                return true;
            }
            if (is_callable($controller)) {
                $this->add('get', $path, $controller);
                return true;
            }
            $this->routeHandle_explode('get', $path, $controller);
            return true;
        }
        $this->routeHandel('get', $path, $controller, $action);

    }

    public function post($path, $controller, $action = null)
    {
        if (is_null($action)) {
            if (is_array($controller)) {
                $this->routeHandel('post', $path, $controller[0], $controller[1]);
                return true;
            }
            if (is_callable($controller)) {
                $this->add('post', $path, $controller);
                return true;
            }
            $this->routeHandle_explode('post', $path, $controller);

            return true;
        }
        $this->routeHandel('post', $path, $controller, $action);
    }

    public function delete($path, $controller, $action = null)
    {
        if (is_null($action)) {
            if (is_array($controller)) {
                $this->routeHandel('delete', $path, $controller[0], $controller[1]);
                return true;
            }
            if (is_callable($controller)) {
                $this->add('delete', $path, $controller);
                return true;
            }
            $this->routeHandle_explode('delete', $path, $controller);
            return true;
        }
        $this->routeHandel('delete', $path, $controller, $action);
    }

    public function put($path, $controller, $action = null)
    {
        if (is_null($action)) {
            if (is_array($controller)) {
                $this->routeHandel('put', $path, $controller[0], $controller[1]);
                return true;
            }
            if (is_callable($controller)) {
                $this->add('put', $path, $controller);
                return true;
            }
            $this->routeHandle_explode('put', $path, $controller);
            return true;
        }
        $this->routeHandel('put', $path, $controller, $action);
    }


    /**
     * @return array
     */
    public function getPathlist()
    {

        return $this->pathlist;
    }


    /**
     * @param array $pathlist
     */
    public function setPathlist($pathlist)
    {
        $this->pathlist[] = $pathlist;
    }


    /**
     * @return mixed
     */
    public function getRout()
    {
        return $this->rout;
    }

    /**
     * @param mixed $rout
     */
    public function setRout($rout)
    {
        $this->rout = $rout;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @param $path
     * @param $controller
     * @param $action
     * @return void
     */
    public function routeHandel($method, $path, $controller, $action)
    {
        $this->setMethod($method);
        $this->setPath($path);
        $this->setController($controller);
        $this->setAction($action);
        $this->add($this->getMethod(), $this->getPath(), $this->getController(), $this->getAction());
    }

    /**
     * @param $controller
     * @param $path
     * @return void
     */
    public function routeHandle_explode($method, $path, $controller = null)
    {
        if (isset($method) && isset($path) && isset($controller)) {
            if (!is_callable($controller))
                list($controllers, $actions) = explode('@', $controller);
            if (isset($controllers) && isset($actions)) {
                $this->routeHandel($method, $path, $controllers, $actions);
            }

        }
    }


}