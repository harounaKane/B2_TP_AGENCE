
    <h2 class="text-center">Inscription</h2>
        <form method="post">
            <input type="hidden" name="token" value="<?= $token; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" name="nom" class="form-control" value="<?= $_POST['nom'] ?? '' ?>">
                <?php  if(isset($_SESSION["errors"]["nom"])): ?>
                <div class="alert alert-danger p-1 mt-1">Minimum 2 caractères maxi 20</div>
                <?php  endif; ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Prénom</label>
                <input type="text" name="prenom" class="form-control"  value="<?= $_POST['prenom'] ?? '' ?>">
                <?php  if(isset($_SESSION["errors"]["prenom"])): ?>
                <div class="alert alert-danger p-1 mt-1">Minimum 2 caractères maxi 20</div>
                <?php  endif; ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email"  value="<?= $_POST['email'] ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Login</label>
                <input type="text" name="login" class="form-control"  value="<?= $_POST['login'] ?? '' ?>">
                <?php  if(isset($_SESSION["errors"]["login"])): ?>
                <div class="alert alert-danger p-1 mt-1">Minimum 4 caractères maxi 6</div>
                <?php  endif; ?>
                <?php  if(isset($_SESSION["errors"]["loginSpace"])): ?>
                <div class="alert alert-danger p-1 mt-1"><?= $_SESSION["errors"]["loginSpace"]; ?></div>
                <?php  endif; ?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="mdp" class="form-control" placeholder="Password">
                <?php  if(isset($_SESSION["errors"]["mdpSpace"])): ?>
                <div class="alert alert-danger p-1 mt-1"><?= $_SESSION["errors"]["mdpSpace"]; ?></div>
                <?php  endif; ?>
            </div>
            <div class="form-check">
                <input type="radio" name="sexe" class="form-check-input" value="femme" <?= isset($_POST['sexe']) && $_POST['sexe'] == 'femme' ? 'checked' : '' ?> id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Femme</label>
            </div>
            <div class="form-check">
                <input type="radio" name="sexe" class="form-check-input" value="homme" <?= isset($_POST['sexe']) && $_POST['sexe'] == 'homme' ? 'checked' : '' ?> id="exampleCheck">
                <label class="form-check-label" for="exampleCheck">Homme</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

