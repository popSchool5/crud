<?php 
function getArticles($bdd,$id){
    $req = "SELECT articles.*, utilisateur.id as uid, utilisateur.nom FROM articles INNER JOIN utilisateur ON articles.id_utilisateur = utilisateur.id WHERE articles.id_utilisateur = ?";

    $statement = $bdd->prepare($req);
    $statement->execute([$id]);
    $articles = $statement->fetchAll();
    return $articles; 
}

function deleteArticle($bdd,$id)
{
    $req = "DELETE FROM articles WHERE id = ?";
    $statement = $bdd->prepare($req);
    $statement->execute([$id]);
    header('location: mon_compte.php?success=supprimer');

}

function getAllArticles($bdd){
    $req = "SELECT articles.*, utilisateur.id as uid, utilisateur.nom FROM articles INNER JOIN utilisateur ON articles.id_utilisateur = utilisateur.id";
    $statement = $bdd->query($req);
    $articles = $statement->fetchAll();
    return $articles; 

}

function getArticle($bdd,$id){
    $req = "SELECT * FROM articles WHERE id = ?";
    $statement = $bdd->prepare($req);
    $statement->execute([$id]);
    $article = $statement->fetch();
    return $article; 
}

function search($bdd,$s){
    $req = 'SELECT * FROM articles WHERE titre LIKE "%" ? "%"';
    $statement = $bdd->prepare($req);
    $statement->execute([$s]);

    $search = $statement->fetchAll();
    return $search; 
}