
    <h2 class="text-center">détail du véhicule <?= $vehicule->getMarque() ?></h2>
    <div class="row">
        <div class="card col-5 m-1 p-1">
            <div class="w-100">
                <img src="<?= $vehicule->getPhoto() ?>" class="img-fluid" alt="">
            </div>

            <div class="card-body">
                <h3 class="card-title"><?= $vehicule->getMarque() ?></h3>
                <h3 class="card-text"><?= $vehicule->getPrixJournalier() ?> €/jour</h3>
                <p class="card-text">Etat <?= $vehicule->getEtat() ?> </p>
            </div>
        </div> 

        <div class="col-6">
            <h4 class="h2">Réserver</h4>
            <form action="" method="post">
                <input type="hidden" name="id_vehicule" value="<?= $vehicule->getId() ?>">
                <input type="hidden" name="id_personne" value="<?= unserialize($_SESSION['user'])->getId() ?>">
                <div class="form-group">
                    <label for="">date début</label>
                    <input type="date" name="debut" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">date fin</label>
                    <input type="date" name="fin" class="form-control">
                </div>
                <input type="submit" class="mt-2">
            </form>
        </div>

    </div>

