<script type="text/javascript">
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

</script>

<div class="col overflow-auto h-100">
    <div class='p-1'></div>
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addBusinessModal">Acheter une affaire</button>
    <div class='p-2'></div>
    <?php if(self::$msg != '') {?>
        <div class="alert alert-danger alert-dismissible fade show" id='login_error_Alert' role="alert">
            <strong>Erreur !</strong> <?= self::$msg ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            $("#login_error_Alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#login_error_Alert").slideUp(500);
            });
        </script>
    <?php } ?>
    <div class="bg-light border rounded-3 p-3">
        <a class="text-info" href="./?action=business_global"><button type="button" class="btn btn-outline-info float-right" id="businessUpgrade_goto" data-toggle="tooltip" data-placement="left" title="Rafraîchir la page"><i class="fas fa-sync-alt fa-lg"></i></button></a>
        <h2>Vue d'ensemble de vos affaires</h2>
        <p>Voici une vue d'ensemble de toutes vos entreprises, vous pouvez donc apercevoir dans ce menu l'argent gagné, le nombre d'employés, etc.</p>
        <div class='p-2'></div>
        <?php $i = 0; ?>   
        <?php foreach($this->businessList as $key => $val) { ?> 
            <div id='businessCard_infos' class="bg-white border rounded-3 p-3">
                <a class="text-info" href="./?action=business_sell&id_BUSINESS=<?= $val['id_BUSINESS']; ?>"><button type="button" class="btn btn-outline-danger float-right" id="businessUpgrade_goto" data-toggle="tooltip" data-placement="left" title="Vendre l'entreprise"><i class="fas fa-handshake fa-lg"></i></button></a>
                <h3><?= $val['name_BUSINESS']; ?></h3>
                <h6 class='text-muted'>Domaine de l'entreprise: <strong><?= $this->domainList[$val['id_DOMAIN']]->getName(); ?></strong></h6>
                <hr>
                <h6 style='font-weight: normal;'>Nombre d'employés actifs: <strong><?= self::getLevelByBusinessAndUpgradeID($val['id_BUSINESS'], 3); ?></strong></h6>
                <h6 style='font-weight: normal;'>Argent actuel de l'entreprise: <strong><?= number_format($val['money_BUSINESS']); ?>€</strong></h6>
                <h6 style='font-weight: normal;'>Revenus/minutes de l'entreprise: <strong><?= self::getLevelByBusinessAndUpgradeID($val['id_BUSINESS'], 1); ?>€</strong></h6>
                <a class='text-success' href='./?action=business_moneyget&id_BUSINESS=<?= $val['id_BUSINESS']; ?>'><button type="button" class="btn btn-outline-success float-right" id="businessMoney_get" data-toggle="tooltip" data-placement="left" title="Récupérer l'argent"><i class="fas fa-hand-holding-usd fa-lg"></i></button></a>
                <div class='p-2 float-right'></div>
                <a class='text-success' href='./?action=business_upgrades'><button type="button" class="btn btn-outline-primary float-right" id="businessUpgrade_goto" data-toggle="tooltip" data-placement="left" title="Allez aux améliorations"><i class="bi bi-speedometer fa-lg"></i></button></a>
                <div class='p-1'></div>
                <?php 
                    if($val['isManaged_BUSINESS']) {
                        echo "<h6 class='text-success'><strong>Entreprise dirigée par un directeur</strong></h6>";
                    } else {
                        echo "<h6 class='text-danger'><strong>Entreprise non dirigée par un directeur</strong></h6>";
                    }
                ?>      
            </div>
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
<body>
    <form action='#' method='POST'>
        <div class="modal fade" id="addBusinessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelTitle">Achat d'une nouvelle entreprise</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class='container'>
                        <div class="row">
                            <div class="col-10">
                                <select class="form-select" name='domain_BUSINESS' aria-label="Choisissez le domaine de votre entreprise">
                                    <option selected>Choisissez le domaine de votre entreprise</option>
                                    <?php foreach($this->domainList as $key => $val) {?>
                                        <option value="<?= $key ?>"><?= $val->getName() . ' - ' . number_format($val->getCost()) . '€'; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class='col-md-auto'>
                                <button type="button" class="btn btn-info" id="businessDomain_help" data-toggle="tooltip" data-placement="left" title="Le domaine concerne le secteur d'activité dans lequel l'entreprise va travailler. Le choix du domaine influe sur la quantité d'argents gagnés.">
                                    ?
                                </button>
                            </div>
                        </div>
                        <div class='p-2'></div>
                        <div class="row">
                            <div class="col-10">
                                <div class="form-floating">
                                    <input type="name_BUSINESS" name='name_BUSINESS' class="form-control" id="floatingInput" placeholder="name_BUSINESS">
                                    <label for="floatingInput">Nom de l'entreprise</label>
                                </div>
                            </div>
                        </div>
                        <div class='p-2'></div>
                        <div class="row">
                            <div class="col-10">
                                <select class="form-select" name='ea_BUSINESS' aria-label="Choisissez le domaine de votre entreprise">
                                    <option selected>Nombre d'employés au démarrage</option>
                                    <option value="1">1 employé</option>
                                    <option value="2">2 employés</option>
                                    <option value="3">3 employés</option>
                                </select>
                            </div>
                        </div>
                        <div class='p-2'></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" name='submit'>Suivant</button>
                </div>
            </div>
        </div>
        </div>
    </form>

    <?php if(isset(self::$buyingRecap['OnRecap'])) { ?>
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#recapModal').modal('show');
            });
        </script>

        <form method='POST'>
            <div class="modal fade" id="recapModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modelTitle">Récapitulatif de votre achat d'entreprise</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class='container'>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input class="form-control" value="<?= self::$buyingRecap['Name']; ?>" type="text" name='recap_name_BUSINESS' readonly>
                                        <label for="floatingInput">Nom de l'entreprise</label>
                                    </div>
                                </div>
                            </div>
                            <div class='p-2'></div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input class="form-control d-none" value="<?= self::$buyingRecap['DomainID']; ?>" type="text" name='recap_domain_BUSINESS' readonly>
                                        <input class="form-control" value="<?= self::$buyingRecap['Domain']; ?>" type="text" readonly>
                                        <label for="floatingInput">Domaine de l'entreprise</label>
                                    </div>
                                </div>
                            </div>
                            <div class='p-2'></div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input class="form-control" value="<?= self::$buyingRecap['Emp_amount']; ?>" type="text" name='recap_empamount_BUSINESS' readonly>
                                        <label for="floatingInput">Nombre d'employé(s) au démarrage</label>
                                    </div>
                                </div>
                            </div>
                            <div class='p-2'></div>
                            <hr/>
                            <div class='row'>
                                <div class='col-10'>
                                    <a class="nav-link px-2 text-truncate text-success" href="#">
                                        <i class="fas fa-shopping-cart fs-6"></i>
                                        <span class="d-none d-sm-inline">Montant total: <?= number_format(self::$buyingRecap['TotalCost']) . '€'; ?></span> 
                                    </a>
                                </div>
                            </div>
                            <input type="text" readonly class="form-control-plaintext text-success d-none" name="recap_totalcost_BUSINESS" value="<?= self::$buyingRecap['TotalCost']; ?>"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" name='submit'>Acheter</button>
                    </div>
                </div>
            </div>
            </div>
        </form>
    <?php } ?>


    <!-- Adding JS Script to make Tooltip work -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    
    <script>
        var options = { animation : true, };
        
        var element = document.getElementById('businessDomain_help');
        
        var tooltip = new bootstrap.Tooltip(element, options);
    </script>
</body>

    
<!-- Closing the 'main' and 'div' balise from business_sidebar.php -->
</div>
</main>
