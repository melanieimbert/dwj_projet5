<?php

namespace Kernel\Services;

use Exception;

class ManageUploadFiles
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
}
