<?php
session_start();
$page = "index";
if (empty($_SESSION)) {
    header('location: ./connexion.php');
    exit;
}
require('./assets/co_bdd.php'); 
require('./assets/header.php');
?>




<?php require('./assets/footer.php');  ?>