<?php

namespace  Platform\Controllers;

use Kernel\Application\AbstractController;

class HomeController extends AbstractController
{
    public function showHomePage()
    {
        $this->useTemplate(__DIR__.'/../Views/homeView.php', [
                'title' => 'Accueil',
            ]);
    }
}
