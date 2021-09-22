<?php

//vérifier si le formulaire est soumis
if(isset($_POST['submit'])) {
    $choisir=$_POST['choisir'];
    
    
    $date=$_POST['date'];
    $date2=$_POST['date2'];
    $name2=$_POST['name2'];

echo '<h3>Informations récupérées en utilisant POST</h3>';
echo 'Choisir : ' . $choisir .  'Date : ' . $date . 'Date2 : ' . $date2 . 'Name2 : ' . $name2;

}

?>
