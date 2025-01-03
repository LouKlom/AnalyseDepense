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

        <?php 
        include("Components/menu.php");
        include("functions/bdd.php"); 
        ?>

        <div class="maincontenttitle">Paramétrage</div>
        <div class="maincontent">
            <form method="POST" action="?">
                <p>
                    Choix de la période: 
                    <input type="date" name="dateDebut"> 
                    <input type="date" name="dateFin">
                    <input type="submit" name="Valider" value="Valider">
                </p>
            </form>
             
        </div>

        <div class="maincontenttitle">Dépenses enregistrées</div>
        <div class="maincontent">
            
                    <?php
                        include("functions/bdd.php");

                        if(isset($_POST["Valider"]))
                        {
                            ?>
                            <table>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Prix</th>
                                <th>Date</th>
                                <th>Description</th>
                            </tr>
                            <?php
                            $dateDebut = $_POST["dateDebut"];
                            $dateFin = $_POST["dateFin"];
                        


                            $req = "SELECT d.id, d.date, d.prix, d.description, t.libelle 
                            FROM Depense d 
                            INNER JOIN Type t ON d.type_id = t.id
                            WHERE d.date BETWEEN '$dateDebut' AND '$dateFin'
                            ORDER BY d.id";
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
            <?php
                        }
            ?>
        </div>




    </div>    
</body>
</html>