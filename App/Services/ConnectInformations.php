<?php

namespace Kernel\Services;

use Platform\Models\UsersModel;

class ConnectInformations
{
    protected function isConnected()
    {
        if (isset($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function isUserConnected()
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

    public function isAdminConnected()
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
}
