<?php
require "Core/Database.php";

$config = require ("config.php");
$db = new Database($config);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $query = "UPDATE katalogs SET availability = 1 WHERE id = :id";
    $params = [
        ":id" => $_POST["id"]
    ];
    $db->execute($query, $params);

    header("Location: /katalogs");
    die();
}

$title = "Delete Pasakumi";
require "views/katalogs/index.view.php";