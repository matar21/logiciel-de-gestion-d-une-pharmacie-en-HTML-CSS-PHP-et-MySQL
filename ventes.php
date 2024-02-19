<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once(__DIR__ . "/connexion_bdd.php");
        require_once(__DIR__ . "/header.php");
        // Ecriture de la requete
        $reqSlct = "SELECT * FROM ventes";

        // Preparation de la requete
        $selection = $bdd -> prepare($reqSlct);

        // Execution de la requete
        $selection -> execute();
        $ventes = $selection -> fetchAll();        
        
    ?>

    <div class="container" style="margin-top: 20px;">
        <form action="traitement/insert_vente.php" method="POST">
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
                <label for="prix_unit">PPRIX UNITAIRE :</label>
                <input type="number" name="prix_unit" id="prix_unit" class="formInput">
            </div>
                
            <div class="group">
                <label for="quantite">QUANTITE :</label>
                <input type="number" name="quantite" id="quantite" class="formInput">
            </div>
                
            <div class="group">
                <label for="date_vente">DATE VENTE :</label>
                <input type="date" name="date_vente" id="date_vente" class="formInput" value="<?php echo date('Y-m-d'); ?>">

                <input type="submit" name="ajout" id="submit" class="button" value="Ajouter"><br>
            </div>

        </form>
        


    </div> <br><br><br>
    
    <table class="usersTable">
        <caption>Liste des Ventes</caption>
       <thead>
            <th>ID</th>
            <th>NOM PRODUIT</th>
            <th>PRIX UNITAIRE</th>
            <th>QUANTITE</th>
            <th>DATE VENTE</th>
            <th>ACTION</th>
       </thead>
       <?php 
            $_SESSION['chiffreAffaire'] = 0;
            foreach($ventes as $vente): 
        ?>
       <tbody>
            <?php
                $_SESSION['chiffreAffaire'] += $vente['prix_unit'] * $vente['quantite'];
            ?>
            <tr>
                <td><?php echo $vente['id']; ?></td>
                <td><?php echo $vente['nom_prod']; ?></td>
                <td><?php echo $vente['prix_unit']." FCFA"; ?></td>
                <td><?php echo $vente['quantite']; ?></td>
                <td><?php echo $vente['date_vente']; ?></td>
                <td><a href="traitement/update_vente.php?id=<?php echo $vente['id']; ?>">Modifier</a>  / <a href="traitement/delete_vente.php?id=<?php echo $vente['id']; ?>">Supprimer</a></td>
            </tr>
            
        </tbody>
        <?php endforeach; ?>
    </table><br>    
    <?php
        require_once(__DIR__ . "/footer.php");
    ?>
</body>
</html>