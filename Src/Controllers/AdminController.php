<?php

namespace  Platform\Controllers;

use Exception;
use Kernel\Services\Folders;
use Kernel\Services\ManageUpload;
use Platform\Models\ContractsModel;
use Kernel\Services\ConnectInformations;
use Kernel\Application\AbstractController;

class AdminController extends AbstractController
{
    public function showAdminPage()
    {
        $connectInformation = new ConnectInformations();
        if ($connectInformation->isAdminConnected()) {
            $contractsModel = new ContractsModel();
            $allContractsInfos = $contractsModel->getAllContractsInfos();
            $folders = new Folders();
            $files_list = ['id_card' => 'carte d\'identité', 'vital_card' => 'carte vitale', 'medical_certif' => 'certificat médical', 'cv' => 'curriculum vitae', 'criminal_rec' => 'extrait de casier judisciaure - bulletin n°3'];
            $this->useTemplate('../Src/Views/adminView.php', [
                'title' => 'Page administrateur',
                'allContractsInfos' => $allContractsInfos,
                'folders' => $folders,
                'files_list' => $files_list,
            ]);
        } else {
            throw new Exception('Uhmm... Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    }

    public function approveFile()
    {
        $connectInformation = new ConnectInformations();
        if ($connectInformation->isAdminConnected()) {
            $contractsModel = new ContractsModel();
            $approveFile = $contractsModel->approveFill($_GET['fileName'], $_GET['id_user']);
            if ($approveFile) {
                $msgFlash = 'Le fichier a bien été approuvé.';
            } else {
                $msgFlash = "Erreur : le fichier n'a pas pu être approuvé, ré-essayez ultérieurement.";
            }
            $this->msgSession($msgFlash);
            header('Location: index.php?url=/admin');
        } else {
            throw new Exception('Uhmm... Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    }

    public function desapproveFile()
    {
        $connectInformation = new ConnectInformations();
        if ($connectInformation->isAdminConnected()) {
            $contractsModel = new ContractsModel();
            $desapproveFile = $contractsModel->desapproveFill($_GET['fileName'], $_GET['id_user']);
            if ($desapproveFile) {
                $msgFlash = 'Le fichier a bien été refusé.';
            } else {
                $msgFlash = "Erreur : le fichier n'a pas pu être desapprouvé, ré-essayez ultérieurement.";
            }
            $this->msgSession($msgFlash);
            header('Location: index.php?url=/admin');
        } else {
            throw new Exception('Uhmm... Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    }

    public function changeDatesContract()
    {
        $connectInformation = new ConnectInformations();
        if ($connectInformation->isAdminConnected()) {
            $contractModel = new ContractsModel();
            $contractModel->changeDatesInfos($_POST['date_start'], $_POST['date_end'], $_SESSION['id']);
            $msgFlash = 'Les dates de contrat ont bien été modifiées.';
            $this->msgSession($msgFlash);
            header('Location: index.php?url=/admin');
        } else {
            throw new Exception('Uhmm... Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    }

    public function downloadFolder()
    {
        $connectInformation = new ConnectInformations();
        if ($connectInformation->isAdminConnected()) {
            $manageUpload = new ManageUpload();
            $manageUpload->downloadZipFolder($_GET['folderName']);
        } else {
            throw new Exception('Uhmm... Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    }
}
