<?php
require "Core/functions.php";
require "Core/Database.php";
require "Core/Validator.php";

admin();
$config = require ("config.php");
$db = new Database($config);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $errors = [];
    
    if(!Validator::string($_POST["name"], min: 1, max: 255)){
        $errors["name"] = "Name is too long or empty";
    }
    if(empty($errors)){
        $query = "INSERT INTO authors (name) 
        VALUES (:name);";
        $params = [
            ":name" => $_POST["name"],
        ];
        $db->execute($query, $params);
    
        header("Location: /katalogs");
        die();
    }
}


require "views/authors/create.view.php";