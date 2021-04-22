<?php 
    if(!isset($_SESSION)) { session_start(); }
?>
<!DOCTYPE HTML>
<html lang='fr'>
<head>
    <!-- Base -->
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Business Tycoon - Simulateur de gestion d'entreprise</title>


    <!-- Adding Bootstrap -->
    <link href='resources/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css'>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">


    <!-- Adding Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Business Tycoon</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <!-- Base buttons -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link <?= $this->activePage == 'home' ? 'active' : '' ?>" aria-current="page" href=".">Accueil</a>
            </li>

            <?php if(UserController::isConnected()) { ?>
                <li class="nav-item">
                <a class="nav-link <?= $this->activePage == 'business' ? 'active' : '' ?>" aria-current="page" href="?action=business">Affaires</a>
                </li>
            <?php } ?>
        </ul>

        <!-- Dropdown Login/Register/Disconnect -->
        <form class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if(UserController::isConnected()) { ?>
                    <p class="navbar-text mb-lg-0">Connecté en tant que <strong><?= $_SESSION['username_USER'] ?></strong></p> 
                <?php } ?>

                <!-- Dropdown -->
                <li class="nav-item dropdown dropstart">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user fa-lg"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php if(!UserController::isConnected()) { ?>
                    <li><a class="dropdown-item <?= $this->activePage == 'login' ? 'active' : '' ?>" href="?action=login">Se connecter</a></li>
                    <li><a class="dropdown-item <?= $this->activePage == 'register' ? 'active' : '' ?>" href="?action=register">Créer un compte</a></li>
                <?php } ?>
                
                <?php if(UserController::isConnected()) { ?>
                    <li><a class="dropdown-item text-danger" href="./?action=logout">Déconnexion</a></li>
                    <?php if(UserController::isAdmin()) { ?>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#">Mode administrateur</a></li> 
                    <?php } ?>
                <?php } ?>
            </ul>
        </form>
        </div>
    </div>
    </nav>
</head>
</html>