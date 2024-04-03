
<h2 class="text-center">Ajouter / modifier</h2>
        <form method="post">
            <input type="hidden" name="token" value="<?= $token; ?>">
            <input type="hidden" name="id" value="<?=  $user->getId() ?? '' ?>">

            <div class="form-group">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" name="nom" class="form-control" value="<?= $user->getNom() ?? '' ?>">
                <?php  if(isset($_SESSION["errors"]["nom"])): ?>
                <div class="alert alert-danger p-1 mt-1">Minimum 2 caractères maxi 20</div>
                <?php  endif; ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Prénom</label>
                <input type="text" name="prenom" class="form-control"  value="<?= $user->getPrenom() ?? '' ?>">
                <?php  if(isset($_SESSION["errors"]["prenom"])): ?>
                <div class="alert alert-danger p-1 mt-1">Minimum 2 caractères maxi 20</div>
                <?php  endif; ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email"  value="<?= $user->getEmail() ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Login</label>
                <input type="text" name="login" class="form-control"  value="<?= $user->getLogin() ?? '' ?>">
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

            <label for="">Sexe : </label>
            <div class="form-check form-check-inline">
                <input type="radio" name="sexe" class="form-check-input" value="femme" <?= isset($user) && $user->getSexe() == 'femme' ? 'checked' : '' ?> id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Femme</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="sexe" class="form-check-input" value="homme" <?= isset($user) && $user->getSexe() == 'homme' ? 'checked' : '' ?> id="exampleCheck">
                <label class="form-check-label" for="exampleCheck">Homme</label>
            </div>
            <div class="d-block"></div>
            <label for="">Statut : </label>
            <div class="form-check form-check-inline">
                <input type="radio" name="role" class="form-check-input" value="CLIENT" <?= isset($user) && $user->getRole() == 'CLIENT' ? 'checked' : '' ?> id="client">
                <label class="form-check-label" for="client">CLIENT</label>
            </div>
            
            <div class="form-check form-check-inline">
                <input type="radio" name="role" class="form-check-input" value="COMMERCIAL" <?= isset($user) && $user->getRole() == 'COMMERCIAL' ? 'checked' : '' ?> id="comm">
                <label class="form-check-label" for="comm">COMMERCIAL</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="role" class="form-check-input" value="ADMIN" <?= isset($user) && $user->getRole() == 'ADMIN' ? 'checked' : '' ?> id="ad">
                <label class="form-check-label" for="ad">ADMIN</label>
            </div>

            <button type="submit" class="d-block btn btn-primary">Submit</button>
        </form>

