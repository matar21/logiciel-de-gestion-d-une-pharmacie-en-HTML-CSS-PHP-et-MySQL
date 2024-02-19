<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        require_once(__DIR__ . "/connexion_bdd.php");
        require_once(__DIR__ . "/headerTrtmt.php");
    ?>
    <div class="container">

        <h2>Voulez-vous vraiment supprimer l'achat dont le id est <?php echo $_GET['id'] ?> ?</h2>

        <form action="" method="POST">
            <input style="height: 35px; width: 150px;" type="submit" name="submit" id="submit" class="deletbtn" value="SUPPRIMER">
        </form>

    </div>


    <?php
        $id = $_GET['id'];

        if(isset($_POST['submit'])){
            $reqDel = $bdd -> prepare("DELETE FROM achats WHERE id = :id");
            $reqDel -> execute(['id' => $id]);
            header('location: ../achats.php');
    }
    
    ?><br><br><br><br><br>


<?php
    require_once("../footer.php");
?>
    
</body> 
</html>