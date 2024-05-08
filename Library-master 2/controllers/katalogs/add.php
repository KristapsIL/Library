<?php
require "Core/functions.php";
require "Core/Database.php";
require "Core/Validator.php";

admin();
$config = require ("config.php");
$db = new Database($config);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $errors = [];

    if(isset($_POST["availability"]) == "on"){
        $available = 1;
    }else{
        $available = 0;
    }
    
    if(!Validator::string($_POST["name"], min: 1, max: 255)){
        $errors["name"] = "Name is too long or empty";
    }
    if(!Validator::string($_POST["author"], min: 1, max: 255)){
        $errors["author"] = "atuhor not valid";
    }
    if(!Validator::string($_POST["year"], min: 1, max: 255)){
        $errors["year"] = "date not valid";
    }
    if(empty($errors)){
        $query = "INSERT INTO katalogs (name, author, year, availability) 
        VALUES (:nosaukums, :autors, :year, :availability);";
        $params = [
            ":nosaukums" => $_POST["name"],
            ":autors" => $_POST["author"],
            ":year" => $_POST["year"],
            ":availability" => $available
        ];
        $db->execute($query, $params);
    
        header("Location: /katalogs");
        die();
    }
}


require "views/katalogs/add.view.php";