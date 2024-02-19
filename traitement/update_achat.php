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
        $reqSlct = $bdd -> prepare("SELECT * FROM achats WHERE id = :id");

        // Execution de la requete
        $reqSlct -> execute([
            'id' => $id
        ]);
        $achat = $reqSlct -> fetch();

        //print_r($user);
        
    ?>

    <div class="container">
        <form action="" method="POST">
            <style>
                .group{
                    margin-bottom: 5px;
                }
            </style>
            
            <h1>Mise à jour d'un achat</h1>

            <div class="group">
                <label for="nom_prod">NOM PRODUIT</label>
                <input type="text" name="nom_prod" id="nom_prod" class="formInput" value="<?php echo $achat['nom_prod']; ?>">
            </div>

            <div class="group">
                <label for="quantite">QUANTITE</label>
                <input type="number" name="quantite" id="quantite" class="formInput" value="<?php echo $achat['quantite']; ?>">
            </div>
            
            <div class="group">
                <label for="prix_unit">PRIX UNITAIRE</label>
                <input type="number" name="prix_unit" id="prix_unit" class="formInput" value="<?php echo $achat['prix_unit']; ?>">
            </div>

            <div class="group">
                <label for="fournisseur">FOURNISSEUR</label>
                <input type="text" name="fournisseur" id="fournisseur" class="formInput" value="<?php echo $achat['fournisseur']; ?>">
            </div>

            <div class="group">
                <label for="date_vente">DATE EXPIRATION</label>
                <input type="date" name="date_exp" id="date_exp" class="formInput" value="<?php echo $achat['date_exp']; ?>">
            </div>

            <div class="group">
                <label for="date_achat">DATE ACHAT</label>
                <input type="date" name="date_achat" id="date_achat" class="formInput" value="<?php echo $achat['date_achat']; ?>">
            </div>

                <input type="submit" name="enregistrer" id="enregistrer" class="button" value="Enregistrer">       
        </form>
    </div>

    <?php
        if(
            
            isset($_POST['enregistrer'])  
        ){
            $nom_prod = $_POST['nom_prod'];
            $quantite = $_POST['quantite'];
            $prix_unit = $_POST['prix_unit'];
            $fournisseur = $_POST['fournisseur'];
            $date_exp = $_POST['date_exp'];
            $date_achat = $_POST['date_achat'];

            // Preparation de la requete
            $reqUpd = $bdd -> prepare("UPDATE achats SET nom_prod = :nom_prod, quantite = :quantite, prix_unit = :prix_unit, fournisseur = :fournisseur, date_exp = :date_exp, date_achat = :date_achat WHERE id = :id");

            // Execution de la requete
            $reqUpd -> execute(
                array(
                    'nom_prod' => $nom_prod,
                    'quantite' => $quantite,
                    'prix_unit' => $prix_unit,
                    'fournisseur' => $fournisseur,
                    'date_exp' => $date_exp,
                    'date_achat' => $date_achat,
                    'id' => $id
                
                )
            );
            header('location: ../achats.php');

        }
    ?> <br><br><br><br>


<?php
    require_once("../footer.php");
?>
</body>
</html>