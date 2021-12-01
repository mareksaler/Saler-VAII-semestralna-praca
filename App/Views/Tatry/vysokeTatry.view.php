<?php /** @var Array $data */ ?>
<div class="container">
    <div class="row farba-text p-2 rounded-2 border border-dark mb-4">
        <img src="public/img/vysoke_tatry/Vysoké_Tatry_panorama1.jpg" class="img-fluid" alt="Vyske Tatry panorama">
    </div>
    <div class="row farba-text p-2 rounded-2 border border-dark mb-4">
        <h1 class="text-center p-1">Vysoké Tatry</h1>
        <p>
            Vysoké Tatry sú najvyššie pohorie na Slovensku a v Poľsku a sú zároveň jediným horstvom v týchto štátoch s
            alpským charakterom. Sú geomorfologickou časťou Východných Tatier a majú rozlohu 341 km² (260 km² na Slovensku a 81 km² v Poľsku).
        </p>
    </div>
    <div class="row farba-text p-2 rounded-2 border border-dark mb-4">
        <h3>Vrcholy</h3>
        <hr>
        <p>
            Vo Vysokých Tatrách nájdeme 26 vrcholov prevyšujúcich výšku 2 500 metrov. 10 vrcholov s výškou nad 2 000 m.n.m.
            v slovenských Vysokých Tatrách je turistom prístupných po značených chodníkoch so sezónnymi uzávierkami od 1. 11. – 15. 6.
            Naproti tomu vrcholy Gerlachovský štít, Vysoká, Ganek, Bradavica, Prostredný hrot, Ľadový štít, Baranie rohy, Lomnický štít, Kežmarský štít a iné sú pre
            turistov dostupné iba v sprievode horského vodcu. Pre horolezca s potrebným preukazom je lezenie na väčšine územia národného parku povolené na
            vlastné nebezpečenstvo.
        </p>
        <p>Tatranské vrcholy nad 2 500 m:</p>
        <div class="col">
            <ul>
                <li>Gerlachovský štít (2 655 m n. m.)</li>
                <li>Gerlachovská veža (2 642 m n. m.)</li>
                <li>Lomnický štít (2 634 m n. m.)</li>
                <li>Ľadový štít (2 627 m n. m.)</li>
                <li>Pyšný štít (2 621 m n. m.)</li>
                <li>Zadný Gerlach (2 616 m n. m.)</li>
                <li>Lavínový štít (2 606 m n. m.)</li>
                <li>Malý Ľadový štít (2 603 m n. m.)</li>
                <li>Kotlový štít (2 601 m n. m.)</li>
                <li>Lavínová veža (2 600 m n. m.)</li>
                <li>Malý Pyšný štít (2 590 m n. m.)</li>
                <li>Veľká Litvorová veža (2 581 m n. m.)</li>
                <li>Loktibrada (2 575 m n. m.)</li>
                <li>Strapatá veža (2 565 m n. m.)</li>
                <li>Posledná veža (2 560 m n. m.)</li>
                <li>Kežmarský štít (2 556 m n. m.)</li>
            </ul>
        </div>
            <div class="col">
                <ul>
                    <li>Vysoká (2 547 m n. m.)</li>
                    <li>Malá Litvorová veža (2 547 m n. m.)</li>
                    <li>Supia veža (2 540 m n. m.)</li>
                    <li>Končistá (2 538 m n. m.)</li>
                    <li>Baranie rohy (2 526 m n. m.)</li>
                    <li>Čertova veža (2 525 m n. m.)</li>
                    <li>Dračí štít (2 523 m n. m.)</li>
                    <li>Veľká Vidlová veža (2 523 m n. m.)</li>
                    <li>Ťažký štít (2 520 m n. m.)</li>
                    <li>Malý dračí štít (2 518 m n. m.)</li>
                    <li>Veterný štít (2 515 m n. m.)</li>
                    <li>Malý Kežmarský štít (2 514 m n. m.)</li>
                    <li>Zadný Ľadový štít (2 512 m n. m.)</li>
                    <li>Predný štôlsky hrb (2 510 m n. m.)</li>
                    <li>Rysy (2 503 m n. m.)</li>
                </ul>
            </div>

    </div>
    <div class="row p-1">
        <?php if (\App\Auth::isLogged()) { ?>
            <div class="col">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pridajTuru">
                    Pridať túru
                </button>
                <?php if($data['error_pridanie'] != "") { ?>
                    <div class="col">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <?=$data['error_pridanie']?>
                        </div>
                    </div>
                <?php } ?>
                <?php include "tatry/pridatForm.php"; ?>
            </div>
        <?php } else { ?>

        <?php } ?>
    </div>
    <div class="row farba-text p-2 rounded-2 border border-dark mb-4">
        <div class="d-flex justify-content-start flex-wrap">
            <?php foreach ($data['vysokeTatry'] as $vysokeTatry) { ?>
                <?php if (\App\Auth::isLogged()) { ?>
                    <div class="card karta">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#vysokeTatry<?=$vysokeTatry->getId()?>">
                            <img src="<?= \App\Config\Configuration::UPLOAD_DIR . $vysokeTatry->getImage() ?>" height="160px" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a href="#" data-bs-toggle="modal" class="karta-nadpis" data-bs-target="#vysokeTatry<?=$vysokeTatry->getId()?>">
                                <h5 class="card-title"><?=$vysokeTatry->getName()?></h5>
                            </a>
                            <div class="row">
                                <div class="col ">
                                    <form method="post" action="?c=tatry&a=odstranit">
                                        <input type="hidden" name="ID" value="<?=$vysokeTatry->getId()?>">
                                        <button type="submit" class="btn btn-primary btn-sm">Vymazať</button>
                                    </form>
                                </div>
                                <div class="col">
                                    <form method="post" action="?c=tatry&a=upravit">

                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#upravTuru<?=$vysokeTatry->getId()?>">
                                            Upravit
                                        </button>
                                    </form>
                                    <?php include "tatry/upravForm.php"?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else {?>
                    <a href="#" data-bs-toggle="modal" class="karta-nadpis" data-bs-target="#vysokeTatry<?=$vysokeTatry->getId()?>">
                        <div class="card karta">
                            <img src="<?= \App\Config\Configuration::UPLOAD_DIR . $vysokeTatry->getImage() ?>" height="160px" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?=$vysokeTatry->getName()?></h5>
                            </div>
                        </div>
                    </a>
                <?php }?>
                <?php include "tatry/infoModal.php"?>

            <?php } ?>
        </div>
    </div>
</div>
