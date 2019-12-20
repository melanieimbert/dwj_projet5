<?php

namespace Kernel\Services;

use Exception;
use ZipArchive;

class ManageUpload
{
    public function openFolder($folderName)
    {
        $nom = '../volunteers_files/'.$folderName.'/';
        if (is_dir($nom)) {
            throw new Exception('Erreur de création de dossier, veuillez contacter l\'administrateur');
        } else {
            mkdir($nom);
        }
    }

    public function fileRegister()
    {
    }

    public function downloadZipFolder($folderName)
    {
        $zip = new ZipArchive();
        $zip->open('volunteers_files/'.$folderName.'.zip', ZipArchive::CREATE);
        $rep = scandir('../volunteers_files/'.$folderName);
        unset($rep[0],$rep[1]);
        foreach ($rep as $file) {
            $zip->addfile('volunteers_files/'.$folderName.'/'.$file);
            header('Location:index.php?url=/volunteers_files/'.$folderName.'.zip');
        }
    }
}
