<?php require('../database.php') ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 1</title>
</head>
<body>
    <?php
        $request = $conn->prepare("SELECT * FROM model ORDER BY marque");
        $request->execute();
        $rows = $request->fetchAll(PDO::FETCH_ASSOC);

        if($request->rowCount()!=0){
            echo('<table border="1">');
            echo("
                <tr>
                    <th>Modele</th>
                    <th>Marque</th>
                    <th>Puissance</th>
                    <th>Carburant</th>
                </tr>
            ");

            foreach ($rows as $key => $value) {
                echo("<tr>");
                echo("<td>".$value['modele']."</td>");
                echo("<td>".$value['marque']."</td>");
                echo("<td>".$value['puissance']."</td>");
                echo("<td>".$value['carburant']."</td>");
                echo("</tr>");
            }
            echo("</table>");
        }
        else{
            echo("Aucune donnée disponible");
        }
    ?>
</body>
</html>