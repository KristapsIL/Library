<?php

require "Core/functions.php";
guest();
require "Core/Validator.php";
require "Core/Database.php";
$config = require("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database($config);
  
    // Validācija datu
    //  1. e-pasts - burti, @, .lv beate@ckc.lv
    //  2. parole vismaz 6 string
    $errors = [];
  
    if (!Validator::email($_POST["email"])) {
      $errors["email"] = "Invalid email";
    }
    if (!Validator::password($_POST["password"])) {
      $errors["password"] = "Invalid password";
    }
    // PĀRBAUDĪS, VAI datubāzē ir e-pasts
    // 
    $query = "SELECT * FROM users WHERE email = :email";
    $params = [":email" => $_POST["email"]];
    $result = $db->execute($query, $params)->fetch();
  
    if ($result) {
      $errors["email"] = "email taken";
    }
  
    if (empty($errors)) {
      $query = "INSERT INTO users (email, password, role) VALUES (:email, :password, false)";
      $params = [
        ":email" => $_POST["email"],
        ":password" => password_hash($_POST["password"], PASSWORD_BCRYPT)
      ];
      $db->execute($query, $params);
  
      $_SESSION["flash"] = "Tu esi veiksmīgi reģistrēts";
      header("Location: /login");
      die();
    }
  }

  $title = "Register";
  require "views/auth/register.view.php";