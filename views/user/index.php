
    <h2 class="text-center">Liste users</h2>

    <table class="table table-striped">
        <tr class="table-dark">
            <td>Prenom</td>
            <td>Nom</td>
            <td>Action</td>
        </tr>

        <?php foreach($users as $user): ?>
            <tr>
                <td> <?= $user->getPrenom(); ?> </td>
                <td> <?= $user->getNom(); ?> </td>
                <td>
                    <a href="">U</a>
                    <form action="" method="post" class="d-inline">
                        <input type="hidden" name="id" value="<?= $user->getId(); ?>">
                        <input type="hidden" name="token" value="<?= $token; ?>">
                        <input type="submit" value="X">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>