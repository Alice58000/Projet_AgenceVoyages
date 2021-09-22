<?php

session_start();
require_once("connexionbd.php");

  if(!isset($_SESSION['id']))
  header('Location:admin.php');


  var_dump($_POST);

  //upload d'images et images par défaut 
  if(isset($_FILES['photo'])) 
  {
    $tmpName = $_FILES['photo']['tmp_name'];
    $name = $_FILES['photo']['name'];

    if(empty($_FILES['photo']['name']))
    {
      $nom = $_POST['nom']; 
      $description = $_POST['description']; 
      $prix = $_POST['prix'];
      $nbpersonnes = $_POST['nbpersonnes'];
  
      // afficher le résultat
      $db->exec("INSERT INTO voyages (nom, description, prix, nbpersonnes, photo) VALUES('$nom','$description', '$prix', '$nbpersonnes', 'zizicoptere.jpg')");
      echo '<h3>Données transmises à la base de données </h3>';
      header ('Location: admin.php');
    }
    else
    {
    // if (empty($name)) 
    // {
    //  $name= "image5.jpg";
    // }
   
      move_uploaded_file($tmpName, './upload/'.$name);
  

     // Vérifier si le formulaire est soumis 

     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */

      $nom = $_POST['nom']; 
      $description = $_POST['description']; 
      $prix = $_POST['prix'];
      $nbpersonnes = $_POST['nbpersonnes'];
  
      // afficher le résultat
      $db->exec("INSERT INTO voyages (nom, description, prix, nbpersonnes, photo) VALUES('$nom','$description', '$prix', '$nbpersonnes', '$name')");
      echo '<h3>Données transmises à la base de données </h3>';
      header ('Location: admin.php');
    }
  }
 
 ?>
     