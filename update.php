<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <?php
        require_once(__DIR__ . "/connexion_bdd.php");
        $id = $_GET['id'];

       

        // Preparation de la requete
        $reqSlct = $bdd -> prepare("SELECT * FROM users WHERE id = :id");

        // Execution de la requete
        $reqSlct -> execute([
            'id' => $id
        ]);
        $user = $reqSlct -> fetch();

        //print_r($user);
        
    ?>

    <div class="container">
        <form action="" method="POST">
            <h1>Mise à jour de l'utilisateur</h1>

            <div class="group">
                    <label for="prenom">PRENOM</label>
                    <input type="text" name="prenom" id="prenom" class="formInput" value="<?php echo $user['prenom']; ?>">
                </div>

                <div class="group">
                    <label for="nom">NOM</label>
                    <input type="text" name="nom" id="nom" class="formInput" value="<?php echo $user['nom']; ?>">
                </div>

                <div class="group">
                    <label for="email">E-MAIL</label>
                    <input type="text" name="email" id="email" class="formInput" value="<?php echo $user['email']; ?>">
                </div>

                    <input type="submit" name="enregistrer" id="enregistrer" class="button" value="Enregistrer">       
        </form>
    </div>

    <?php
        if(
            
            isset($_POST['enregistrer'])  
        ){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];

            // Preparation de la requete
            $reqUpd = $bdd -> prepare("UPDATE users SET prenom = :prenom, nom = :nom, email = :email WHERE id = :id");

            // Execution de la requete
            $reqUpd -> execute(
                array(
                    'prenom' => $prenom,
                    'nom' => $nom,
                    'email' => $email,
                    'id' => $id
                
                )
            );
            header('location: users.php');

        }
    ?> <br><br><br><br>

    <footer>
        <p>Copyright © 2024 MAHAMAT SALEH Matar</p>
    </footer>
</body>
</html>