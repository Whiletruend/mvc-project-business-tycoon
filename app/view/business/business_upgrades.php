<div class="col overflow-auto h-100">
    <div class="bg-light border rounded-3 p-3">
        <a class="text-info" href="./?action=business_upgrades"><button type="button" class="btn btn-outline-info float-right" id="businessUpgrade_goto" data-toggle="tooltip" data-placement="left" title="Rafraîchir la page"><i class="fas fa-sync-alt fa-lg"></i></button></a>
        <h2>Améliorations de vos affaires</h2>
        <p>Voici une vue d'ensemble de toutes vos entreprises, vous pouvez donc choisir les améliorations que vous désirez attribuer à vos différentes affaires.</p>
        <div class='p-2'></div>
        <?php $i = 0; ?>   
        <?php foreach($this->businessList as $key => $val) { ?> 
            <div id='businessCard_infos' class="bg-white border rounded-3 p-3">
                <h3><?= $val['name_BUSINESS']; ?></h3>
                <h6 class='text-muted'>Domaine de l'entreprise: <strong><?= $this->domainList[$val['id_DOMAIN']]->getName(); ?></strong></h6>
                <hr>
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col-lg">
                            <h6 style='font-weight: normal;'>Nombre d'employés actifs: <strong><?= $val['ea_BUSINESS']; ?> / 30</strong></h6>
                            <a href='.?action=business_new_employee&id_BUSINESS'><button class='btn btn-outline-primary'>Engager un nouvel employé</button></a>
                        </div>
                        
                        <div class="col-lg">
                            <h6 style='font-weight: normal;'>Revenus de l'entreprise: <strong><?= $val['income_BUSINESS']; ?> / minutes</strong></h6>
                            <a href='#'><button class='btn btn-outline-primary'>Surcadençage du travail</button></a>
                        </div>

                        <div class="col-lg">
                            <h6 style='font-weight: normal;'>Qualité du travail de l'entreprise: <strong><?= $val['income_BUSINESS']; ?></strong></h6>
                            <a href='#'><button class='btn btn-outline-primary'>Qualité du travail</button></a>
                        </div>
                    </div>
                </div>
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

    
<!-- Closing the 'main' and 'div' balise from business_sidebar.php -->
</div>
</main>
