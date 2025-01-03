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

        <?php include("functions/bdd.php"); ?>
        <div class="maincontenttitle">Nouvelle Dépense</div>
        <div class="maincontent">
            <form method="POST" action="functions/newDepense.php">
                <p>
                    Type: <select name="type">
                        <?php
                            $req = "SELECT * FROM Type WHERE state = 1 ORDER BY libelle";
                            $ex = $link->prepare($req);
                            $ex->execute();

                            while($row=$ex->fetch())
                            {
                                echo "<option value=".$row["id"].">".$row["libelle"]."</option>";
                            }
                        ?>
                    </select>
                    Date: <input type="date" name="date">
                    Prix: <input type="number" name="price" size="8">
                    Description: <input type="text" size="80" name="description">
                    <input type="submit" name="Valider" value="Valider">
            </p>
                
            </form>
        </div>

        <div class="maincontenttitle">Dernieres dépenses enregistrées [10]</div>
        <div class="maincontent">
            <table>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Prix</th>
                        <th>Date</th>
                        <th>Description</th>
                    </tr>
                    <?php
                        include("functions/bdd.php");

                        $req = "SELECT d.id, d.date, d.prix, d.description, t.libelle 
                        FROM Depense d 
                        INNER JOIN Type t ON d.type_id = t.id
                        ORDER BY d.id DESC
                        LIMIT 10";
                        $ex = $link->prepare($req);
                        $ex->execute();

                        while($row=$ex->fetch())
                        {
                    ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["libelle"]; ?></td>
                                <td><?php echo $row["prix"]; ?></td>
                                <td><?php echo $row["date"]; ?></td>
                                <td><?php echo $row["description"] ?></td>
                            </tr>
                    <?php 
                        }
                    ?>
            </table>
        </div>




    </div>    
</body>
</html>