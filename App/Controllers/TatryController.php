<?php

namespace App\Controllers;

use App\Auth;
use App\Core\Responses\Response;

class TatryController extends AControllerRedirect
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function vysokeTatry()
    {
        return $this->html(
            []
        );
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