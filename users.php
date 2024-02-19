<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="margin: 0; padding: 0; ">
    <?php
        require_once(__DIR__."/connexion_bdd.php");
        require_once(__DIR__ . "/header.php");
        // Ecriture de la requete
        $reqSlct = "SELECT * FROM users";

        // Preparation de la requete
        $selection = $bdd -> prepare($reqSlct);

        // Execution de la requete
        $selection -> execute();
        $users = $selection -> fetchAll();        
        
    ?>
    
    <table class="usersTable">
        <caption>Liste des utilisateurs</caption>
       <thead>
            <th>&nbsp;&nbsp;ID&nbsp;&nbsp;</th>
            <th>PRENOM</th>
            <th>NOM</th>
            <th>EMAIL</th>
            <th>ACTION</th>
       </thead>
       <?php foreach($users as $user): ?>
       <tbody>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['prenom']; ?></td>
                <td><?php echo $user['nom']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><a href="update.php?id=<?php echo $user['id']; ?>">Modifier</a>  / <a href="delete.php?id=<?php echo $user['id']; ?>">Supprimer</a></td>
            </tr>
            
        </tbody>
        <?php endforeach; ?>
    </table><br>

        

        <?php
            require_once(__DIR__ . "/footer.php");
        ?>
    </body>
</html>