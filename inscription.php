<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style1.css">

    <style>
        label{
            display: inline-block;
            width: 120px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h1>Formulaire d'inscription</h1>
            <div class="group">
                <label for="prenom">PRENOM :</label>
                <input type="text" name="prenom" id="prenom" class="formInput">
            </div>

            <div class="group">
                <label for="nom">NOM :</label>
                <input type="text" name="nom" id="nom" class="formInput">
            </div>
                
            <div class="group">
                <label for="email">E-MAIL :</label>
                <input type="email" name="email" id="email" class="formInput">
            </div>
                
            <div class="group">
                <label for="password">PASSWORD :</label>
                <input type="password" name="password" id="password" class="formInput">
            </div>

                <input type="submit" name="submit" id="submit" class="button" value="S'inscrire"><br><br>

                <p id="texte">Vous avez déjà un compte, veuillez vous <a href= "index.php">connecter</a></p>    
        </form><br>
    </div>


    <?php
        require_once(__DIR__."/connexion_bdd.php");
        if(
            isset($_POST['prenom']) && 
            isset($_POST['nom']) && 
            isset($_POST['email']) && 
            isset($_POST['password']) && 
            isset($_POST['submit'])  
        ){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Ecriture de la requete
            $reqInsrt = "INSERT INTO users(prenom, nom, email, password) VALUES (:prenom, :nom, :email, :password)";

            // Preparation de la requete
            $insetion = $bdd -> prepare($reqInsrt);

            // Execution de la requete
            $insetion -> execute(
                array(
                    'prenom' => $prenom,
                    'nom' => $nom,
                    'email' => $email,
                    'password' => $password
                
                )
                );
            echo "Enregistrement fait avec succès";

        }
    ?><br><br><br>

    <footer>
        <p>Copyright © 2024 MAHAMAT SALEH Matar</p>
    </footer>
</body>
</html>