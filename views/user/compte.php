<h2 class="text-center">Mon compte</h2>

<div class="row mt-3 justify-content-around">
        <?php foreach($reservations as $res): ?>
            <div class="card col-3 m-1 p-1">
                <div class="w-100">
                    <img src="<?= $res->getVehicule()->getPhoto() ?>" class="img-fluid" alt="">
                </div>

                <div class="card-body">
                    <h3 class="card-title">
                        <?=  $res->getVehicule()->getMarque() ?>
                        réservé le <?= $res->getDateReservation() ?>
                    </h3>
                    <p class="card-title">
                        Du <?=  $res->getDebut() ?> au <?=  $res->getFin() ?>
                    </p>
                    <p class="card-text">
                        <?= $res->getVehicule()->getPrixJournalier() ?> €/jour
                        <div>
                            soit 1500€ total
                        </div>
                    </p>
                </div>

                <a class="btn btn-outline-success" href="?actionVehicule=detail&id=<?= $res->getVehicule()->getId() ?>">commenter</a>

            </div> 
        <?php endforeach; ?>

    </div>