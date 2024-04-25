<?php
require "Core/Database.php";
require "Core/Validator.php";
require "Core/functions.php";
admin();
$config = require ("config.php");
$db = new Database($config);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $errors = [];

    if($_POST["availability"] == 1){
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
        $query = "UPDATE katalogs SET
        name = :name, author = :author, year = :year, availability = :availability WHERE id = :id;";
       $params = [
           ":name" => $_POST["name"],
           ":author" => $_POST["author"],
           ":year" => $_POST["year"],
           ":availability" => $available,
           ":id" => $_POST["id"]
       ];
   
       $db->execute($query, $params);
       header("Location: /katalogs");
       die();
    }
 
}
$params[":id"] = $_GET["id"];
$query = "SELECT * FROM katalogs WHERE id = :id";
$post = $db->execute($query, $params)->fetch();

$title = "Edit";
require "views/katalogs/edit.view.php";