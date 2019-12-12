<?php

namespace Kernel\Application;

use Exception;
use Kernel\Services\ConnectInformations;

class Template extends ConnectInformations
{
    public function render($path, $args)
    {
        if (file_exists($path)) {
            extract($args);
            if (isset($_SESSION['msgFlash'])) {
                $message = $_SESSION['msgFlash'];
                unset($_SESSION['msgFlash']);
            }
            $isConnected = $this->isConnected();
            $isUserConnected = $this->isUserConnected();
            $isAdminConnected = $this->isAdminConnected();
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'Src/Views/mytemplate.php';
        } else {
            throw new Exception('Template Erreur');
        }
    }
}
