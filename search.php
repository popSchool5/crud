<?php
session_start();
$page = "index";
if (empty($_SESSION)) {
    header('location: ./connexion.php');
    exit;
}
require('./assets/co_bdd.php');
require('./function.php'); 
$search = search($bdd,$_GET["q"]); 


require('./assets/header.php');
?>

<div class="container">
    <?php if($search){
        foreach($search as $s){
        ?>
    <div class="card" style="width: 18rem;">
        <img src="./assets/uploads/<?= $s['image'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $s['titre'] ?></h5>
     
            <a href="./article.php?id=<?= $s['id'] ?>" class="btn btn-primary">Voir l'article</a>
        </div>
    </div>

    <?php   }
}else{ ?>
            <h3>Aucune article corespeond au reponcurfh</h3>
    <?php } ?>
</div>


<?php require('./assets/footer.php');  ?>