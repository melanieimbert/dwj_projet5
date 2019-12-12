<?php

namespace  Platform\Controllers;

use Exception;
use Kernel\Services\Mail;
use Platform\Models\UsersModel;
use Kernel\Services\ValidationForm;
use Platform\Models\ContractsModel;
use Kernel\Application\AbstractController;

class UsersController extends AbstractController
{
    public function inscription()
    {
        $usersManager = new UsersModel();
        $addUser = '';
        if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['validationKey'])) {
            $verifForm = new ValidationForm();
            if ($verifForm->inscriptionForm($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['password_confirm'])) {
                $addUser = $usersManager->addUser($_POST['firstname'], $_POST['lastname'], $_POST['password'], $_POST['email'], $_POST['validationKey']);
                if ($addUser) {
                    $msgFlash = 'Votre inscription a été prise en compte, merci de valider votre adresse e-mail';
                    $this->msgSession($msgFlash);
                    $mailManager = new Mail();
                    $mailManager->validationMail($_POST['email'], $_POST['validationKey']);
                }
            }
        }
        $this->useTemplate(__DIR__.'/../Views/inscriptionView.php', [
                'title' => 'Inscription',
                'addUser' => $addUser,
            ]);
    }

    public function emailValidation()
    {
        $usersManager = new UsersModel();
        $contractsManage = new ContractsModel();
        $manageUpload = new ManageUpload();
        if (!empty($_GET['email']) && !empty($_GET['key'])) {
            $email = htmlspecialchars($_GET['email']);
            $userData = $usersManager->getUserByEmail($email);
            if ($userData) {
                if ($userData['validation_key'] === $_GET['key']) {
                    $usersManager->emailValidation($email);
                    $contractsManage->openFolder($userData['id']);
                    $manageUpload->openFolder($userData['firstname'], $userData['lastname']);
                    $msgFlash = 'Votre adresse mail à bien été validée.';
                    $this->msgSession($msgFlash);
                    header('Location: afev/index.php?url=/connection');
                }
            } else {
                throw new Exception('L\'utilisateur ou la clef de vérification n\'existe pas.');
            }
        }
    }

    public function connection()
    {
        $usersManager = new UsersModel();
        $isAllowConnect = null;
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $userData = $usersManager->getUserByEmail($_POST['email']);
            if (password_verify($_POST['password'], $userData['password'])) {
                if ($userData['active'] == 1) {
                    $_SESSION['id'] = $userData['id'];
                    $msgFlash = 'Vous êtes maintenant connecté.';
                    $isAllowConnect = true;
                } else {
                    $msgFlash = 'Votre adresse e-mail n\'a pas été validée.';
                }
            } else {
                $isAllowConnect = false;
                $msgFlash = 'Oups erreur d\'adresse e-mail ou de mot de passe.';
            }
            $this->msgSession($msgFlash);
        }
        $this->useTemplate(__DIR__.'/../Views/connectionView.php', [
                'title' => 'Connexion',
                'isAllowConnect' => $isAllowConnect,
            ]);
    }
}
