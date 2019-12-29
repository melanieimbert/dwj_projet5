<?php

namespace Kernel\Services;

use Exception;
use ZipArchive;

class ManageUpload
{
    public function openFolder($folderName)
    {
        $nom = 'volunteers_files/'.$folderName.'/';
        if (is_dir($nom)) {
            throw new Exception('Erreur de création de dossier, veuillez contacter l\'administrateur');
        } else {
            mkdir($nom);
        }
    }

    public function downloadZipFolder($folderName)
    {
        $folderLocation = 'volunteers_files/'.$folderName;
        $zipLocation = '../files_temp/'.$folderName;
        $zip = new ZipArchive();
        $zip->open($zipLocation.'.zip', ZipArchive::CREATE);
        $rep = scandir($folderLocation);
        unset($rep[0],$rep[1]);
        foreach ($rep as $file) {
            $zip->addfile($folderLocation.'/'.$file);
            header('Content-Type: application/zip'); // arriver jusqu'au zip
            header('Content-Disposition: attachment; filename="dossier_volontaire.zip"'); // nommer le zip
            readfile($zipLocation.'.zip');   // source originale du zip
        }
    }

    public function deleteFolder($folder_location_delete)
    {
        if (is_dir($folder_location_delete)) { // si le paramètre est un dossier
            $objects = scandir($folder_location_delete); // on scan le dossier pour récupérer ses objets
            foreach ($objects as $object) { // pour chaque objet
                 if ($object != '.' && $object != '..') { // si l'objet n'est pas . ou ..
                      unlink($folder_location_delete.'/'.$object); // on supprime l'objet
                 }
            }
            reset($objects); // on remet à 0 les objets
            rmdir($folder_location_delete); // on supprime le dossier
            return true;
        }
    }
}
