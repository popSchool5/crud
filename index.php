<?php
session_start();
$page = "index";
if (empty($_SESSION)) {
    header('location: ./connexion.php');
    exit;
}
require('./assets/co_bdd.php'); 
$req = "SELECT articles.*, utilisateur.id as uid, utilisateur.nom FROM articles INNER JOIN utilisateur ON articles.id_utilisateur = utilisateur.id"; 
$statement = $bdd -> query($req); 
$articles = $statement -> fetchAll(); 

require('./assets/header.php');
?>




<?php require('./assets/footer.php');  ?>