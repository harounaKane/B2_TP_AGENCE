
    <h2 class="text-center">Liste agence</h2>

    <table class="table table-striped">
        <tr class="table-dark">
            <td>Nom</td>
            <td>Adresse</td>
            <td>Action</td>
        </tr>

        <?php foreach($agences as $agence): ?>
            <tr>
                <td> <?= $agence->getNom(); ?> </td>
                <td> <?= $agence->getAdresse().", ".$agence->getVille(); ?> </td>
                <td>
                    <a href="?actionAdmin=update&id=<?= $agence->getId(); ?>">U</a>
                    <form action="" method="post" class="d-inline">
                        <input type="hidden" name="id" value="<?= $agence->getId(); ?>">
                        <input type="hidden" name="token" value="<?= $token; ?>">
                        <input type="submit" value="X">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>