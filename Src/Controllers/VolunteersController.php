<?php

namespace  Platform\Controllers;

use Exception;
use Kernel\Services\Folders;
use Platform\Models\UsersModel;
use Platform\Models\ContractsModel;
use Kernel\Services\ConnectInformations;
use Kernel\Application\AbstractController;

class VolunteersController extends AbstractController
{
    public function showVolunteersPage()
    {
        $connectInformation = new ConnectInformations();
        if ($connectInformation->isUserConnected()) {
            $contractModel = new ContractsModel();
            $usersModel = new UsersModel();
            $user = $usersModel->getUserById($_SESSION['id']);
            $folder = new Folders();
            $folderComplete = $folder->folderComplete($_SESSION['id']);
            $contractsInfos = $contractModel->getFillsInfos($_SESSION['id']);
            $fills_list = ['id_card' => 'carte d\'identité', 'vital_card' => 'carte vitale', 'medical_certif' => 'certificat médical', 'cv' => 'curriculum vitae', 'criminal_rec' => 'extrait de casier judisciaure - bulletin n°3'];
            $this->useTemplate('../Src/Views/volunteersView.php', [
                        'title' => 'Mon dossier administratif',
                        'contractsInfos' => $contractsInfos,
                        'fills_list' => $fills_list,
                        'folderComplete' => $folderComplete,
                        'user' => $user,
            ]);
        } else {
            throw new Exception('Uhmm... Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    }

    public function uploadFile()
    {
        $connectInformation = new ConnectInformations();
        if ($connectInformation->isUserConnected()) {
            $userModel = new UsersModel();
            $userDatas = $userModel->getUserById($_SESSION['id']);
            $nameFile = $_POST['nameFile'];
            $file = $_FILES[$nameFile];
            $file_ext = strtolower(substr($file['name'], -3)); // récupération extension du fichier
            $allow_ext = array('jpg', 'png');
            if (in_array($file_ext, $allow_ext)) {
                $contractModel = new ContractsModel();
                $contractData = $contractModel->getFillsInfos($_SESSION['id']);
                $newNameFile = random_bytes(5);
                $fileLink = 'volunteers_files/'.$contractData['folder_name'].'/'.bin2hex($newNameFile).'.'.$file_ext;
                move_uploaded_file($file['tmp_name'], $fileLink);
                $msgFlash = 'Votre fichier à été télécharger.';
                $type = 'alert alert-success';
                $contractModel = new ContractsModel();
                $contractModel->fileUpload($_SESSION['id'], $nameFile, $fileLink);
            } else {
                $msgFlash = 'Extension non autorisée : merci de télécharger un fichier jpeg ou png';
                $type = 'alert alert-danger';
            }
            $this->msgSession($msgFlash, $type);
            header('Location: index.php?url=/volunteer');
        } else {
            throw new Exception('Uhmm... Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    }

    public function uploadDatesInfos()
    {
        $connectInformation = new ConnectInformations();
        if ($connectInformation->isUserConnected()) {
            $contractModel = new ContractsModel();
            $contractModel->changeDatesInfos($_POST['date_start'], $_POST['date_end'], $_SESSION['id']);
            $msgFlash = 'Vos dates de contrat ont bien été ajoutées.';
            $type = 'alert alert-success';
            $this->msgSession($msgFlash, $type);
            header('Location: index.php?url=/volunteer');
        } else {
            throw new Exception('Uhmm... Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    }
}
