<?php

namespace  Platform\Controllers;

use Kernel\Application\AbstractController;

class HomeController extends AbstractController
{
    public function showHomePage()
    {
        $this->useTemplate('../Src/Views/homeView.php', [
                'title' => 'Accueil',
            ]);
    }
}
