<?php 
session_start(); 
// require('../assets/co_bdd.php'); 
if (array_key_exists('image', $_FILES)) {
    // Si il n'ya pas d'erreur 
    if ($_FILES['image']['error'] == 0) {
        // ICI
        if (in_array(mime_content_type($_FILES['image']['tmp_name']), ['image/png', 'image/jpeg'])) {
            // Si la taille de l'image n'est pas sup a 3M
            if ($_FILES['image']['size'] <= 3000000) {
                require('../assets/co_bdd.php');
                // Genere un nom d'image qu'on stock dans $imageFileName
                $imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

                // Envoi du fichier dans le dossier : uploads/
                move_uploaded_file($_FILES['image']['tmp_name'], '../assets/uploads/' . $imageFileName);

                $req = "UPDATE articles SET titre= ?,contenu = ?,image = ? WHERE id = ?"; 

                    $statement = $bdd -> prepare($req); 
                    $statement -> execute([
                        $_POST['titre'], 
                        $_POST['contenu'],
                        $imageFileName,
                        $_POST['id']
                    ]);

                header('location: ../mon_compte.php?success=modifier');
            } else {
                echo 'Le fichier est trop volumineux…';
            }
        } else {
            echo 'Le type mime du fichier est incorrect…';
        }
    } else {
        echo 'Le fichier n\'a pas pu être récupéré…';
    }
}