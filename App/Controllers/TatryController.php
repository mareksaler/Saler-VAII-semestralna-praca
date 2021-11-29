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

    public function odstranit() {
        if (!Auth::isLogged()) {
            $this->redirect("home");
        }
        if(isset($_POST['ID'])) {
            $tatry = Tatry::getOne($_POST['ID']);
            $tatry->delete();
        }
        $this->redirect("tatry","vysokeTatry");
    }

    public function pridaj()
    {
        if (!Auth::isLogged()) {
            $this->redirect("tatry","vysokeTatry");
        }
        if (isset($_FILES['file'])) {
            if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                $name = date('Y-m-d-H-i-s_') . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], Configuration::UPLOAD_DIR . "$name");
                $newTatry = new Tatry();
                $newTatry->setImage($name);
                $newTatry->setName($_POST['nazov']);
                $newTatry->setText($_POST['popis']);
                $newTatry->setDistance($_POST['dlzka']);
                $newTatry->setTime($_POST['cas']);
                $newTatry->setArea($_POST['area']);
                $newTatry->save();
            }
        }
        $this->redirect("tatry","vysokeTatry");
    }

    public function upravit() {
        if (!Auth::isLogged()) {
            $this->redirect("tatry","vysokeTatry");
        }

        //if (isset($_POST['uprav'])) {
//                $name = date('Y-m-d-H-i-s_') . $_FILES['file']['name'];
//                move_uploaded_file($_FILES['file']['tmp_name'], Configuration::UPLOAD_DIR . "$name");
//                $tatry->setImage($name);
                $tatry = Tatry::getOne($_POST['uprav']);
               // $tatry = $this->request()->getValue('uprav');
                $tatry->setName($_POST['nazov']);
                $tatry->setText($_POST['popis']);
                $tatry->setDistance($_POST['dlzka']);
                $tatry->setTime($_POST['cas']);
                $tatry->save();
       // }
        $this->redirect("tatry","vysokeTatry");
    }

}