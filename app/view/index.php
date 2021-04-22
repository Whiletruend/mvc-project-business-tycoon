<div class="container h-25">
    <div class="row align-items-center h-100">
        <div class="col-12">
            <div class="h-100 justify-content-center">
                <div>
                    <center><h2>Bienvenue sur Business Tycoon !<h2></center>
                </div>

                <div>
                    <center><h5 class='text-muted'>Voici un tableau des 5 meilleurs joueurs</h5></center>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container w-50">
    <div class="row align-items-center">
        <div class="col-12">
            <div class="justify-content-center">
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pseudonyme</th>
                            <th scope="col">Argent</th>
                            <th scope="col">Nombre d'affaires</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($this->userRanking as $key => $val) { ?>
                            <tr>
                            <th scope="row"><?= $key + 1; ?></th>
                            <td><?= $val['Username']; ?></td>
                            <td><?= number_format($val['Money']) . '€'; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>