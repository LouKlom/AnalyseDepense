<?php

include("bdd.php");

if(isset($_POST["Valider"])) 
{
    $date = $_POST["date"];
    $type = $_POST["type"];
    $prix = $_POST["price"];
    $description = $_POST["description"];

    $req = "INSERT INTO Depense (date, prix, description, type_id) VALUES ('$date', $prix, '$description', $type)";
    $ex = $link->prepare($req);
    $ex->execute();


    header('Location: '.$_SERVER['HTTP_REFERER'].'');

}



?>