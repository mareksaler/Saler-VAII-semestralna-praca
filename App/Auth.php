<?php

namespace App;

use App\Models\Pouzivatel;

class Auth
{
    const LOGIN = 'a@a.sk';
    const PASSWORD = 'aaa';

    public static function login($login, $password)
    {
        $pouzivatelia = Pouzivatel::getAll();
        foreach ($pouzivatelia as $pouzivatel) {
            $email = $pouzivatel->getEmail();
            $heslo = $pouzivatel->getHeslo();
            if ($login == $email && $password == $heslo) {
                $_SESSION["name"] = $login;
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public static function isLogged()
    {
        return isset($_SESSION['name']);
    }

    public static function getName()
    {
        return (Auth::isLogged() ? $_SESSION['name'] : "");
    }

    public static function logout()
    {
        unset($_SESSION['name']);
        session_destroy();
    }

}