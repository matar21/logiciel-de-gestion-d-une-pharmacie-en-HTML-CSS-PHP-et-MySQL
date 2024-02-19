<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les produits</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once(__DIR__ . "/connexion_bdd.php");
        require_once(__DIR__ . "/header.php");
        // Ecriture de la requete
        $reqSlct = "SELECT * FROM produits";

        // Preparation de la requete
        $selection = $bdd -> prepare($reqSlct);

        // Execution de la requete
        $selection -> execute();
        $produits = $selection -> fetchAll();        
        
    ?>

    <div class="container" style="margin-top: 20px;">
        <form action="traitement/insert_prod.php" method="POST">
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
                <label for="type_prod">TYPE PRODUIT :</label>
                <input type="text" name="type_prod" id="type_prod" class="formInput">
            </div>
                
            <div class="group">
                <label for="prix_unit">PRIX UNITAIRE :</label>
                <input type="number" name="prix_unit" id="prix_unit" class="formInput">
            </div>
                
            <div class="group">
                <label for="nom_fabriquant">NOM FABRIQUANT :</label>
                <input type="text" name="nom_fabriquant" id="nom_fabriquant" class="formInput">
            </div>
                
            <div class="group">
                <label for="date_exp">DATE EXPIRATION :</label>
                <input type="date" name="date_exp" id="date_exp" class="formInput" >

                <input type="submit" name="ajout" id="submit" class="button" value="Ajouter"><br>
            </div>

        </form>
        


    </div> <br><br><br>
    
    <table class="">
        <caption>Liste des Produits</caption>
       <thead>
            <th>&nbsp;&nbsp;ID&nbsp;&nbsp;</th>
            <th>NOM PRODUIT</th>
            <th>TYPE PRODUIT</th>
            <th>QUANTITE DISPO</th>
            <th>PRIX UNITAIRE</th>
            <th>NOM FABRIQUANT</th>
            <th>DATE EXPIRATION</th>
            <th>ACTION</th>
       </thead>
            <?php
                $_SESSION['count'] = 0;
                $_SESSION['produitExp'] = 0;
                foreach($produits as $produit): 
            ?>
       <tbody>
            <tr>
                <?php $_SESSION['count'] ++; ?>
                <?php
                    if($produit['date_exp']<date('Y-m-d')) {
                        $_SESSION['produitExp'] ++;
                    }
                     
                ?>
                <td><?php echo $produit['id']; ?></td>
                <td><?php echo $produit['nom_prod']; ?></td>
                <td><?php echo $produit['type_prod']; ?></td>
                <td><?php echo $produit['quantite_dispo']; ?></td>
                <td><?php echo $produit['prix_unit']." FCFA"; ?></td>
                <td><?php echo $produit['nom_fabriquant']; ?></td>
                <td><?php echo $produit['date_exp']; ?></td>
                <td><a href="traitement/update_prod.php?id=<?php echo $produit['id']; ?>">Modifier</a>  / <a href="traitement/delete_prod.php?id=<?php echo $produit['id']; ?>">Supprimer</a></td>
            </tr>
            
        </tbody>
        <?php endforeach; ?>
    </table><br>
    <?php
        require_once(__DIR__ . "/footer.php");
    ?>
</body>
</html>