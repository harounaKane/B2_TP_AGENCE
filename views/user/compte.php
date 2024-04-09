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

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary modalClick" data-bs-toggle="modal" data-bs-target="#comment" id=" <?= $res->getVehicule()->getId() ?>">
                Commenter
                </button>

            </div> 
        <?php endforeach; ?>

    </div>

    <!-- MODAL COMMENTAIRE -->
    <div class="modal fade" id="comment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Commentaire</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="vehicule" value="" id="vehicule">
                    <textarea name="comment" id="" cols="60" rows="10" class="mb-2"></textarea>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Comment</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>

    <script>

            let modals = document.getElementsByClassName("modalClick");

            for (let i = 0; i < modals.length; i++) {
                modals[i].addEventListener("click", () => {
                    document.getElementById("vehicule").value = modals[i].getAttribute('id');
                })
            }

    </script>
    