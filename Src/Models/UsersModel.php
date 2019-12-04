<?php

namespace Platform\Models;

use Kernel\Application\AbstractModel;

class UsersModel extends AbstractModel
{
    public function addUser($firstname, $lastname, $password, $email, $validation_key)
    {
        $bdd = $this->datasConnect();
        $reqUser = $bdd->prepare('INSERT INTO users(firstname, lastname, password, email, validation_key) VALUES(:firstname, :lastname, :password, :email, :validation_key)');
        $result = $reqUser->execute(array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => $email,
            'validation_key' => $validation_key,
        ));

        return $result;
    }

    public function getUserByEmail($email)
    {
        $bdd = $this->datasConnect();
        $req = $bdd->prepare('SELECT * FROM users WHERE email=?');
        $req->execute(array($email));
        $userData = $req->fetch();

        return $userData;
    }

    public function getUserById($id)
    {
        $bdd = $this->datasConnect();
        $req = $bdd->prepare('SELECT * FROM users WHERE id=?');
        $req->execute(array($id));
        $userData = $req->fetch();

        return $userData;
    }

    public function emailValidation($email)
    {
        $bdd = $this->datasConnect();
        $reqEmailValid = $bdd->prepare('UPDATE users SET active=:active WHERE email=:email');
        $reqEmailValid->execute(array(
            'active' => true,
            'email' => $email,
        ));

        return $reqEmailValid;
    }
}
