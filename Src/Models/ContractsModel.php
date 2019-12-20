<?php

namespace Platform\Models;

use Kernel\Application\AbstractModel;

class ContractsModel extends AbstractModel
{
    public function getFillsInfos($id_user)
    {
        $bdd = $this->datasConnect();
        $req = $bdd->prepare('SELECT *, DATE_FORMAT(date_start, "%d/%m/%Y") as date_startFr, DATE_FORMAT(date_end, "%d/%m/%Y") as date_endFr, DATE_FORMAT(last_modif_date, "%d/%m/%Y") as last_modif_dateFr FROM contracts WHERE id_user=?');
        $req->execute(array($id_user));
        $fillsData = $req->fetch();

        return $fillsData;
    }

    public function getAllContractsInfos()
    {
        $bdd = $this->datasConnect();
        $req = $bdd->prepare('SELECT *, DATE_FORMAT(c.date_start, "%d/%m/%Y") as date_startFr, DATE_FORMAT(c.date_end, "%d/%m/%Y") as date_endFr FROM users u INNER JOIN contracts c  ON u.id = c.id_user ORDER BY u.firstname');
        $req->execute();
        $fillsData = $req->fetchAll();

        return $fillsData;
    }

    public function openFolderDb($id_user, $folder_name)
    {
        $bdd = $this->datasConnect();
        $reqFolder = $bdd->prepare('INSERT INTO contracts(id_user, folder_name) VALUES(:id_user, :folder_name)');
        $reqFolder->execute(array(
            'id_user' => $id_user,
            'folder_name' => $folder_name,
        ));

        return $reqFolder;
    }

    public function fileUpload($id_user, $fileName, $link)
    {
        $bdd = $this->datasConnect();
        $reqUpload = $bdd->prepare('UPDATE contracts SET '.$fileName.'=:fileLink, '.$fileName.'_valid=:waiting, last_modif_date=CURDATE() WHERE id_user=:id_user');
        $reqUpload->execute(array(
            'fileLink' => $link,
            'waiting' => 'waiting',
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

    public function approveFill($fileName, $user_id)
    {
        $bdd = $this->datasConnect();
        $reqApprove = $bdd->prepare('UPDATE contracts SET '.$fileName.'_valid=:fileName WHERE id_user=:id_user');
        $reqApprove->execute(array(
            'fileName' => 'valid',
            'id_user' => $user_id,
        ));

        return $reqApprove;
    }

    public function desapproveFill($fileName, $user_id)
    {
        $bdd = $this->datasConnect();
        $reqDesapprove = $bdd->prepare('UPDATE contracts SET '.$fileName.'_valid=:fileName WHERE id_user=:id_user');
        $reqDesapprove->execute(array(
            'fileName' => null,
            'id_user' => $user_id,
        ));

        return $reqDesapprove;
    }
}
