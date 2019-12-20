<?php

namespace Kernel\Application;

abstract class AbstractController
{
    protected function useTemplate($path, $args, $layout="../Src/Views/Layouts/layout.php")
    {
        $template = new Template();
        $template->render($path, $args, $layout);

        return $template;
    }

    protected function msgSession($msgFlash)
    {
        $_SESSION['msgFlash'] = $msgFlash;
    }
}
