<!DOCTYPE HTML>
<html lang='fr'>
<head>
    <!-- Base -->
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Laboratory Clicker</title>


    <!-- Adding Bootstrap -->
    <link href='resources/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css'>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">


    <!-- Adding Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Laboratory Clicker</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <!-- Base buttons -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link <?= $this->activePage == 'index' ? 'active' : '' ?>" aria-current="page" href=".">Accueil</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Directeurs</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Améliorations</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Domaines</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Utilisateurs</a>
            </li>
        </ul>

        <!-- Dropdown Login/Register/Disconnect -->
        <form class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown dropstart">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user fa-lg"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item <?= $this->activePage == 'login' ? 'active' : '' ?>" href="?action=login">Se connecter</a></li>
                <li><a class="dropdown-item <?= $this->activePage == 'register' ? 'active' : '' ?>" href="?action=register">Créer un compte</a></li>
             
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#">Déconnexion</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#">Mode administrateur</a></li>
            </ul>
        </form>
        </div>
    </div>
    </nav>
</head>

<body>
</body>


</html>