<?php

namespace Kernel\Application\Services;

class Validation
{
    public function stringValidation($stringPost)
    {
        if (preg_match('#[a-z0-9]#i', $stringPost)) {
            return true;
        }
    }

    public function emailValidation($mailPost)
    {
        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,3}$#", $mailPost)) {
            return true;
        }
    }
}
