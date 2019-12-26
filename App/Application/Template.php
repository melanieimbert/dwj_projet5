<?php

namespace Kernel\Application;

use Exception;
use Kernel\Services\ConnectInformations;

class Template extends ConnectInformations
{
    public function render($path, $args, $layout)
    {
        if (file_exists($path)) {
            extract($args);
            if (isset($_SESSION['msgFlash'])) {
                $message = $_SESSION['msgFlash'];
                if (isset($_SESSION['typeMsg'])) {
                    $type = $_SESSION['typeMsg'];
                } else {
                    $type = 'alert alert-info';
                }
                unset($_SESSION['msgFlash']);
                unset($_SESSION['typeMsg']);
            }
            $isConnected = $this->isConnected();
            $isUserConnected = $this->isUserConnected();
            $isAdminConnected = $this->isAdminConnected();
            ob_start();
            require $path;
            $content = ob_get_clean();
            require $layout;
        } else {
            throw new Exception('Template Erreur');
        }
    }
}
