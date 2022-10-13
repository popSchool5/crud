<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>


    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    <?php if (empty($_SESSION)) { ?>
                        <li class="nav-item">
                            <a href="inscription.php" class="nav-link">Inscription/Connexion</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if (isset($page) && $page == "index") {
                                                    echo 'active';
                                                } ?>" aria-current="page" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (isset($page) && $page == "articles") {
                                                    echo 'active';
                                                } ?>" href="articles.php">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a href="mon_compte.php" class="nav-link  <?php if (isset($page) && $page == "monCompte") {
                                                                            echo 'active';
                                                                        } ?>"><?= $_SESSION["email"] ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="./model/deconnexion.php" class="nav-link">Déconnexion</a>
                        </li>

                    <?php } ?>
                </ul>
                <form class="d-flex" role="search" action="./search.php" method="get">
                    <input class="form-control me-2" type="search" name="q" placeholder="Votre recherche" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form>
            </div>
        </div>
    </nav>