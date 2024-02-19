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
        $reqSlct = $bdd -> prepare("SELECT * FROM ventes WHERE id = :id");

        // Execution de la requete
        $reqSlct -> execute([
            'id' => $id
        ]);
        $vente = $reqSlct -> fetch();

        //print_r($user);
        
    ?>

    <div class="container">
        <form action="" method="POST">
            <style>
                .group{
                    margin-bottom: 5px;
                }
            </style>
            
            <h1>Mise à jour d'une vente</h1>

            <div class="group">
                    <label for="nom_prod">NOM PRODUIT</label>
                    <input type="text" name="nom_prod" id="nom_prod" class="formInput" value="<?php echo $vente['nom_prod']; ?>">
                </div>

                <div class="group">
                    <label for="prix_unit">PRIX UNITAIRE</label>
                    <input type="number" name="prix_unit" id="prix_unit" class="formInput" value="<?php echo $vente['prix_unit']; ?>">
                </div>

                <div class="group">
                    <label for="quantite">QUANTITE</label>
                    <input type="number" name="quantite" id="quantite" class="formInput" value="<?php echo $vente['quantite']; ?>">
                </div>

                <div class="group">
                    <label for="date_vente">DATE VENTE</label>
                    <input type="date" name="date_vente" id="date_vente" class="formInput" value="<?php echo $vente['date_vente']; ?>">
                </div>

                    <input type="submit" name="enregistrer" id="enregistrer" class="button" value="Enregistrer">       
        </form>
    </div>

    <?php
        if(
            
            isset($_POST['enregistrer'])  
        ){
            $nom_prod = $_POST['nom_prod'];
            $prix_unit = $_POST['prix_unit'];
            $quantite = $_POST['quantite'];
            $date_vente = $_POST['date_vente'];

            // Preparation de la requete
            $reqUpd = $bdd -> prepare("UPDATE ventes SET nom_prod = :nom_prod, prix_unit = :prix_unit, quantite = :quantite, date_vente = :date_vente WHERE id = :id");

            // Execution de la requete
            $reqUpd -> execute(
                array(
                    'nom_prod' => $nom_prod,
                    'prix_unit' => $prix_unit,
                    'quantite' => $quantite,
                    'date_vente' => $date_vente,
                    'id' => $id
                
                )
            );
            header('location: ../ventes.php');

        }
    ?> <br><br><br><br>


    <?php
        require_once("../footer.php");
    ?>
</body>
</html>