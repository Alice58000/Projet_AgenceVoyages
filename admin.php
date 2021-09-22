<?php
    session_start();

    if(!isset($_SESSION['acces']))
    header('Location:index.php');
?>

<?php
    require_once('connexionbd.php');
    if ($_POST) {
        if(isset($_POST["nom"]) && !empty($_POST["nom"])
        && isset($_POST["description"]) && !empty($_POST["description"])
        && isset($_POST["prix"]) && !empty($_POST["prix"])
        && isset($_POST["nbpersonnes"]) && !empty($_POST["nbpersonnes"])
        && isset($_POST["photo"]) && !empty($_POST["photo"])) {
            // $nom= strip_tags($_POST["nom"]);
            // $description= strip_tags($_POST["description"]);
            // $prix= strip_tags($_POST["prix"]);
            // $nbpersonnes= strip_tags($_POST["nbpersonnes"]);
            // $image= strip_tags($_POST["image"]);
             $nom = addslashes(htmlspecialchars($_POST['nom']));
             $description = addslashes(htmlspecialchars($_POST['description']));
             $prix = addslashes(htmlspecialchars($_POST['prix']));
             $nbpersonnes = addslashes(htmlspecialchars($_POST['nbpersonnes']));
             $photo = addslashes(htmlspecialchars($_POST['photo']));

            echo $nom;

            $sql = "INSERT INTO voyages (nom, description, prix, nbpersonnes, photo) VALUES (:nom,  :description, :prix, :nbpersonnes, :photo)";
            $query = $db->prepare($sql);
            $query->bindValue(':nom' , $nom);
            $query->bindValue(':description' , $description);
            $query->bindValue(':prix' , $prix);
            $query->bindValue(':nbpersonnes' , $nbpersonnes);
            $query->bindValue(':photo' , $photo);

            $query->execute();


        }

    }



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Projet Voyages</title>
</head>
    <body>

        <header class="header">
            <div class="titre">
                <p>ALICE VOYAGES</p>
            </div>
                    <button class="admin2"> <a href="index.php"> Retour</a> </button> 
                    <button class="admin2"> <a href="deconnexionadmin.php"> Se déconnecter</a> </button>

    <section>
            
            <div class="formulaire2">

            <form action ="bd.php" method="POST" enctype="multipart/form-data">

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
            <label for= "photo"> Image </label>
            <input type="file" name="photo" >
            </div>


            <input type="submit" value="Ajouter">
    </form>
    </div>
    </section>


<?php

    $sql="SELECT * FROM voyages";
    $query = $db ->prepare($sql);   //requete préparée
    $query->execute();
    $result = $query->fetchAll(PDO :: FETCH_ASSOC); //tableau associatif

    // VAR_DUMP($result);



    foreach($result as $projet) {
?>


        <div class="carte"> 
        <div class="container2-img"> 
     
        <?= "<img src='upload/" . $projet['photo'] . "' />" ?>
       
            <p class="nom"><?php echo $projet['nom'] ?></p>
            <p class="description"><?php echo $projet['description'] ?></p>
            <p class="prix"> <?php echo $projet['prix'] ?></p>
            <p class="nbpersonnes"> <?php echo $projet['nbpersonnes'] ?></p>

</div>
</div>
        
        <div class="supprimer1">
        <a class="supprimer" href="supprimer.php?id=<?php echo $projet['id'] ?>">Supprimer</a>
        <a class="supprimer" href="modifier.php?id=<?php echo $projet['id'] ?>">Modifier</a>
        </div>
<?php
    }

?>

</body>
</html>