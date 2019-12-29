<?php

namespace Kernel\Services;

class Mail
{
    private function sendMail($recipient, $subject, $message)
    {
        // paramètre d'encodage
        $header = "MIME-Version: 1.0\r\n";
        $header .= 'From:"Association.org"<asso@asso.org>'."\n";
        $header .= 'Content-Type:text/html; charset="utf-8"'."\n";
        $header .= 'Content-Transfer-Encoding: 8bit';

        mail($recipient, $subject, $message, $header);
    }

    public function validationMail($email_recipient, $validation_key)
    {
        $message = '
        <html> 
            <body>
                <div>
                    <p> 
                        Bonjour, et bienvenue ! </br>
                        Merci pour votre inscription sur asso.com ! 
                    </p>
                    <a href="http://platform/confirmEmail&email='.$email_recipient.'&key='.$validation_key.'"> Confirmez votre adresse e-mail </a>
                </div>
            </body>
        </html>
        ';
        $this->sendMail($email_recipient, 'Asso.org : validez votre adresse e-mail', $message);
    }
}
