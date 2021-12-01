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
                'vysokeTatry' => $vysokeTatry, 'error_pridanie' => $this->request()->getValue('error_pridanie')
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
            if ($tatry != null) {
                $tatry->delete();
            }
        }
        $this->redirect("tatry","vysokeTatry");
    }

    public function pridaj()
    {
        if (!Auth::isLogged()) {
            $this->redirect("tatry","vysokeTatry");
        }
        $newTatry = new Tatry();
        if (($_POST['nazov'] == "") || ctype_space($_POST['nazov']) || ($_POST['nazov'] == null))  {
            $this->redirect("tatry","vysokeTatry",['error_pridanie' => 'Nevyplneny nazov.']);
            return;
        }
        if ($_POST['popis'] == "" || ctype_space($_POST['popis'] || ($_POST['popis'] == null)))  {
            $this->redirect("tatry","vysokeTatry",['error_pridanie' => 'Nevyplneny popis.']);
            return;
        }
        if ($_POST['dlzka'] < 0.01 || $_POST['dlzka'] > 100 || ($_POST['dlzka'] == null))  {
            $this->redirect("tatry","vysokeTatry",['error_pridanie' => 'Nevyplnena alebo mimo rozsahu (0.01 az 100) dlzka.']);
            return;
        }
        if (!strtotime($_POST['cas']) || ($_POST['cas'] == null))  {
            $this->redirect("tatry","vysokeTatry",['error_pridanie' => 'Nevyplneny cas.']);
            return;
        }
        if (!isset($_FILES['file'])) {
            $this->redirect("tatry","vysokeTatry",['error_pridanie' => 'Nevlozeny obrazok.']);
            return;
        }
        $newTatry->setName($_POST['nazov']);
        $newTatry->setText($_POST['popis']);
        $newTatry->setDistance($_POST['dlzka']);
        $newTatry->setTime($_POST['cas']);
        $newTatry->setArea($_POST['area']);
        if (isset($_FILES['file'])) {
            if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                $name = date('Y-m-d-H-i-s_') . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], Configuration::UPLOAD_DIR . "$name");
                $newTatry->setImage($name);
            }
        }
        $newTatry->save();
        $this->redirect("tatry","vysokeTatry");
    }

    public function upravit() {
        if (!Auth::isLogged()) {
            $this->redirect("tatry","vysokeTatry");
        }
        $tatry = Tatry::getOne($_POST['uprav']);
        if (ctype_space($_POST['nazov']))  {
            $this->redirect("tatry","vysokeTatry",['error_pridanie' => 'Nemozes vlozit medzery.']);
            return;
        }
        if (ctype_space($_POST['popis']))  {
            $this->redirect("tatry","vysokeTatry",['error_pridanie' => 'Nemozes vlozit medzery.']);
            return;
        }
        if (($_POST['dlzka'] < 0.01 || $_POST['dlzka'] > 100 ) & $_POST['dlzka'] != null)  {
            $this->redirect("tatry","vysokeTatry",['error_pridanie' => 'Dlzka moze byt len 0.01 az 100']);
            return;
        }
        if (!strtotime($_POST['cas']) )  {
            $this->redirect("tatry","vysokeTatry",['error_pridanie' => 'Nevyplneny cas.']);
            return;
        }

        if ($_POST['nazov'] != null) {
            $tatry->setName($_POST['nazov']);
        }

        if ($_POST['popis'] != null) {
            $tatry->setText($_POST['popis']);
        }

        if ($_POST['dlzka'] != null) {
            $tatry->setDistance($_POST['dlzka']);
        }

        if ($_POST['cas'] != null) {
            $tatry->setTime($_POST['cas']);
        }

        if ($_POST['area'] != null) {
            $tatry->setArea($_POST['area']);
        }

        if (isset($_FILES['file'])) {
            if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                $name = date('Y-m-d-H-i-s_') . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], Configuration::UPLOAD_DIR . "$name");
                $tatry->setImage($name);
            }
        }
        $tatry->save();
        $this->redirect("tatry","vysokeTatry");
    }

}