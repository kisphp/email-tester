<?php

namespace Kisphp\Controllers;

use Kisphp\Core\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    public function indexAction(Request $request)
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $message = \Swift_Message::newInstance()
                ->setSubject($request->request->get('subject', 'Email Tester'))
                ->setFrom(array('noreply@example.com'))
                ->setTo(array($request->request->get('email')))
                ->setBody($request->get('message'));

            $this->app['mailer']->send($message);
        }

        return $this->createView([
            'form' => [
                'email' => $request->get('email', ''),
                'subject' => $request->get('subject', ''),
                'message' => $request->get('message', ''),
            ]
        ]);
    }
}
