<?php
    require_once(__DIR__ . "/connexion_bdd.php");

            if(
                isset($_POST['nom_fournisseur']) && 
                isset($_POST['telephone']) && 
                isset($_POST['email']) &&
                isset($_POST['adresse']) &&
                isset($_POST['ajout'])  
            ){
                $nom_fournisseur = $_POST['nom_fournisseur'];
                $telephone = $_POST['telephone'];
                $email = $_POST['email'];
                $adresse = $_POST['adresse'];

                // Ecriture de la requete
                $reqInsrt = "INSERT INTO fournisseurs(nom_fournisseur, telephone, email, adresse) VALUES (:nom_fournisseur, :telephone, :email, :adresse)";

                // Preparation de la requete
                $insetion = $bdd -> prepare($reqInsrt);

                // Execution de la requete
                $insetion -> execute(
                    array(
                        'nom_fournisseur' => $nom_fournisseur,
                        'telephone' => $telephone,
                        'email' => $email,
                        'adresse' => $adresse
                    )
                    );

            }
            header("location:../fournisseurs.php");
        ?>