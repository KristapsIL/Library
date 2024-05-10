<?php require "views/components/head.php" ?>
<div class="item">
<h1>Register</h1>
<form method="POST">
  <label>
    Enter email
    <input name="email" type="email" value="<?= $_POST["email"] ?? '' ?>"/>
  </label>
  <?php if(isset($errors["email"])) {?>
    <p><?= $errors["email"] ?></p>
  <?php } ?>
  <label>
    Enter password
    <input name="password" type="password" value="<?= $_POST["password"] ?? '' ?>"/>
  </label>
  <?php if(isset($errors["password"])) {?>
    <p><?= $errors["password"] ?></p>
  <?php } ?>
  <button class="register-button" >Register</button>
</form>
<form action="/login">
    <button>Login</button>
  </form>
</div>
<?php require "views/components/footer.php" ?>