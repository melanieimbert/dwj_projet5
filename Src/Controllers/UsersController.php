<?php

namespace  Platform\Controllers;

use Exception;
use Kernel\Services\Mail;
use Platform\Models\UsersModel;
use Kernel\Services\ManageUpload;
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
            if (isset($_POST['gdpr'])) {
                $verifForm = new ValidationForm();
                if ($verifForm->inscriptionForm($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['password_confirm'])) {
                    $addUser = $usersManager->addUser($_POST['firstname'], $_POST['lastname'], $_POST['password'], $_POST['email'], $_POST['validationKey']);
                    if ($addUser) {
                        $msgFlash = 'Votre inscription a été prise en compte, merci de valider votre adresse e-mail';
                        $type = 'alert alert-success';
                        $this->msgSession($msgFlash, $type);
                        $mailManager = new Mail();
                        $mailManager->validationMail($_POST['email'], $_POST['validationKey']);
                    } else {
                        throw new Exception();
                    }
                }
            } else {
                $msgFlash = 'Vous devez accepter les règles de confidentialités et de protection des données pour vous inscrire.';
                $type = 'alert alert-warning';
                $this->msgSession($msgFlash, $type);
            }
        }
        $this->useTemplate('../Src/Views/inscriptionView.php', [
                'title' => 'Inscription',
                'addUser' => $addUser,
        ], $layout = '../Src/Views/Layouts/conn_layout.php');
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
                    $folder_name = $userData['firstname'].'_'.uniqid();
                    $contractsManage->openFolderDb($userData['id'], $folder_name);
                    $manageUpload->openFolder($folder_name);
                    $msgFlash = 'Votre adresse mail à bien été validée.';
                    $type = 'alert alert-success';
                    $this->msgSession($msgFlash, $type);
                    header('Location: index.php?url=/connection');
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
                    $type = 'alert alert-success';
                    $isAllowConnect = true;
                    header('Location: index.php?url=/');
                } else {
                    $msgFlash = 'Votre adresse e-mail n\'a pas été validée.';
                    $type = 'alert alert-warning';
                }
            } else {
                $isAllowConnect = false;
                $msgFlash = 'Oups erreur d\'adresse e-mail ou de mot de passe.';
                $type = 'alert alert-danger';
            }
            $this->msgSession($msgFlash, $type);
        }
        $this->useTemplate('../Src/Views/connectionView.php', [
                'title' => 'Connexion',
                'isAllowConnect' => $isAllowConnect,
        ], $layout = '../Src/Views/Layouts/conn_layout.php');
    }

    public function disconnection()
    {
        unset($_SESSION['id']);
        header('Location: index.php?url=/');
    }

    public function gdpr()
    {
        $this->useTemplate('../Src/Views/gdprView.php', [
            'title' => 'Politique de confidentialité et de protection des données personnelles :',
        ]);
    }
}
