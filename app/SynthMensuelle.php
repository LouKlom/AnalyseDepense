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

        <div class="maincontenttitle">Paramétrage</div>
        <div class="maincontent">
            <p>

            </p>

        </div>
        <?php
                    include("functions/bdd.php");

                    $req = "SELECT d.id, d.date, d.prix, d.description, t.libelle 
                    FROM Depense d 
                    INNER JOIN Type t ON d.type_id = t.id
                    WHERE MONTH(d.date) = MONTH(CURDATE())
                    ORDER BY d.date";
                    $ex = $link->prepare($req);
                    $ex->execute();

                    $totalLignesDepenses = $ex->rowCount();
                    $totalCout = 0;
        ?>

        <div class="maincontenttitle">Synthèse</div>
        <div class="maincontent">
            <?php
                while($row=$ex->fetch())
                {
                    $totalCout = $totalCout + $row["prix"];
                }
            ?>

            <table>
                    <tr>
                        <th>Nb de lignes</th>
                        <th>Coût Total</th>
                    </tr>
                    <tr>
                        <td><?php echo $totalLignesDepenses; ?></td>
                        <td><?php echo $totalCout;?></td>
                    </tr>
            </table>
        </div>


        <div class="maincontenttitle">Détail des dépenses</div>
        
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
                        $req = "SELECT d.id, d.date, d.prix, d.description, t.libelle 
                        FROM Depense d 
                        INNER JOIN Type t ON d.type_id = t.id
                        WHERE MONTH(d.date) = MONTH(CURDATE())
                        ORDER BY d.date";
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