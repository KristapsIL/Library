<?php 
require "Core/functions.php";
require "Core/Database.php";
auth();
$config = require ("config.php");

$params[":id"] = $_GET["id"];
$query = "SELECT * FROM katalogs WHERE id = :id";

$db = new Database($config);
$posts = $db
    ->execute($query, $params)
    ->fetch();

$title = "Show";
require "views/katalogs/show.view.php";