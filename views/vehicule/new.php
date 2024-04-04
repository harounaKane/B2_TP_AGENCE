
    <h2 class="text-center">Ajouter un véhicule</h2>
        <form method="post" class="row">
            <input type="hidden" name="token" value="<?= $token; ?>">
            
            <div class="form-group col-4">
                <label for="exampleInputEmail1">Image</label>
                <input type="text" value="logo" name="img" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="exampleInputEmail1">Marque</label>
                <input type="text" name="marque" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="exampleInputEmail1">Modeèle</label>
                <input type="text" name="modele" class="form-control">
            </div>
            
            <div class="form-group col-4">
                <label for="exampleInputEmail1">Prix</label>
                <input type="number" name="prix_journalier" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="exampleInputEmail1">Poids</label>
                <input type="number" name="poids" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="exampleInputEmail1">Capacité</label>
                <input type="number" name="capacite" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="exampleInputEmail1">Longueur</label>
                <input type="number" name="longueur" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="exampleInputEmail1">Nombre porte</label>
                <input type="number" name="nombre_porte" class="form-control">
            </div>
            
            <div class="form-group col-4">
                <label for="exampleInputEmail1">Cylindre</label>
                <input type="number" name="cylindre" class="form-control">
            </div>

            <div class="col-3">
                <label for="">Etat</label>
                <div class="form-check">
                    <input type="radio" name="etat" value="neuf" class="form-check-input" id="neuf">
                    <label class="form-check-label" for="neuf">Neuf</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="etat" value="occas" class="form-check-input" id="occas">
                    <label class="form-check-label" for="occas">Occas</label>
                </div>
            </div>
            <div class="col-2">
                
                <label for="">Type</label>
                <div class="form-check">
                    <input type="radio" name="type" value="camion" class="form-check-input" id="camion">
                    <label class="form-check-label" for="camion">Camion</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="type" value="voiture" class="form-check-input" id="voiture">
                    <label class="form-check-label" for="voiture">Voiture</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="type" value="moto" class="form-check-input" id="moto">
                    <label class="form-check-label" for="moto">Moto</label>
                </div>
            </div>

            <div class="col-6 form-group">
                <label for="">Agence</label>
                <select name="id_agence" class="col-4 form-control">
                    <?php foreach($agences as $ag): ?>
                        <option value="<?= $ag->getId() ?>"><?= $ag->getNom() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary col-2 m-3">Submit</button>
        </form>

