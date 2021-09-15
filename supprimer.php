<?php

if(isset($_GET ["id"]) && !empty($_GET ["id"])) {
    require_once("connexionbd.php");

    $id = strip_tags ($_GET["id"]);
    var_dump($id);

    $sql = "SELECT id FROM voyages  WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();

    $sql = "DELETE FROM voyages WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();

header("Location: index.php");

}