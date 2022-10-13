<?php
session_start();

if (empty($_SESSION)) {
    header('location: ../connexion.php');
    exit;
}
require('../assets/co_bdd.php');
require('../assets/header.php');
if (isset($_GET['id']) && $_GET['action'] == "modif") {
    require('../assets/co_bdd.php');
    $req = "SELECT * FROM articles WHERE id = ?";
    $statement = $bdd->prepare($req);
    $statement->execute([$_GET['id']]);
    $article = $statement->fetch();
    var_dump($article);
}

?>

<form method="post" action="./modifA.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $article['id'] ?>">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Titre</label>
        <input type="text" name="titre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $article['titre'] ?>">
    </div>
    <div class="mb-3">
        <div class="form-floating">
            <textarea name="contenu" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?= $article['contenu'] ?></textarea>
            <label for="floatingTextarea2">Contenu</label>
        </div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<?php require('../assets/footer.php');  ?>