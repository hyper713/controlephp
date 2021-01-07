<?php require('../database.php') ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 2</title>
    <style>
        div {
            width: 300px;
            clear: both;
            margin-bottom: 5;
            
        }
        input:not(#buttons) {
            float: right;
        }
    </style>

</head>
<body>
    <form action="New_proprietaire.php" method="post">
        <div>
            Nom :
            <input type="text" name="nom">
        </div>
        <div>
            Prenom :
            <input type="text" name="prenom">
        </div>
        <div>
            Adresse :
            <input type="text" name="adresse">
        </div>
        <div>
            Code Postal :
            <input type="text" name="codepostal">
        </div>
        <div>
            Ville :
            <input type="text" name="ville">
        </div>
        <div>
            Telephone :
            <input type="text" name="telephone">
        </div>
        <div>
            Immatriculation :
            <select name="immatriculation">
                <?php
                    $request = $conn->prepare("SELECT id, immatriculation FROM voiture");
                    $request->execute();
                    $rows = $request->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($rows as $key => $value) {
                        echo('<option value="'.$value['id'].'">'.$value['immatriculation'].'</option>');
                    }
                ?>
            </select>
        </div>
        <input id="buttons" type="submit" value="Ajouter">
        <input id="buttons" type="reset" value="Annuler">
    </form>

    <?php
        if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['adresse']) and isset($_POST['codepostal']) and isset($_POST['ville']) and isset($_POST['telephone']) and isset($_POST['immatriculation'])){
            $request = $conn->prepare("INSERT INTO proprietaire(NOM, PRENOM, ADRESSE, CODE_POSTAL, VILLE, TEL, ID_VOITURE) VALUES (:firstname, :secondname, :address, :zip, :city, :phone, :car)");

            $data = array(
                'firstname'=>$_POST["nom"],
                'secondname'=>$_POST["prenom"],
                'address'=>$_POST["adresse"],
                'zip'=>$_POST["codepostal"],
                'city'=>$_POST["ville"],
                'phone'=>$_POST["telephone"],
                'car'=>$_POST["immatriculation"]
            );

            $request->execute($data);

            if($request->rowCount()!=0){
                echo("La proprietaire est créé");
            }
        }
    ?>
</body>
</html>