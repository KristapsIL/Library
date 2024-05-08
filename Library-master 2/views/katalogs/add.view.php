<?php require "views/components/head.php" ?>
    <?php require "views/components/navbar.php" ?>
    <div class="item">
    <h1>Add book</h1>
    <form method="POST">
        <label>Books name:
        <input name="name" value="<?= $_POST["name"] ?? '' ?>">
            <?php if(isset($errors["name"])) {?>
                <div><p class="error"><?= $errors["name"]?></p></div>
            <?php } ?>
        </label>
        <label>Author:
        <input name="author" value="<?= $_POST["author"] ?? '' ?>">
            <?php if(isset($errors["author"])) {?>
            <p class="error"><?= $errors["author"]?></p>
            <?php } ?>
        </label>
        <label>Release:
        <input name="year" type="date" value="<?= $_POST["year"] ?? '' ?>">
            <?php if(isset($errors["year"])) {?>
            <p class="error"><?= $errors["year"]?></p>
            <?php } ?>
        </label>
        <label>availability:
        <input name="availability" type="checkbox" value="<?= $_POST["availability"] ?? 0 ?>">
        </label>
        <button >Submit</button>
    </form>
    </div>
<?php require "views/components/footer.php" ?>