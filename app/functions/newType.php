<?php
include("bdd.php");

if(isset($_POST["libelle"])) {
    $libelle = $_POST['libelle'];

    $req = "INSERT INTO Type (libelle, state) VALUES ('$libelle', 1)";
    $ex=$link->prepare($req);
    $ex->execute();
}




header('Location: '.$_SERVER['HTTP_REFERER'].'');

?>