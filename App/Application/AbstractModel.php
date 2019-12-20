<?php

namespace Kernel\Application;

use PDO;
use Symfony\Component\Yaml\Yaml;

abstract class AbstractModel
{
    protected function datasConnect()
    {
        $yaml = new Yaml();
        $value = $yaml->parseFile(__DIR__.'/../Config/configBdd.yml');
        $bdd = new PDO('mysql:host='.$value['host'].';dbname='.$value['dbname'].';charset=utf8', $value['userName'], $value['pass']);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $bdd;
    }
}
