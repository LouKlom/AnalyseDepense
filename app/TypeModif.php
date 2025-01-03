<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <title>Document</title>
</head>
<body>
    <div class="main">

        <div class="head">
            <p>FINANCES</p>
        </div>

        <?php include("Components/menu.php"); ?>

        <div class="maincontenttitle">Modifier le libellé</div>
        <div class="maincontent">

        <p>Libellé actuel: <?php echo $_POST["libelle"]; ?></p>

        <form method="POST" action="functions/modifType.php">
                <p>Nouveau nom: <input type="text" name="libelle"> 
                <input type="submit" name="Valider" value="Valider"> 
                <input type="submit" name="Annuler" value="Annuler">
                <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                </p>
            </form>
        </div>




    </div>    
</body>
</html>