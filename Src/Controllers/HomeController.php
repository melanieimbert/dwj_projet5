<?php

namespace  Platform\Controllers;

use Kernel\Application\AbstractController;

class HomeController extends AbstractController
{
    public function showHomePage()
    {
        $isConnected = $this->isConnected();
        $this->useTemplate(__DIR__.'/../Views/homeView.php', [
                'title' => 'Accueil',
                'isConnected' => $isConnected,
            ]);
    }
}
