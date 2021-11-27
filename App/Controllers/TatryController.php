<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\Responses\Response;
use App\Models\Tatry;

class TatryController extends AControllerRedirect
{

    public function index()
    {

    }

    public function vysokeTatry()
    {
        $vysokeTatry = Tatry::getAll();

        return $this->html(
            [
                'vysokeTatry' => $vysokeTatry
            ]);
    }

    public function nizkeTatry()
    {
        return $this->html(
            []
        );
    }

    public function zapadneTatry()
    {
        return $this->html(
            []
        );
    }
}