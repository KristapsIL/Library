<?php
require "Core/functions.php";

guest();

require "Core/Validator.php";
require "Core/Database.php";
$config = require("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $db = new Database($config);

  $errors = [];

  if (!Validator::email($_POST["email"])) {
    $errors["email"] = "Nepareiz epasta formāts";
  }

  $query = "SELECT * FROM users WHERE email = :email";
  $params = [
    ":email" => $_POST["email"]
  ];
  $user = $db->execute($query, $params)->fetch();
  if (!$user || !password_verify($_POST["password"], $user["PASSWORD"])) {
    $errors["email"] = "Kaut kas nav labi";
  }

  if (empty($errors)) {
    $_SESSION["user"] = true;
    $_SESSION["email"] = $_POST["email"];
    if($user["ROLE"] == 1){
        $_SESSION["role"] = "admin";
    }else{
        $_SESSION["role"] = "none";
    }
    header("Location: /katalogs");
    die();

  }
}

$title = "Login";
require "views/auth/login.view.php";

unset($_SESSION["flash"]);