<?php
session_start();
if (empty($_SESSION)) {
    header('location: ./connexion.php');
    exit;
}
require('./assets/header.php');
require('./assets/co_bdd.php');
require('./function.php');
$article = getArticle($bdd,$_GET['id']); 

?>

<style>
    .articleseul{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="mt-5 container articleseul">
    <div class="card" style="width: 50rem;">
        <img src="./assets/uploads/<?= $article['image'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $article['titre'] ?></h5>
            <p class="card-text"><?= $article['contenu'] ?></p>
          
        </div>
    </div>
</div>


<?php require('./assets/footer.php');  ?>