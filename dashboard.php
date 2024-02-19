<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Pharmacie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once(__DIR__ . "/connexion_bdd.php");
        require_once(__DIR__ . "/header.php"); 

        // Ecriture de la requete

        $date = date('Y-m-d');
        $reqSlct = "SELECT * FROM ventes WHERE date_vente = :date_vente";

        // Preparation de la requete
        $selection = $bdd -> prepare($reqSlct);

        // Execution de la requete
        $selection -> execute(['date_vente' => $date]);
        $ventes = $selection -> fetchAll();

        $_SESSION['chiffreAffaireJ'] = 0;
        foreach($ventes as $vente){
            $_SESSION['chiffreAffaireJ'] += $vente['prix_unit'] * $vente['quantite'];

        }  
        

    ?>

    <section id="content">

        <!-- Contenu du tableau de bord -->
        <div class="widget">
            <h2 id="statistique">Statistiques</h2>
            <p>
                Nombre de médicaments en stock : <span class="highlight"><?php echo $_SESSION['count']; ?></span>
            </p>
            <p>
                Chiffre d'affaire du jour : <span class="highlight"><?php echo $_SESSION['chiffreAffaireJ']." FCFA"; ?></span>
            </p>
        </div>
        
        <div class="widget" id="widgetChiffre">
            <h2 id="chiffreAffaire">Chiffre d'Affaire</h2>
            <p id="chiffreAffaireP"><?php echo $_SESSION['chiffreAffaire']." FCFA"; ?></p>
        </div>

        <div class="widget">
            <h2 id="alerte">Alertes</h2>
            <p>Le nombre de médicaments <br> expirés : <span class="highlight"><?php echo $_SESSION['produitExp']; ?></span> </p>
        </div>

    </section>
    <section class="tableau">
        <div>
        <table class="usersTable">
        <caption>Liste des Ventes du jour</caption>
       <thead>
            <th>&nbsp;&nbsp;ID&nbsp;&nbsp;</th>
            <th>NOM PRODUIT</th>
            <th>PRIX UNITAIRE</th>
            <th>QUANTITE</th>
            <th>DATE VENTE</th>
       </thead>
       <?php 
            foreach($ventes as $vente): 
        ?>
       <tbody>
            <tr>
                <td><?php echo $vente['id']; ?></td>
                <td><?php echo $vente['nom_prod']; ?></td>
                <td><?php echo $vente['prix_unit']." FCFA"; ?></td>
                <td><?php echo $vente['quantite']; ?></td>
                <td><?php echo $vente['date_vente']; ?></td>
            </tr>
            
        </tbody>

        <?php endforeach; ?>

        <tfoot>
            <td colspan="3">Chiffre d'affaire du jour</td>
            <td colspan="2" style="color: #0091ff;"><?php echo $_SESSION['chiffreAffaireJ']." FCFA"; ?></td>
        </tfoot>

    </table><br> 
        </div>
    </section><br>

    <?php
        require_once(__DIR__ . "/footer.php");
    ?>
    </body>
</html>
