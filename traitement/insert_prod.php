<?php
    require_once(__DIR__ . "/connexion_bdd.php");

            if(
                isset($_POST['nom_prod']) && 
                isset($_POST['type_prod']) && 
                isset($_POST['prix_unit']) && 
                isset($_POST['nom_fabriquant']) && 
                isset($_POST['date_exp']) && 
                isset($_POST['ajout'])  
            ){
                $nom_prod = $_POST['nom_prod'];
                $type_prod = $_POST['type_prod'];
                $prix_unit = $_POST['prix_unit'];
                $nom_fabriquant = $_POST['nom_fabriquant'];
                $date_exp = $_POST['date_exp'];

                // Ecriture de la requete
                $reqInsrt = "INSERT INTO produits(nom_prod, type_prod, prix_unit, nom_fabriquant, date_exp) VALUES (:nom_prod, :type_prod, :prix_unit, :nom_fabriquant, :date_exp)";

                // Preparation de la requete
                $insetion = $bdd -> prepare($reqInsrt);

                // Execution de la requete
                $insetion -> execute(
                    array(
                        'nom_prod' => $nom_prod,
                        'type_prod' => $type_prod,
                        'prix_unit' => $prix_unit,
                        'nom_fabriquant' => $nom_fabriquant,
                        'date_exp' => $date_exp
                    )
                    );

            }
            header("location:../produits.php")
        ?>