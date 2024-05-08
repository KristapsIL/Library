<?php
require "Core/functions.php";
require "Core/Database.php";
admin();
$config = require ("config.php");
$db = new Database($config);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $query = "DELETE FROM katalogs WHERE id = :id";
    $params = [
        ":id" => $_POST["id"]
    ];
    $db->execute($query, $params);

    header("Location: /katalogs");
    die();
}