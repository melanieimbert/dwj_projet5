<?php

namespace Platform\Models;

use Kernel\Application\AbstractModel;

class ContractsModel extends AbstractModel
{
    public function getFillsInfos($id_user)
    {
        $bdd = $this->datasConnect();
        $req = $bdd->prepare('SELECT *, DATE_FORMAT(date_start, "%d/%m/%Y") as date_startFr, DATE_FORMAT(date_end, "%d/%m/%Y") as date_endFr FROM contracts WHERE id_user=?');
        $req->execute(array($id_user));
        $fillsData = $req->fetch();

        return $fillsData;
    }

    public function openFolder($id_user)
    {
        $bdd = $this->datasConnect();
        $reqFolder = $bdd->prepare('INSERT INTO contracts(id_user) VALUES(:id_user)');
        $reqFolder->execute(array('id_user' => $id_user));

        return $reqFolder;
    }

    public function fileUpload($id_user, $fileName, $link)
    {
        $bdd = $this->datasConnect();
        $reqUpload = $bdd->prepare('UPDATE contracts SET '.$fileName.'=:fileLink WHERE id_user=:id_user');
        $reqUpload->execute(array(
            'fileLink' => $link,
            'id_user' => $id_user,
        ));

        return $reqUpload;
    }

    public function changeDatesInfos($date_start, $date_end, $user_id)
    {
        $bdd = $this->datasConnect();
        $reqUpload = $bdd->prepare('UPDATE contracts SET date_start=:date_start, date_end=:date_end WHERE id_user=:id_user');
        $reqUpload->execute(array(
            'date_start' => $date_start,
            'date_end' => $date_end,
            'id_user' => $user_id,
        ));

        return $reqUpload;
    }
}