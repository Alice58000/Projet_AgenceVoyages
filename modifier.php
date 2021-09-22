<?php

if ($_POST) {
    if(isset($_POST["nom"]) && !empty($_POST["nom"])
    && isset($_POST["description"]) && !empty($_POST["description"])
    && isset($_POST["prix"]) && !empty($_POST["prix"])
    && isset($_POST["nbpersonnes"]) && !empty($_POST["nbpersonnes"]) 
    && isset($_POST["image"]) && !empty($_POST["image"])) 
    {
        require_once("connexionbd.php");

        $id = strip_tags ($_GET["id"]);
        $nom= strip_tags($_POST["nom"]);
        $description= strip_tags($_POST["description"]);
        $prix= strip_tags($_POST["prix"]);
        $nbpersonnes= strip_tags($_POST["nbpersonnes"]);
        $image= strip_tags($_POST["image"]);
       
        $sql = "UPDATE voyages SET nom=:nom, description= :description, prix= :prix, nbpersonnes=:nbpersonnes, image=:image WHERE id= :id";
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO:: PARAM_INT);
        $query->bindValue(":nom", $nom, PDO:: PARAM_STR);
        $query->bindValue(":description", $description, PDO:: PARAM_STR);
        $query->bindValue(":prix", $prix, PDO:: PARAM_STR);
        $query->bindValue(":nbpersonnes", $nbpersonnes, PDO:: PARAM_STR);
        $query->bindValue(":image", $image, PDO:: PARAM_STR);

        $query->execute();

        header("Location: admin.php");

    }
    else {
        echo "Remplissez tous les champs";
    }
}
    if(isset($_GET["id"]) && !empty($_GET["id"])) {
    require_once("connexionbd.php");

    $id = strip_tags ($_GET["id"]);
    // var_dump($id);

    $sql = "SELECT * FROM voyages WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    
    $projet = $query->fetch();
    // ont vérifie si le projet existe si il existe pas ont renvoi vers la page index
    if(!$projet) {
        header("Location: admin.php");

    }

} else {
    header("Location: admin.php");

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Projet voyages</title>
</head>
<body>

<section>
            
            <div class="formulaire2">
            <form method="post">
            <div class="form-groupe">
            <label for= "nom"> Nom  </label>
            <input type="text" name="nom" required>
            </div>

           
            <div class="form-groupe">
            <label for= "description"> Description  </label>
            <input type="text" name="description" required>
            </div>

            <div class="form-groupe">
            <label for= "prix"> prix </label>
            <input type="text" name="prix" required>
            </div>

            <div class="form-groupe">
            <label for= "nbpersonnes"> Nombres de personnes </label>
            <input type="text" name="nbpersonnes" required>
            </div>

            <div class="form-groupe">
            <label for= "image"> Image </label>
            <input type="file" name="image" required>
            </div>

            <input type="submit" value="Modifier">
    </form>
    </div>
</section>