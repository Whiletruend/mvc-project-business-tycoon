<div class="col overflow-auto h-100">
    <div class='p-1'></div>
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addManagerModal">Recruter un directeur</button>
    <div class='p-2'></div>
    <div class="bg-light border rounded-3 p-3">
        <a class="text-info" href="./?action=business_global"><button type="button" class="btn btn-outline-info float-right" id="businessUpgrade_goto" data-toggle="tooltip" data-placement="left" title="Rafraîchir la page"><i class="fas fa-sync-alt fa-lg"></i></button></a>
        <h2>Vue d'ensemble de vos directeurs</h2>
        <p>Voici une vue d'ensemble de tous vos directeurs</p>
        <div class='p-2'></div>
        <?php

use App\controller\BusinessController;

$i = 0; ?>   
        <?php foreach($this->businessList as $key => $val) { ?> 
            <?php if($val['isManaged_BUSINESS']) { ?>
                <div id='businessCard_infos' class="bg-white border rounded-3 p-3">
                    <a class="text-info" href="./?action=business_sell&id_BUSINESS=<?= $val['id_BUSINESS']; ?>"><button type="button" class="btn btn-outline-danger float-right" id="businessUpgrade_goto" data-toggle="tooltip" data-placement="left" title="Vendre l'entreprise"><i class="fas fa-handshake fa-lg"></i></button></a>
                    <h3><?= $val['name_BUSINESS']; ?></h3>
                    <h6 class='text-muted'>Domaine de l'entreprise: <strong><?= $this->domainList[$val['id_DOMAIN']]->getName(); ?></strong></h6>
                    <hr>
                    <h6 style='font-weight: normal;'>Nom du directeur: <strong><?= $this->managerList[BusinessController::businessGetManagerID($val['id_BUSINESS'])] ?> "</strong></h6>";
                </div>
            <?php } ?>
            <?php
                $i++;
                if(!($i == count($this->businessList))) {
                    echo "<div class='p-4'></div>";
                }
            ?>
        <?php } ?>
    </div>
</div>

<!-- Modal -->
<form action='#' method='POST'>
    <div class="modal fade" id="addManagerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelTitle">Recrutement d'un manager</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class='container'>
                    <div class="row">
                        <div class="col-10">
                            <select class="form-select" name='id_BUSINESS' aria-label="Choisissez l'entreprise concernée">
                                <option selected>Choisissez l'entreprise concernée</option>
                                <?php foreach($this->businessList as $key => $val) { ?>
                                    <?php if(!$val['isManaged_BUSINESS']) { ?>
                                        <option value="<?= $val['id_BUSINESS']; ?>"><?= $val['name_BUSINESS']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class='p-2'></div>
                    <div class="row">
                        <div class="col-10">
                            <div class="form-floating">
                                <input type="text" name='name_MANAGER' class="form-control" id="floatingInput" placeholder="name_BUSINESS">
                                <label for="floatingInput">Nom du directeur</label>
                            </div>
                        </div>
                    </div>
                    <div class='p-2'></div>
                    <hr/>
                    <div class='row'>
                        <div class='col-10'>
                            <a class="nav-link px-2 text-truncate text-success" href="#">
                                <i class="fas fa-shopping-cart fs-6"></i>
                                <span class="d-none d-sm-inline">Montant total: <strong>25,000</strong>€</span> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary" name='submit'>Engager</button>
            </div>
        </div>
    </div>
    </div>
</form>

<!-- Closing the 'main' and 'div' balise from business_sidebar.php -->
</div>
</main>