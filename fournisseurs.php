<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les fournisseurs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once(__DIR__ . "/connexion_bdd.php");
        require_once(__DIR__ . "/header.php");
        // Ecriture de la requete
        $reqSlct = "SELECT * FROM fournisseurs";

        // Preparation de la requete
        $selection = $bdd -> prepare($reqSlct);

        // Execution de la requete
        $selection -> execute();
        $fournisseurs = $selection -> fetchAll();        
        
    ?>

    <div class="container" style="margin-top: 20px;">
        <form action="traitement/insert_fournisseur.php" method="POST">
            <style>
                .group{
                    margin-bottom: 5px;
                }
            </style>
            
            <div class="group">
                <label for="nom_fournisseur">FOURNISSEUR :</label>
                <input type="text" name="nom_fournisseur" id="nom_fournisseur" class="formInput">
            </div>

            <div class="group">
                <label for="telephone">TELEPHONE :</label>
                <input type="text" name="telephone" id="telephone" class="formInput">
            </div>

            <div class="group">
                <label for="email">E-MAIL :</label>
                <input type="text" name="email" id="email" class="formInput">
            </div>

            <div class="group">
                <label for="adresse">ADRESSE :</label>
                <input type="text" name="adresse" id="adresse" class="formInput">
            </div>

                <input type="submit" name="ajout" id="submit" class="button" value="Ajouter"><br>
            </div>

        </form>
        


    </div> <br><br><br>
    
    <table class="usersTable">
        <caption>Liste des Fournisseurs</caption>
       <thead>
            <th>ID</th>
            <th>NOM FOURNISSEUR</th>
            <th>TELEPHONE</th>
            <th>E-MAIL</th>
            <th>ADRESSE</th>
            <th>ACTION</th>
       </thead>
       <?php foreach($fournisseurs as $fournisseur): ?>
       <tbody>
            <tr>
                <td><?php echo $fournisseur['id']; ?></td>
                <td><?php echo $fournisseur['nom_fournisseur']; ?></td>
                <td><?php echo $fournisseur['telephone']; ?></td>
                <td><?php echo $fournisseur['email']; ?></td>
                <td><?php echo $fournisseur['adresse']; ?></td>
                <td><a href="traitement/update_fournisseur.php?id=<?php echo $fournisseur['id']; ?>">Modifier</a>  / <a href="traitement/delete_fournisseur.php?id=<?php echo $fournisseur['id']; ?>">Supprimer</a></td>
            </tr>
            
        </tbody>
        <?php endforeach; ?>
    </table><br>

    <?php
        require_once(__DIR__ . "/footer.php");
    ?>
</body>
</html>