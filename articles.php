<?php
session_start();
$page = "index";
if (empty($_SESSION)) {
    header('location: ./connexion.php');
    exit;
}
require('./assets/co_bdd.php');
require('./function.php'); 
$articles = getAllArticles($bdd); 

require('./assets/header.php');
?>
<style>
    .lesArticles {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        padding-top: 1rem;

    }

    .card {
        margin-top: 1rem;
    }
</style>

<div class="container lesArticles">
    <?php foreach ($articles as $article) : ?>
        <div class="card y-3" style="width: 35rem;">
            <img src="./assets/uploads/<?= $article['image'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($article['titre']) ?></h5>
                <p class="card-text"><?= htmlspecialchars($article['contenu']) ?></p>
                <a href="article.php?id=<?= htmlspecialchars($article['id']) ?>" class="btn btn-primary">Voir l'article</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>




<?php require('./assets/footer.php');  ?>