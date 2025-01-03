<?php

include("bdd.php");


if(isset($_POST["Valider"])) 
{
    $libelle = $_POST['libelle'];
    $id = $_POST['id'];

    $req = "UPDATE Type SET libelle = '$libelle' WHERE id = $id";
    $ex = $link->prepare($req);
    $ex->execute(); 

    header("Location: ../GestionType.php");
}




?>