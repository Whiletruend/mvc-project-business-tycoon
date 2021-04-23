<main class="container-fluid pb-3 p-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
    <div class="row flex-grow-sm-1 flex-grow-0">
        <div class="col-sm-2 flex-grow-sm-1 flex-shrink-1 flex-grow-0 pb-sm-0 pb-3">
            <div class="bg-light border rounded-3 p-3 h-100">
                <ul class="nav nav-pills flex-sm-column flex-row mb-auto justify-content-between text-truncate">
                    <li class="nav-item">
                        <a class="nav-link px-2 text-truncate <?= $this->activePage == 'business_global' ? 'active' : '' ?>" aria-current="page" href="?action=business_global">
                            <i class="far fa-eye fs-6"></i>
                            <span class="d-none d-sm-inline">Vue d'ensemble</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link px-2 text-truncate <?= $this->activePage == 'business_upgrades' ? 'active' : '' ?>" aria-current="page" href="?action=business_upgrades">
                            <i class="bi bi-speedometer fs-6"></i>
                            <span class="d-none d-sm-inline">Améliorations</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link px-2 text-truncate <?= $this->activePage == 'business_managers' ? 'active' : '' ?>" aria-current="page" href="?action=business_managers">
                            <i class="fas fa-user-tie fs-6"></i>
                            <span class="d-none d-sm-inline">Directeurs</span> 
                        </a>
                    </li>
                    <hr/>
                    <li>
                        <a class="nav-link px-2 text-truncate text-success" href="#">
                            <i class="fas fa-money-bill-alt fs-6"></i>
                            <span class="d-none d-sm-inline"><?= number_format($_SESSION['money_USER']) . '€'; ?></span> 
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        
<!-- The non closing of the balise 'main' and 'div' is totally normal. -->