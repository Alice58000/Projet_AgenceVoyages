<?php
    require_once('connexionbd.php');
    if ($_POST) {
        if(isset($_POST["nom"]) && !empty($_POST["nom"])
        && isset($_POST["description"]) && !empty($_POST["description"])
        && isset($_POST["prix"]) && !empty($_POST["prix"])
        && isset($_POST["nbpersonnes"]) && !empty($_POST["nbpersonnes"])
        && isset($_POST["image"]) && !empty($_POST["image"])) {
            // $nom= strip_tags($_POST["nom"]);
            // $description= strip_tags($_POST["description"]);
            // $prix= strip_tags($_POST["prix"]);
            // $nbpersonnes= strip_tags($_POST["nbpersonnes"]);
            // $image= strip_tags($_POST["image"]);
             $nom = addslashes(htmlspecialchars($_POST['nom']));
             $description = addslashes(htmlspecialchars($_POST['description']));
             $prix = addslashes(htmlspecialchars($_POST['prix']));
             $nbpersonnes = addslashes(htmlspecialchars($_POST['nbpersonnes']));
             $image = addslashes(htmlspecialchars($_POST['image']));

            echo $nom;

            $sql = "INSERT INTO voyages (nom, description, prix, nbpersonnes, image) VALUES (:nom,  :description, :prix, :nbpersonnes, :image)";
            $query = $db->prepare($sql);
            $query->bindValue(':nom' , $nom);
            $query->bindValue(':description' , $description);
            $query->bindValue(':prix' , $prix);
            $query->bindValue(':nbpersonnes' , $nbpersonnes);
            $query->bindValue(':image' , $image);

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


            <input type="submit" value="Ajouter">
    </form>




    <a href="supprimer.php?id=<?php echo $projet['id'] ?>">Supprimer</a>
    <a href="modifier.php?id=<?php echo $projet['id'] ?>">Modifier</a>






            <!-- <br>
            <form action="bd.php" method="POST" enctype="multipart/form-data"> 

             a mettre pour upload images 

                <input  type="text" name="nom" placeholder="Titre de l'annonce" required>
                <br> <br>


                <input  type="text" name="description" placeholder="Description de l'annonce" required>
                <br> <br>

               
                 <input  type="text" name="prix" placeholder="Prix" required>
                <br> <br>

                
                <input  type="text" name="nbpersonnes" placeholder="Nombres de personnes" required>
                <br> <br>

               

                <input  type="file" name="photo"  >
                <br> <br>

                </select>

               <button class="admin"> <a href="index.php"> Retour</a> </button>
                
               <input class="admin" type="submit" value="Ajouter">
                
                <br> <br>

            </form> -->

          </div>
</section>


























</body>
</html>