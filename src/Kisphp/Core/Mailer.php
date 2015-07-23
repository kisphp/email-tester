<?php

namespace Kisphp\Core;

class Mailer
{
    const ERRORS_OFF = 0;
    const ERROR_CLIENT = 1;
    const ERROR_SERVER = 2;

    const HOST = 'smtp.gmail.com';

    protected $mail;

    public function __construct()
    {
        $mail = new \PHPMailer();

        $mail->isSMTP();

        $mail->SMTPDebug = self::ERRORS_OFF;

        $mail->Debugoutput = 'html';

        $mail->Host = self::HOST;
//        $mail->Host = gethostbyname('smtp.gmail.com');

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
        $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = Config::get('gmail_address');

//Password to use for SMTP authentication
        $mail->Password = Config::get('gmail_password');

        $this->mail = $mail;
    }

    public function getMail()
    {
        return $this->mail;
    }

}
