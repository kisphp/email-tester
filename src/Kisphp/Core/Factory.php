<?php

namespace Kisphp\Core;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Kisphp\Core\AbstractController;

class Factory
{
    /**
     * @var Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->app['request'] = Request::createFromGlobals();
    }

    public function getRequest()
    {
        return $this->app['request'];
    }

    /**
     * @param string $name
     *
     * @return AbstractController
     */
    public function createController($name)
    {
        $name = ucfirst(strtolower($name));

        $class = sprintf(
            'Kisphp\Controllers\%sController',
            $name
        );

        return new $class($this->app);
    }
}
