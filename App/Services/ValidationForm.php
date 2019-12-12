<?php

namespace Kernel\Services;

class ValidationForm extends Validation
{
    public function validationName($name)
    {
        if (!empty($name)) {
            if ($this->stringValidation($name)) {
                return true;
            }
        }
    }

    public function validationMail($mailPost)
    {
        if (!empty($mailPost)) {
            if ($this->emailValidation($mailPost)) {
                return true;
            }
        }
    }

    public function samePassPost($passPost, $passPostConfirm)
    {
        if (!empty($passPost) && !empty($passPostConfirm)) {
            if ($passPost === $passPostConfirm) {
                return true;
            }
        }
    }

    public function inscriptionForm($firstname, $lastname, $mailPost, $passPost, $passPostConfirm)
    {
        if (!$this->validationName($firstname)) {
            $msgFlash = 'Votre nom doit être composé de lettre et peut comporter des caractères spéciaux.';
            $firstname = false;
        } elseif (!$this->validationName($lastname)) {
            $msgFlash = 'Votre prénom doit être composé de lettre et peut comporter des caractères spéciaux.';
            $lastname = false;
        } elseif (!$this->validationEmail($mailPost)) {
            $msgFlash = 'Il y a un souci avec votre adresse e-mail, merci de vérifier le format de votre mail.';
            $mail = false;
        } elseif (!$this->samePassPost($passPost, $passPostConfirm)) {
            $msgFlash = 'Il y a un souci avec vos champs mot de passe : merci de vérifier que vos deux mots de passe sont identiques.';
            $pass = false;
        } elseif (!$firstname && !$lastname && !$mail && !$pass) {
            return true;
        }
        $_SESSION['msgFlash'] = $msgFlash;
    }
}
