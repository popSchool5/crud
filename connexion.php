<?php 
session_start(); 
if(!empty($_SESSION)){
    header('location: ./index.php');
    exit;  
}
require('./assets/header.php'); ?>

<div class="container">

<h1 class="my-3 text-center">Connexion</h1>

    <form method="post" action="./model/connexion.php">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>


<?php require('./assets/footer.php'); ?>