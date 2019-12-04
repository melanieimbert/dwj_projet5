<?php

namespace Kernel\Application\Services;

class ValidationForm extends Validation
{
    public function pseudoPost($pseudoPost)
    {
        if (!empty($pseudoPost)) {
            if ($this->stringValidation($pseudoPost)) {
                return true;
            }
        }
    }

    public function mailPost($mailPost)
    {
        if (!empty($mailPost)) {
            if ($this->emailValidation($mailPost)) {
                return true;
            }
        }
    }

    public function passPost($passPost)
    {
        if (!empty($passPost)) {
            if ($passPost === $_POST['password_confirm']) {
                return true;
            }
        }
    }

    public function verifToken($tokenPost)
    {
        if (!empty($_SESSION['token']) and !empty($tokenPost)) {
            if ($_SESSION['token'] === $tokenPost) {
                unset($_SESSION['token']);

                return true;
            } else {
                throw new Exception('Une erreur est survenue.');
            }
        }
    }

    public function inscriptionForm($pseudoPost, $mailPost, $passPost)
    {
        if (!$this->stringValidation($pseudoPost)) {
            $msgFlash = 'Votre pseudo doit être composé de lettre et de chiffre et peut comporter des caractères spéciaux.';
        } elseif (!$this->emailValidation($mailPost)) {
            $msgFlash = 'Il y a un souci avec votre adresse e-mail, merci de vérifier le format de votre mail.';
        } elseif (!$this->passPost($passPost)) {
            $msgFlash = 'Il y a un souci avec vos champs mot de passe : merci de vérifier que vos deux mots de passe sont identiques.';
        } else {
            $msgFlash = 'Bonjour, merci pour votre inscription.';
        }
        $_SESSION['msgFlash'] = $msgFlash;
    }
}
