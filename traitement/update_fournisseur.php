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
        $reqSlct = $bdd -> prepare("SELECT * FROM fournisseurs WHERE id = :id");

        // Execution de la requete
        $reqSlct -> execute([
            'id' => $id
        ]);
        $fournisseur = $reqSlct -> fetch();

        //print_r($user);
        
    ?>

    <div class="container">
        <form action="" method="POST">
            <style>
                .group{
                    margin-bottom: 5px;
                }
            </style>
            
            <h1>Mise à jour fournisseur</h1>

            <div class="group">
                    <label for="nom_fournisseur">NOM FOURNISSEUR</label>
                    <input type="text" name="nom_fournisseur" id="nom_fournisseur" class="formInput" value="<?php echo $fournisseur['nom_fournisseur']; ?>">
                </div>

                <div class="group">
                    <label for="telephone">TELEPHONE</label>
                    <input type="text" name="telephone" id="telephone" class="formInput" value="<?php echo $fournisseur['telephone']; ?>">
                </div>

                <div class="group">
                    <label for="email">E-MAIL</label>
                    <input type="text" name="email" id="email" class="formInput" value="<?php echo $fournisseur['email']; ?>">
                </div>

                <div class="group">
                    <label for="adresse">ADRESSE</label>
                    <input type="text" name="adresse" id="adresse" class="formInput" value="<?php echo $fournisseur['adresse']; ?>">
                </div>

                    <input type="submit" name="enregistrer" id="enregistrer" class="button" value="Enregistrer">       
        </form>
    </div>

    <?php
        if(
            
            isset($_POST['enregistrer'])  
        ){
            $nom_fournisseur = $_POST['nom_fournisseur'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $adresse = $_POST['adresse'];

            // Preparation de la requete
            $reqUpd = $bdd -> prepare("UPDATE fournisseurs SET nom_fournisseur = :nom_fournisseur, telephone = :telephone, email = :email, adresse = :adresse WHERE id = :id");

            // Execution de la requete
            $reqUpd -> execute(
                array(
                    'nom_fournisseur' => $nom_fournisseur,
                    'telephone' => $telephone,
                    'email' => $email,
                    'adresse' => $adresse,
                    'id' => $id
                
                )
            );
            header('location: ../fournisseurs.php');

        }
    ?> <br><br><br><br>


    <?php
        require_once("../footer.php");
    ?>
</body>
</html>