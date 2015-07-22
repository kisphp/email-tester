<?php

namespace Kisphp\Core;

use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var string
     */
    protected $template;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function createView(array $data)
    {
        $content = $this->app['twig']->render($this->getTemplate(), $data);

        return new Response($content);
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }
}