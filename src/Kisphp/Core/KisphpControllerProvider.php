<?php

namespace Kisphp\Core;

use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;

class KisphpControllerProvider implements ControllerProviderInterface
{
    /**
     * Returns routes to connect to the given application.
     *
     * @param Application $app An Application instance
     *
     * @return ControllerCollection A ControllerCollection instance
     */
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/', function(Application $app) {
            return $this->runIndex($app);
        });

        $controllers->post('/', function(Application $app) {
            return $this->runIndex($app);
        });

        return $controllers;
    }

    /**
     * @param Application $app
     *
     * @return Response
     */
    protected function runIndex(Application $app)
    {
        $request = $app['factory']->getRequest();
        $controller = 'Index';
        $method = 'index';
        $ctrl = $app['factory']->createController($controller);
        $ctrl->setTemplate(sprintf(
            '%s/%s.twig',
            $controller,
            $method
        ));

        $methodAction = sprintf('%sAction', $method);

        return $ctrl->$methodAction($request);
    }
}
