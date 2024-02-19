<?php
    require_once(__DIR__ . "/connexion_bdd.php");

            if(
                isset($_POST['nom_prod']) && 
                isset($_POST['prix_unit']) && 
                isset($_POST['quantite']) && 
                isset($_POST['date_vente']) && 
                isset($_POST['ajout'])  
            ){
                $nom_prod = $_POST['nom_prod'];
                $prix_unit = $_POST['prix_unit'];
                $quantite = $_POST['quantite'];
                $date_vente = $_POST['date_vente'];

                // Ecriture de la requete
                $reqInsrt = "INSERT INTO ventes(nom_prod, prix_unit, quantite, date_vente) VALUES (:nom_prod, :prix_unit, :quantite, :date_vente)";

                // Preparation de la requete
                $insetion = $bdd -> prepare($reqInsrt);

                // Execution de la requete
                $insetion -> execute(
                    array(
                        'nom_prod' => $nom_prod,
                        'prix_unit' => $prix_unit,
                        'quantite' => $quantite,
                        'date_vente' => $date_vente
                    )
                    );

            }
            header("location:../ventes.php");
        ?>