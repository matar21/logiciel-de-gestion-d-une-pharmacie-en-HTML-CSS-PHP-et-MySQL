<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Connexion</title>

</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h1>Formulaire de connexion</h1>
            
            <div class="group">
                <label for="email">EMAIL</label>
                <input type="text" name="email" id="email" class="formInput">
            </div>

            <div class="group">
            <label for="password">PASSWORD</label>
            <input type="password" name="password" id="password" class="formInput">
            </div>
            
            <input type="submit" name="submit" id="submit" class="button" value="Se connecter"><br><br>

            <p id="texte">Vous n'avez pas compte, veuillez vous <a href= "inscription.php">inscrire</a></p><br>
        </form> <br><br>
    </div>
    <?php
        require_once(__DIR__ . '/connexion_bdd.php');

        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            if($email != "" && $password != ""){
                // Recuperation des infos depui la BD
                // Ecriture de la requete
                $reqSlct = "SELECT id, email, password FROM users WHERE email = :email AND password = :password";

                // Preparation de la requete
                $selection = $bdd -> prepare($reqSlct);

                // Execution de la requete
                $selection -> execute(
                    [
                        'email' => $email,
                        'password' => $password,
                    ]
                );
                $user = $selection -> fetch();
                if(is_array($user) && $user['id'] != false){
                    echo "Connexion reussie";
                    header('location: dashboard.php');
                }else{
                    echo "Le mot de pass ou l'email que vous avez saisi est incorrect !";
                }
            }else{
                echo "Veuillez remplir tous les champs svp !";
            }
            

            

        }
    ?><br><br><br>
    <footer>
        <p>Copyright © 2024 MAHAMAT SALEH Matar</p>
    </footer>
</body>
</html>