<?php
require "Core/functions.php";
require "Core/Database.php";

admin();
$available = 0;
$config = require ("config.php");
$db = new Database($config);

if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["availability"] == "on"){
            $available = 1;
        }

        $query = "INSERT INTO katalogs (name, author, year, availability) 
        VALUES (:nosaukums, :autors, :year, :availability);";
        $params = [
            ":nosaukums" => $_POST["nosaukums"],
            ":autors" => $_POST["autors"],
            ":year" => $_POST["year"],
            ":availability" => $available
        ];
        $db->execute($query, $params);
    
        header("Location: /katalogs");
        die();

}


require "views/katalogs/add.view.php";