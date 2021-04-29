<div class="col overflow-auto h-100">
    <div class='p-1'></div>
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addBusinessModal">Acheter une affaire</button>
    <div class='p-2'></div>
    <div class="bg-light border rounded-3 p-3">
        <h2>Vue d'ensemble de vos affaires</h2>
        <p>Voici une vue d'ensemble de toutes vos entreprises, vous pouvez donc apercevoir dans ce menu l'argent gagné, le nombre d'employés, etc.</p>
        <div class='p-2'></div>   
        <?php foreach($this->businessList as $key => $val) { ?> 
            <div class="bg-white border rounded-3 p-3">
                <button type="button" class="btn btn-outline-success float-right"><i class="fas fa-hand-holding-usd fa-lg"></i></button>
                <h3><?= $val['name_BUSINESS']; ?></h3>
                <h6 class='text-muted'>Domaine de l'entreprise: <strong>DOMAIN</strong></h6>
                <hr>
                <h6 style='font-weight: normal;'>Nombre d'employés actifs: <strong><?= $val['ea_BUSINESS']?></strong></h6>
                <h6 style='font-weight: normal;'>Argent actuel de l'entreprise: <strong><?= $val['money_BUSINESS']?>€</strong></h6>
                <h6 style='font-weight: normal;'>Revenus/minutes de l'entreprise: <strong><?= $val['income_BUSINESS']?>€</strong></h6>
                
                <div class='p-1'></div>
                <?php 
                    if($val['isManaged_BUSINESS']) {
                        echo "<h6 class='text-success'><strong>Entreprise dirigée par un directeur</strong></h6>";
                    } else {
                        echo "<h6 class='text-danger'><strong>Entreprise non dirigée par un directeur</strong></h6>";
                    }
                ?>
                
            </div>
            <div class='p-1'></div>
        <?php } ?>
    </div>
</div>

<script type="text/javascript">
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

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
                                    <option value="1">Agroalimentaire</option>
                                    <option value="2">Banque / Assurance</option>
                                    <option value="3">Commerce</option>
                                    <option value="4">Industrie Pharmaceutique</option>
                                    <option value="5">Informatique</option>
                                    <option value="6">Textile</option>
                                    <option value="7">Transports / Logistique</option>
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
                        <hr/>
                        <div class='row'>
                            <div class='col-10'>
                                <a class="nav-link px-2 text-truncate text-success" href="#">
                                    <i class="fas fa-shopping-cart fs-6"></i>
                                    <span class="d-none d-sm-inline">Montant total: <?= number_format($_SESSION['money_USER']) . '€'; ?></span> 
                                </a>
                            </div>
                        </div>
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


    <!-- Adding JS Script to make Tooltip work -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    
    <script>
        var options = { animation : true, };
        
        var element = document.getElementById( 'businessDomain_help' );
        
        var tooltip = new bootstrap.Tooltip( element, options );
    </script>
</body>

    
<!-- Closing the 'main' and 'div' balise from business_sidebar.php -->
</div>
</main>
