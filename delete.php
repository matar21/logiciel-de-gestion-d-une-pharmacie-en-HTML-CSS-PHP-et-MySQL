<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once(__DIR__ . "/connexion_bdd.php");
        require_once("traitement/headerTrtmt.php");
    ?>
    <div class="container">

        <h2>Voulez-vous vraiment supprimer l'utilisateur dont le id est <?php echo $_GET['id'] ?> ?</h2>

        <form action="" method="POST">
            <input style="height: 35px; width: 150px;" type="submit" name="submit" id="submit" class="deletbtn" value="SUPPRIMER">
        </form>

    </div>


    <?php
        $id = $_GET['id'];

        if(isset($_POST['submit'])){
            $reqDel = $bdd -> prepare("DELETE FROM users WHERE id = :id");
            $reqDel -> execute(['id' => $id]);
            header('location: users.php');
    }
    
        /* $reqDel = $bdd -> prepare("DELETE FROM users WHERE id = :id");
        $reqDel -> execute(['id' => $id]); */
        //header('location: users.php');

    ?>
    <?php  ?>
    
</body>

    
</html>