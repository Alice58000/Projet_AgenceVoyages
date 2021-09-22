<?php 
require_once("connexionbd.php");

$sql="SELECT * FROM voyages";
$query = $db ->prepare($sql);   //requete préparée
$query->execute();
$result = $query->fetchAll(PDO :: FETCH_ASSOC); //tableau associatif

// VAR_DUMP($result);

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

<header class="header">
            <div class="titre">
                <p>ALICE VOYAGES</p>
            </div>
            <button class="admin"> <a href="connexionadmin.php"> Admin</a> </button>



            <div class="croisiere">
                
            <button class="croisiere2"> <a href="croisiere.php">Croisières </a> </button>
            <button class="croisiere2"> <a href="hotel.php"> Hôtels </a> </button>
            <button class="croisiere2"> <a href="visitesguidees.php"> Visites guidées</a> </button>
            </div>


            <div class="formulaire">
        
             
                <form action="recherche.php" method="POST">
               
                    
                    <label for="name">Destination </label>
                 
                        <select class="select" name="choisir"  >
                        <option value="choix">Choisir une option </option> 
                        <option value="choix1"> Croisières </option>
                        <option value="choix2">Hôtels</option> 
                        <option value="choix3">Visites guidées</option> 
                         

                        </select>

                    <label for="date">Date de début </label>
                    <input type="date" name="date" value="08-09-2021" min="01-09-2021" max="01-09-2022">    

                    <label for="date">Date de fin </label>
                    <input type="date" name="date2" value="08-09-2021" min="01-09-2021" max="01-09-2022">  
                    
                    <label for="nombres">Nombres de personnes </label>

                    <select class="select" name="name2"  >
                        <option value="">Choisir une option </option> 
                        <option value="nombres">1</option>
                        <option value="nombres">2</option> 
                        <option value="nombres">3</option> 
                        <option value="nombres">4</option> 
                        <option value="nombres">5</option> 
                        <option value="nombres">6</option> 
                        <option value="nombres">7</option> 
                        <option value="nombres">8</option> 
                        <option value="nombres">9</option> 
                        <option value="nombres">10</option> 

                        </select>

                        <input class="boutonrechercher" type="submit" value="Rechercher">

                    <br>
                </form>
            </div> 
          



        <div class="offresmoment">
            <p>Les offres du moment </p>
        </div>


        <!-- carrousel -->
        <!-- Slideshow container -->
        <div class="slideshow-container fade">

        <!-- Full images with numbers and message Info -->
        <div class="Containers">
        <div class="MessageInfo"></div>
        <img src="beach.jpg" style="width:100%">
        <div class="Info"></div>
        </div>

        <div class="Containers">
        <div class="MessageInfo"></div>
        <img src="summer.jpg" style="width:100%">
        <div class="Info"></div>
        </div>

        <div class="Containers">
        <div class="MessageInfo"></div>
        <img src="summer3.jpg" style="width:100%">
        <div class="Info"></div>
        </div>

        <!-- Back and forward buttons -->
        <a class="Back" onclick="plusSlides(-1)">&#10094;</a>
        <a class="forward" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The circles/dots -->
        <div style="text-align:center">
        <span class="dots" onclick="currentSlide(1)"></span>
        <span class="dots" onclick="currentSlide(2)"></span>
        <span class="dots" onclick="currentSlide(3)"></span>
        </div> 

        <!-- fin carrousel -->



        <div class="touteslescartes">

<?php

    foreach($result as $projet) {
?>
        
        
    <div class="carte"> 
        <div class="container-img"> 
             
        <?= "<img src='upload/" . $projet['photo'] . "' />" ?>
                <div class="infos-hover">
                    <i class="fa fa-eye"></i>
                    <p class="nom"><?php echo $projet['nom'] ?></p>
                        <p class="description"><?php echo $projet['description'] ?></p>
                        <p class="prix"> <?php echo $projet['prix'] ?></p>
                        <p class="nbpersonnes"> <?php echo $projet['nbpersonnes'] ?></p>
    </div>
        </div>
                </div>

                
<?php
            }

?>
        </div>

</header>

<footer>
    <div class="footer2">
      <a href="https://www.linkedin.com/in/alice-finot/" target="_blank"><img class="footer" src="linkedin2.png" alt="logo" ></a>
      <p> ©Alice Finot </p>
      <a href="https://github.com/Alice58000" target="_blank"><img class="footer" src="github44.png" alt="git" ></a>
     
    </div>

</footer>

    <script src="main.js"></script>

</body>
</html>