<?php

namespace  Platform\Controllers;

use Platform\Models\UsersModel;
use Platform\Models\ContractsModel;
use Kernel\Application\AbstractController;

class VolunteersController extends AbstractController
{
    public function showVolunteersPage()
    {
        $contractModel = new ContractsModel();
        $contractsInfos = $contractModel->getFillsInfos($_SESSION['id']);
        if ($this->isUserConnected()) {
            $this->useTemplate(__DIR__.'/../Views//volunteersView.php', [
                    'title' => 'Mon dossier administratif',
                    'contractsInfos' => $contractsInfos,
                ]);
        }
    }

    public function uploadFile()
    {
        $userModel = new UsersModel();
        $userDatas = $userModel->getUserById($_SESSION['id']);
        $nameFile = $_POST['nameFile'];
        $file = $_FILES[$nameFile];
        $file_ext = strtolower(substr($file['name'], -3)); // récupération extension du
        $allow_ext = array('pdf', 'jpg', 'png');
        if (in_array($file_ext, $allow_ext)) {
            $fileLink = 'volunteers_files/'.$userDatas['firstname'].'_'.$userDatas['lastname'].'/'.$nameFile.'.'.$file_ext;
            move_uploaded_file($file['tmp_name'], $fileLink);
            $msgFlash = 'Votre fichier à été télécharger.';
            $contractModel = new ContractsModel();
            $contractModel->fileUpload($_SESSION['id'], $nameFile, $fileLink);
        } else {
            $msgFlash = 'Extension non autorisée : merci de télécharger un fichier pdf, jpeg ou png';
        }
        $this->msgSession($msgFlash);
        header('Location: index.php?url=/volunteer');
    }

    public function uploadDatesInfos()
    {
        $contractModel = new ContractsModel();
        $contractModel->changeDatesInfos($_POST['date_start'], $_POST['date_end'], $_SESSION['id']);
        header('Location: index.php?url=/volunteer');
    }
}
