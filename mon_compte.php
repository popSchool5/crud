<?php
session_start();
$page = "monCompte";
if (empty($_SESSION)) {
    header('location: ./connexion.php');
    exit;
}
require('./assets/header.php');
require('./assets/co_bdd.php');
require('./function.php');

$articles = getArticles($bdd, $_SESSION['id']);

if (isset($_GET['action']) && $_GET['action'] == "supp") {
    deleteArticle($bdd, $_GET['id']);
}

?>




<div class="container">
    <div class="row">

        <?php if (isset($_GET['success']) && $_GET["success"] == "ajout") { ?>
            <div class="mt-4 alert alert-success alert-dismissible fade show text-center" role="alert">
                Article ajouter
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ajouter article
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout article</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="./model/post.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Titre</label>
                                <input type="text" name="titre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <textarea name="contenu" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Contenu</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="">
        <h2 class="text-center m-3">Mes articles</h2>
        <style>
            .mesArticles {
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                flex-wrap: wrap;
            }
        </style>
        <div class="mesArticles">

            <?php foreach ($articles as $article) : ?>

                <div class="card" style="width: 25rem;">
                    <img src="./assets/uploads/<?= htmlspecialchars($article['image']) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($article['titre']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($article['contenu']) ?>.</p>
                        <a href="mon_compte.php?id=<?= htmlspecialchars($article["id"]) ?>&action=supp" class="btn btn-danger">Supprimer</a>
                        <a href="./model/modifArticle.php?id=<?= htmlspecialchars($article["id"]) ?>&action=modif" class="btn btn-warning">Modifier</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>



<?php require('./assets/footer.php');  ?>