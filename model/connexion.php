<?php
session_start();
// verifier que les champs existe et son rempli 
if (isset($_POST["password"], $_POST['email']) && !empty($_POST["password"]) && !empty($_POST['email'])) {

    // appeler la bdd 
    require('../assets/co_bdd.php');

    // verifier que l'utilisateur existe 
    $req = "SELECT * FROM utilisateur WHERE email = ?";
    $statement = $bdd->prepare($req);
    $statement->execute([$_POST['email']]);

    $user = $statement->fetch();
    var_dump($user);

    // si il existe verifier son mot de passe
    if ($user) {
        if (password_verify($_POST['password'], $user['password'])) {
            // si c'est bon lui creer des variable de session et ne pas oublier d'ouvrir la session en debut de page pour avoir accées au tableau $_SESSION. 
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            header('location: ../index.php?success=co');
        }else{
            header("location: ../connexion.php"); 
        }
    } else {
        header("location: ../connexion.php");
    }
} else {
    header("location: ../connexion.php");
}
