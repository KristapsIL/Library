<?php require "views/components/head.php" ?>
    <?php require "views/components/navbar.php" ?>
    <div class="item">
    <h1>Add an author</h1>
    <form method="POST">
        <label>Authors name:
        <input name="name" value="<?= $_POST["name"] ?? '' ?>">
            <?php if(isset($errors["name"])) {?>
                <div><p class="error"><?= $errors["name"]?></p></div>
            <?php } ?>
        </label>
        <button >Submit</button>
    </form>
    </div>
<?php require "views/components/footer.php" ?>