<?php

namespace Kernel\Application;

abstract class AbstractController
{
    protected function useTemplate($path, $args)
    {
        $template = new Template();
        $template->render($path, $args);

        return $template;
    }

    protected function msgSession($msgFlash)
    {
        $_SESSION['msgFlash'] = $msgFlash;
    }
}
