<?php
session_start(); 
if (!empty($_SESSION)) {
    header('location: ./index.php');
    exit;
}
require('./assets/header.php');  ?>


<div class="container">

    <!-- Recuperation de l'erreur dans l'url pour afficher un message d'erreur ! pas oublier de verifier si il existe -->
    <?php if (isset($_GET['error']) && $_GET["error"] == "pasrempli") { ?>
        <div class="mt-4 alert alert-danger alert-dismissible fade show text-center" role="alert">
            Champs vide
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>



    <h1>Inscription</h1>

    <form method="post" action="./model/b.php">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="prenom" id="prenom" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>

</div>


<a href="connexion.php">Si vous avez deja un compte</a>
<?php require('./assets/footer.php');  ?>