
    <h2 class="text-center">Location de véhicules</h2>

    <div class="row mt-3 justify-content-around">
        <?php foreach($vehicules as $veh): ?>
            <div class="card col-3 m-1 p-1">
                <div class="w-100">
                    <img src="<?= $veh->getPhoto() ?>" class="img-fluid" alt="">
                </div>

                <div class="card-body">
                    <h3 class="card-title"><?= $veh->getMarque() ?></h3>
                    <h3 class="card-text"><?= $veh->getPrixJournalier() ?> €/jour</h3>
                </div>

                <a class="btn btn-outline-success" href="?actionVehicule=detail&id=<?= $veh->getId() ?>">Détail du véhicule</a>

            </div> 
        <?php endforeach; ?>

    </div>