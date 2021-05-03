<script type="text/javascript">
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

</script>

<div class="col overflow-auto h-100">
    <div class="bg-light border rounded-3 p-3">
        <a class="text-info" href="./?action=business_global"><button type="button" class="btn btn-outline-info float-right" id="businessUpgrade_goto" data-toggle="tooltip" data-placement="left" title="Rafraîchir la page"><i class="fas fa-sync-alt fa-lg"></i></button></a>
        <h2>Améliorations de vos affaires</h2>
        <p>Voici une vue d'ensemble de toutes vos entreprises, vous pouvez donc choisir les améliorations que vous désirez attribuer à vos différentes affaires.</p>
        <div class='p-2'></div>
        <?php $i = 0; ?>   
        <?php foreach($this->businessList as $key => $val) { ?> 
            <div id='businessCard_infos' class="bg-white border rounded-3 p-3">
                <a class="text-info" href="./?action=business_sell&id_BUSINESS=<?= $val['id_BUSINESS']; ?>"><button type="button" class="btn btn-outline-danger float-right" id="businessUpgrade_goto" data-toggle="tooltip" data-placement="left" title="Vendre l'entreprise"><i class="fas fa-handshake fa-lg"></i></button></a>
                <h3><?= $val['name_BUSINESS']; ?></h3>
                <h6 class='text-muted'>Domaine de l'entreprise: <strong><?= $this->domainList[$val['id_DOMAIN']]->getName(); ?></strong></h6>
                <hr>
                <h6 style='font-weight: normal;'>Nombre d'employés actifs: <strong><?= $val['ea_BUSINESS']; ?> / 30</strong></h6>
                <h6 style='font-weight: normal;'>Argent actuel de l'entreprise: <strong><?= number_format($val['money_BUSINESS']); ?>€</strong></h6>
                <h6 style='font-weight: normal;'>Revenus/minutes de l'entreprise: <strong><?= number_format($val['income_BUSINESS']); ?>€</strong></h6>
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

    
<!-- Closing the 'main' and 'div' balise from business_sidebar.php -->
</div>
</main>
