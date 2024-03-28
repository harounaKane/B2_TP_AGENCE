
        <h2 class="text-center">Connexion</h2>
        <form method="post">
            <input type="hidden" name="token" value="<?= $token ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Login</label>
                <input type="text" name="login" class="form-control" value="ilci">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="mdp" class="form-control" value="ilci">
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

