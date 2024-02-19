<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        require_once(__DIR__ . "/connexion_bdd.php");
        require_once(__DIR__ . "/headerTrtmt.php");
        $id = $_GET['id'];

       

        // Preparation de la requete
        $reqSlct = $bdd -> prepare("SELECT * FROM produits WHERE id = :id");

        // Execution de la requete
        $reqSlct -> execute([
            'id' => $id
        ]);
        $produit = $reqSlct -> fetch();

        //print_r($user);
        
    ?>

    <div class="container">
        <form action="" method="POST">
            <style>
                .group{
                    margin-bottom: 5px;
                }
            </style>
            
            <h1>Mise à jour du produit</h1>

            <div class="group">
                    <label for="nom_prod">NOM PRODUIT</label>
                    <input type="text" name="nom_prod" id="nom_prod" class="formInput" value="<?php echo $produit['nom_prod']; ?>">
                </div>

                <div class="group">
                    <label for="type_prod">TYPE PRODUIT</label>
                    <input type="text" name="type_prod" id="type_prod" class="formInput" value="<?php echo $produit['type_prod']; ?>">
                </div>

                <div class="group">
                    <label for="quantite_dispo">QUANTITE DISPO</label>
                    <input type="number" name="quantite_dispo" id="quantite_dispo" class="formInput" value="<?php echo $produit['quantite_dispo']; ?>">
                </div>


                <div class="group">
                    <label for="prix_unit">PRIX UNITAIRE</label>
                    <input type="number" name="prix_unit" id="prix_unit" class="formInput" value="<?php echo $produit['prix_unit']; ?>">
                </div>

                <div class="group">
                    <label for="nom_fabriquant">NOM FABRIQUANT</label>
                    <input type="text" name="nom_fabriquant" id="nom_fabriquant" class="formInput" value="<?php echo $produit['nom_fabriquant']; ?>">
                </div>

                <div class="group">
                    <label for="date_exp">DATE EXPIRATION</label>
                    <input type="date" name="date_exp" id="date_exp" class="formInput" value="<?php echo $produit['date_exp']; ?>">
                </div>

                    <input type="submit" name="enregistrer" id="enregistrer" class="button" value="Enregistrer">       
        </form>
    </div>

    <?php
        if(
            
            isset($_POST['enregistrer'])  
        ){
            $nom_prod = $_POST['nom_prod'];
            $type_prod = $_POST['type_prod'];
            $quantite_dispo = $_POST['quantite_dispo'];
            $prix_unit = $_POST['prix_unit'];
            $nom_fabriquant = $_POST['nom_fabriquant'];
            $date_exp = $_POST['date_exp'];

            // Preparation de la requete
            $reqUpd = $bdd -> prepare("UPDATE produits SET nom_prod = :nom_prod, type_prod = :type_prod, quantite_dispo = :quantite_dispo, prix_unit = :prix_unit, nom_fabriquant = :nom_fabriquant, date_exp = :date_exp WHERE id = :id");

            // Execution de la requete
            $reqUpd -> execute(
                array(
                    'nom_prod' => $nom_prod,
                    'type_prod' => $type_prod,
                    'quantite_dispo' => $quantite_dispo,
                    'prix_unit' => $prix_unit,
                    'nom_fabriquant' => $nom_fabriquant,
                    'date_exp' => $date_exp,
                    'id' => $id
                
                )
            );
            header('location: ../produits.php');

        }
    ?> <br><br><br><br>


    <?php
        require_once("../footer.php");
    ?>
</body>
</html>