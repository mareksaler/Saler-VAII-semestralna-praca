<!DOCTYPE html>
<html lang="sk">
<head>
    <title>FRI-MVC FW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <!-- Responzivnost na mobilnych zariadeniach -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css.css">

</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
    <div class="container">
        <a class="navbar-brand" href="#">FRI-MVC FW </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="tlacidlo-nav" href="?c=home">Domov</a>
                </li>
                <li class="nav-item">
                    <a class="tlacidlo-nav" href="?c=home&a=contact">Kontakt</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
            <?php if (\App\Auth::isLogged()) { ?>
                <li class="nav-item">
                    <a class="tlacidlo-nav" href="?c=home&a=post">Pridaj foto</a>
                </li>
                <li class="nav-item">
                    <a class="tlacidlo-nav tlacidlo-border" href="?c=auth&a=logout">Odhlásť</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="tlacidlo-nav" href="<?= \App\Config\Configuration::LOGIN_URL ?>">Prihlásiť</a>
                </li>
            <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div class="obsah">
    <div class="container">
        <div class="row mt-2">
            <div class="col">
                <?= $contentHTML ?>
            </div>
        </div>
    </div>
    <div class="push"></div>
</div>

<footer class="bg-dark footer">
    <!-- Grid container -->
    <div class="d-flex justify-content-center">
        <!--Grid row-->
        <div class="row ">
            <!--Grid column-->
            <div class="col p-3">
                <ul class="list-unstyled text-center">
                    <li>
                        <a href="?c=home" class="odkaz">Domov</a>
                    </li>
                    <li>
                        <a href="#" class="odkaz">Vysoké Tatry</a>
                    </li>
                    <li>
                        <a href="#" class="odkaz">Nízke Tatry</a>
                    </li>
                    <li>
                        <a href="#" class="odkaz">Západné Tatry</a>
                    </li>
                    <li>
                        <a href="#" class="odkaz">Akcie 2022</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->
</footer>

</body>
</html>

