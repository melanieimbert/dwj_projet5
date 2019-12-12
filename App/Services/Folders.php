<?php

namespace Kernel\Services;

use Platform\Models\ContractsModel;

class Folders
{
    public function folderComplete($id_user)
    {
        $contractsModel = new ContractsModel();
        $fillsInfos = $contractsModel->getFillsInfos($id_user);
        if ($fillsInfos['id_card_valid'] == 'valid' && $fillsInfos['vital_card_valid'] == 'valid' && $fillsInfos['medical_certif_valid'] == 'valid' && $fillsInfos['cv_valid'] == 'valid' && $fillsInfos['criminal_rec_valid'] == 'valid') {
            return true;
        } else {
            return false;
        }
    }
}
