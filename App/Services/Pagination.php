<?php

namespace Kernel\Services;

use Exception;
use ZipArchive;

class Pagination
{
    public function nberPage($perPage, $total)
    {
        $nberPage = ceil($total / $perPage);

        return $nberPage;
    }

    public function firstArt($perPage, $total)
    {
        $nberPage = $this->nberPage($perPage, $total);
        if (!empty($_GET['page']) && ctype_digit($_GET['page']) == 1) {
            if ($_GET['page'] > $nberPage) {
                $currentPage = $nberPage;
            } else {
                $currentPage = $_GET['page'];
            }
        } else {
            $currentPage = 1;
        }
        $firstArt = ($currentPage - 1) * $perPage;
        return $firstArt;
    }
}