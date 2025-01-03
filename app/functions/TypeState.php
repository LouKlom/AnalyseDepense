<?php 

include("bdd.php");

$id = $_POST['task_id'];

if(isset($_POST["Desactiver"]))
{
    $req = "UPDATE Type SET state = 0 WHERE id = $id";
    $ex = $link->prepare($req);
    $ex->execute();

    header('Location: '.$_SERVER['HTTP_REFERER'].'');
}
if(isset($_POST["Activer"]))
{
    $req = "UPDATE Type SET state = 1 WHERE id = $id";
    $ex = $link->prepare($req);
    $ex->execute();

    header('Location: '.$_SERVER['HTTP_REFERER'].'');
}

?>