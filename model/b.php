<?php

// isset = voir si sa existe 
// empty = si c'est vide 
// !empty = si c'est pas vide 

// verfier si tout les champs existe et qu'ils sont rempli
if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['email']) && !empty($_POST['email'])) {
    
    require('../assets/co_bdd.php'); 
    // Appeler la connexion a la bdd. 

    // Verifier que l'utilisateur n'existe pas dans la base de donnée ( logique pour une inscription !);
    $req = "SELECT * FROM utilisateur WHERE email = ?"; 
    $statement = $bdd -> prepare($req);
    $statement -> execute([$_POST['email']]); 

    // On lui dit va chercher chien avec fetch la ligne de l'utilisateur.
    $user = $statement -> fetch(); 
    

    // Si l'utilisateur existe pas
    if(!$user){
        
        // On va l'inserer dans la base de donné
        $req = "INSERT INTO utilisateur(nom,prenom,email,password) VALUES (?,?,?,?)"; 
        $statement = $bdd -> prepare($req); 
        $statement -> execute([
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],

            // pas oublier de hasher le mot de passe avec password_hash()
           password_hash($_POST['password'],PASSWORD_DEFAULT)
        ]);

        header('location: ../connexion.php'); 



    }else{
        header('location: ../connexion.php');
    }

} else {
    // renvoyer vers inscription 
    header('location: ../inscription.php?error=pasrempli');
}
