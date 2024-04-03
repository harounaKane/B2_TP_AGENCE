<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

    <header class="bg-light p-4">
        <nav>
            <a href=".">Home</a>
            
            <?php if(isset($_SESSION["user"])): ?>
                <a href="?actionAdmin=liste">Users</a>
                <a href="?actionAgence=agence">Agence</a>
                <a href="?actionUser=deconnexion">Déconnexion</a>
                
            <?php else: ?>
                <a href="?actionUser=inscription">Inscription</a>
                <a href="?actionUser=connexion">Connexion</a>
            <?php endif; ?>

        </nav>

        <?php if(isset($_SESSION["user"])): ?>
            <div class="text-end">
                <?= unserialize($_SESSION["user"])->getPrenom(); ?> 
            </div>
        <?php endif; ?>
    </header>

    <main class="container-fluid">
        <?= $content; ?>        
    </main>

    <footer class="text-center text-dark bg-light p-4 mt-5">
        Gestion agence
    </footer>
    <?php unset($_SESSION["errors"]) ?>
</body>

</html>