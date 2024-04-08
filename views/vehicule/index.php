
    <h2 class="text-center">Liste de véhicules</h2>

    <a class="btn btn-success my-2" href="?actionVehicule=ajouter">Ajouter</a>

    <table class="table table-striped">
        <tr class="table-dark">
            <td>Image</td>
            <td>Marque</td>
            <td>Prix</td>
            <td>Agence</td>
            <td>Action</td>
        </tr>

        <?php foreach($vehicules as $veh): ?>
            <tr>
                <td>
                    <img src="<?= $veh->getPhoto(); ?>" alt="">
                </td>
                <td> <?= $veh->getMarque(); ?> </td>
                <td> <?= $veh->getPrix_journalier(); ?> </td>
                <td> <?= $veh->getId_agence()->getNom(); ?> </td>
                <td>
                    <a href="">UP</a>
                    <form action="" method="post" class="d-inline">
                        <input type="hidden" name="id" value="<?= $veh->getId(); ?>">
                        <input type="hidden" name="token" value="<?= $token; ?>">
                        <input type="submit" value="X">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>


    </table>