<?php
    try{
        $servername = "localhost";
        $username = "root";
        $password = "";
        $bdd = new PDO("mysql:host=$servername;dbname=gestion_pharmacie", $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    catch(Exeption $e){
        die('Erreue : ' . $e->gerMessage());
    }
?>