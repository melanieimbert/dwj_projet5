<?php

namespace Kernel\Application;

use Platform\Models\UsersModel;

abstract class AbstractController
{
    protected function isConnected()
    {
        if (isset($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }

    protected function isUserConnected()
    {
        $usersModel = new UsersModel();
        if (isset($_SESSION['id'])) {
            $user = $usersModel->getUserById($_SESSION['id']);
            if ($user['role'] === 'user') {
                return true;
            }
        } else {
            return false;
        }
    }

    protected function isAdminConnected()
    {
        $usersModel = new UsersModel();
        if (isset($_SESSION['id'])) {
            $user = $usersModel->getUserById($_SESSION['id']);
            if ($user['role'] === 'admin') {
                return true;
            }
        } else {
            return false;
        }
    }

    protected function isCoordoConnected()
    {
        $usersModel = new UsersModel();
        if (isset($_SESSION['id'])) {
            $user = $usersModel->getUserById($_SESSION['id']);
            if ($user['role'] === 'coordo') {
                return true;
            }
        } else {
            return false;
        }
    }

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
