<?php

namespace Kisphp\Controllers;

use Kisphp\Core\AbstractController;
use Kisphp\Core\Mailer;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    public function indexAction(Request $request)
    {
        $message = '';
        $messageType = '';
        if ($request->isMethod(Request::METHOD_POST)) {

            $mail = (new Mailer())->getMail();

            $mail->setFrom('no-reply@example.com', 'Test email');
            $mail->addAddress($request->request->get('email'));
            $mail->Subject = $request->request->get('subject', 'Email tester');
            $mail->AltBody = 'This is a plain-text message body';
            $mail->msgHTML($request->request->get('content'));

            if (!$mail->send()) {
                $message = "Mailer Error: " . $mail->ErrorInfo;
                $messageType = 'danger';
            } else {
                $message = "Message sent!";
                $messageType = 'success';
            }
        }

        return $this->createView([
            'message' => $message,
            'messageType' => $messageType,
            'form' => [
                'email' => $request->get('email', ''),
                'subject' => $request->get('subject', ''),
                'content' => $request->get('content', ''),
            ]
        ]);
    }
}
