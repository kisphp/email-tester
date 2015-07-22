<?php

namespace Kisphp\Controllers;

use Kisphp\Core\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    public function indexAction(Request $request)
    {
        return $this->createView([]);
    }
}
