<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les achats</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once(__DIR__ . "/connexion_bdd.php");
        require_once(__DIR__ . "/header.php");
        // Ecriture de la requete
        $reqSlct = "SELECT * FROM achats";

        // Preparation de la requete
        $selection = $bdd -> prepare($reqSlct);

        // Execution de la requete
        $selection -> execute();
        $achats = $selection -> fetchAll();        
        
    ?>

    <div class="container" style="margin-top: 20px;">
        <form action="traitement/insert_achat.php" method="POST">
            <style>
                .group{
                    margin-bottom: 5px;
                }
            </style>

            <div class="group">
                <label for="nom_prod">NOM PRODUIT :</label>
                <input type="text" name="nom_prod" id="nom_prod" class="formInput">
            </div>

            <div class="group">
                <label for="quantite">QUANTITE :</label>
                <input type="number" name="quantite" id="quantite" class="formInput">
            </div>

            <div class="group">
                <label for="prix_unit">PRIX UNITAIRE :</label>
                <input type="number" name="prix_unit" id="prix_unit" class="formInput">
            </div>

            <div class="group">
                <label for="fournisseur">FOURNISSEUR :</label>
                <input type="text" name="fournisseur" id="fournisseur" class="formInput">
            </div>
                
            <div class="group">
                <label for="date_exp">DATE EXPIRATION :</label>
                <input type="date" name="date_exp" id="date_exp" class="formInput" style="width: 197px;">
            </div>

                
            <div class="group">
                <label for="date_achat">DATE ACHAT :</label>
                <input type="date" name="date_achat" id="date_achat" class="formInput" value="<?php echo date('Y-m-d'); ?>">

                <input type="submit" name="ajout" id="submit" class="button" value="Ajouter"><br>
            </div>

        </form>

    </div><br><br>
    
    <table class="">
        <caption>Liste des Achats</caption>
       <thead>
            <th>ID</th>
            <th>NOM PRODUIT</th>
            <th>QUANTITE</th>
            <th>PRIX UNITAIRE</th>
            <th>FOURNISSEUR</th>
            <th>DATE EXPIRATION</th>
            <th>DATE ACHAT</th>
            <th>ACTION</th>
       </thead>
       <?php foreach($achats as $achat): ?>
       <tbody>
            <tr>
                <td><?php echo $achat['id']; ?></td>
                <td><?php echo $achat['nom_prod']; ?></td>
                <td><?php echo $achat['quantite']; ?></td>
                <td><?php echo $achat['prix_unit']." FCFA"; ?></td>
                <td><?php echo $achat['fournisseur']; ?></td>
                <td><?php echo $achat['date_exp']; ?></td>
                <td><?php echo $achat['date_achat']; ?></td>
                <td><a href="traitement/update_achat.php?id=<?php echo $achat['id']; ?>">Modifier</a>  / <a href="traitement/delete_achat.php?id=<?php echo $achat['id']; ?>">Supprimer</a></td>
            </tr>
            
        </tbody>
        <?php endforeach; ?>
    </table><br>     

    <?php
        require_once(__DIR__ . "/footer.php");
    ?>
</body>
</html>