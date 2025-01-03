<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/table.css">
    <title>Document</title>
</head>
<body>
    <div class="main">

        <div class="head">
            <p>FINANCES</p>
        </div>

        <?php include("Components/menu.php"); ?>

        <div class="maincontenttitle">Créer un nouveau type</div>
        <div class="maincontent">
        <form method="POST" action="functions/newType.php">
                <p>Libellé: <input type="text" name="libelle"> <input type="submit" name="Valider" value="Valider"> </p>
            </form>
        </div>

        <div class="maincontenttitle">Liste des types Actifs</div>
        <div class="maincontent">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Libelle</th>
                    <th>Actions</th>
                </tr>
                <?php
                include("functions/bdd.php");

                $req = "SELECT * FROM Type WHERE state = 1";
                $ex = $link->prepare($req);
                $ex->execute();

                while($row=$ex->fetch())
                {
                    echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['libelle']."</td>";
                        ?>
                    <td>
                        <form method="POST" action="TypeModif.php">
                            <input type="submit" value="Modifier" name="Modifier">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="libelle" value="<?php echo $row['libelle']; ?>">
                        </form>
                        <form method="POST" action="functions/TypeState.php">
                            <input type="submit" value="Desactiver" name="Desactiver">
                            <input type="hidden" name="task_id" value="<?php echo $row['id']; ?>">
                        </form>
                    </td>
                        <?php
                    echo "</tr>";
                }
                ?>
            </table>
        </div>


        <div class="maincontenttitle">Liste des types Inactifs</div>
        <div class="maincontent">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Libelle</th>
                    <th>Actions</th>
                </tr>
                <?php
                include("functions/bdd.php");

                $req = "SELECT * FROM Type WHERE state = 0";
                $ex = $link->prepare($req);
                $ex->execute();

                while($row=$ex->fetch())
                {
                    echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['libelle']."</td>";
                        ?>
                    <td>
                        <form method="POST" action="TypeModif.php">
                            <input type="submit" value="Modifier" name="Modifier">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="libelle" value="<?php echo $row['libelle']; ?>">
                        </form>
                        <form method="POST" action="functions/TypeState.php">
                            <input type="submit" value="Activer" name="Activer">
                            <input type="hidden" name="task_id" value="<?php echo $row['id']; ?>">
                        </form>
                    </td>
                        <?php
                    echo "</tr>";
                }
                ?>
            </table>





        </div>


    </div>    
</body>
</html>