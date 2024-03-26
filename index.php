<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<form method="post" class="container">
    
  <div class="form-group">
    <label for="exampleInputEmail1">Nom</label>
    <input type="text" name="nom" class="form-control" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Prénom</label>
    <input type="text" name="prenom" class="form-control" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" placeholder="Enter email">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Login</label>
    <input type="text" name="login" class="form-control" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="mdp" class="form-control" placeholder="Password">
  </div>
  <div class="form-check">
    <input type="radio" name="sexe" class="form-check-input" value="femme" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Femme</label>
  </div>
  <div class="form-check">
    <input type="radio" name="sexe" class="form-check-input" value="homme" id="exampleCheck">
    <label class="form-check-label" for="exampleCheck">Homme</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php

spl_autoload_register(function($entite){
    require_once "classes/". $entite . '.php';
});

if( isset($_POST['login']) ){
    

}
    $post = 
    [
        "mdp" => "password",
        "login" => "ilci",
        "id"    => 15
    ];
    $u = new User($post);

    var_dump($u);
new Agence(
    [
    "nom" => "Agence de Paris", 
    "ville" => "Paris"
]);