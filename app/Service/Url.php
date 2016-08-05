<?php
namespace App\Service;

use Illuminate\Routing\Router;
class Url{
    private $_router;

    public function __construct(Router $router)
    {
        $this->_router = $router;
    }
    //根据url来判断路由
    public function uri($uri,$activeClass = 'active', $inactiveClass = '')
    {
        //当前请求路径
        $uri_current=$this->_router->getCurrentRequest()->getPathInfo();
        if (!$uri_current) {
            return $inactiveClass;
        }

        if ($uri_current == $uri) {
            return $activeClass;
        }

        return $inactiveClass;
    }


    public function pattern($patterns, $activeClass = 'active', $inactiveClass = '')
    {
        $currentRequest = $this->_router->getCurrentRequest();

        if (!$currentRequest) {
            return $inactiveClass;
        }

        $uri = urldecode($currentRequest->path());

        if (!is_array($patterns)) {
            $patterns = [$patterns];
        }

        foreach ($patterns as $p) {
            if (str_is($p, $uri)) {
                return $activeClass;
            }
        }
        return $inactiveClass;
    }

    public function route($names, $activeClass = 'active', $inactiveClass = '')
    {
        $routeName = $this->_router->currentRouteName();

        if (!$routeName) {
            return $inactiveClass;
        }

        if (!is_array($names)) {
            $names = [$names];
        }

        if (in_array($routeName, $names)) {
            return $activeClass;
        }

        return $inactiveClass;
    }

}