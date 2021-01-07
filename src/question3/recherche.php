<?php require('../database.php') ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 3</title>
    <style>
        div {
            width: 250px;
            clear: both;
            margin-bottom: 5;
            
        }
        input:not(#buttons) {
            float: right;
        }

        #buttons{
            margin-left: 65;
        }
    </style>
</head>
<body>
    <form action="recherche.php" method="get">
        <div>
            Nom :
            <input type="text" name="nom">
        </div>
        <div>
            Prenom :
            <input type="text" name="prenom">
        </div>
        <div>
            <input id="buttons" type="submit" value="Rechercher">
        </div>
    </form>

    <?php
        if (isset($_GET['nom']) and isset($_GET['prenom'])) {
            $request = $conn->prepare('SELECT couleur, kilometrage, modele, marque, puissance, carburant FROM voiture v, model m, proprietaire p WHERE v.id_modele = m.id AND p.ID_VOITURE = v.id AND p.nom LIKE :secondname AND p.prenom LIKE :firstname');

            $data = array(
                'secondname'=>'%'.$_GET["nom"].'%',
                'firstname'=>'%'.$_GET["prenom"].'%'
            );

            $request->execute($data);
            $rows = $request->fetchAll(PDO::FETCH_ASSOC);

            if($request->rowCount()!=0){
                echo('<table border="1">');
                echo("
                    <tr>
                        <th>Couleur</th>
                        <th>Kilometrage</th>
                        <th>Modele</th>
                        <th>Marque</th>
                        <th>Puissance</th>
                        <th>Carburant</th>
                    </tr>
                ");

                foreach ($rows as $key => $value) {
                    echo("<tr>");
                    echo("<td>".$value['couleur']."</td>");
                    echo("<td>".$value['kilometrage']."</td>");
                    echo("<td>".$value['modele']."</td>");
                    echo("<td>".$value['marque']."</td>");
                    echo("<td>".$value['puissance']."</td>");
                    echo("<td>".$value['carburant']."</td>");
                    echo("</tr>");
                } 
            }
            else{
                echo("Aucune donnée disponible");
            }
        }
    ?>
</body>
</html>