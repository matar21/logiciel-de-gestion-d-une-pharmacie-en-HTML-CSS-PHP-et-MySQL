<?php
    require_once(__DIR__ . "/connexion_bdd.php");

            if(
                isset($_POST['nom_prod']) && 
                isset($_POST['quantite']) && 
                isset($_POST['prix_unit']) && 
                isset($_POST['fournisseur']) && 
                isset($_POST['date_exp']) && 
                isset($_POST['date_achat']) && 
                isset($_POST['ajout'])  
            ){
                $nom_prod = $_POST['nom_prod'];
                $quantite = $_POST['quantite'];
                $prix_unit = $_POST['prix_unit'];
                $fournisseur = $_POST['fournisseur'];
                $date_exp = $_POST['date_exp'];
                $date_achat = $_POST['date_achat'];

                // Ecriture de la requete
                $reqInsrt = "INSERT INTO achats(nom_prod, quantite, prix_unit, fournisseur, date_exp, date_achat) VALUES (:nom_prod, :quantite, :prix_unit, :fournisseur, :date_exp, :date_achat)";

                // Preparation de la requete
                $insetion = $bdd -> prepare($reqInsrt);

                // Execution de la requete
                $insetion -> execute(
                    array(
                        'nom_prod' => $nom_prod,
                        'quantite' => $quantite,
                        'prix_unit' => $prix_unit,
                        'fournisseur' => $fournisseur,
                        'date_exp' => $date_exp,
                        'date_achat' => $date_achat
                    )
                    );

            }
            header("location:../achats.php");
        ?>