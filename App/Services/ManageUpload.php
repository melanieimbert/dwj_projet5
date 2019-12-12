<?php

namespace Kernel\Services;

use Exception;
use ZipArchive;

class ManageUpload
{
    public function openFolder($firstname, $lastname)
    {
        $nom = 'volunteers_files/'.$firstname.'_'.$lastname.'/';
        if (is_dir($nom)) {
            throw new Exception('Erreur de création de dossier, veuillez contacter l\'administrateur');
        } else {
            mkdir($nom);
        }
    }

    public function fileRegister()
    {
    }

    public function downloadZipFolder($folderName) {
        $zip= new ZipArchive();
        $zip->open("volunteers_files/".$folderName.".zip", ZipArchive::CREATE);
        $rep=scandir('volunteers_files/'.$folderName);
        unset($rep[0],$rep[1]);
        foreach($rep as $file) {
            $zip->addfile("volunteers_files/".$folderName."/".$file);
            header("Location:volunteers_files/".$folderName.".zip");
        }
    }
}
