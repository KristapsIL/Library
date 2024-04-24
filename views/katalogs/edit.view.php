<?php require "views/components/head.php" ?>
    <?php require "views/components/navbar.php"; ?>
    <div class="item">
    <h1>Edit Book</h1>
    <form method="POST">
        <input name="id" value="<?= $post["id"] ?>" type="hidden">
        <label>Name:
            <input name="name" value="<?= $_POST["name"] ?? $post["NAME"] ?>">
            <?php if(isset($errors["name"])) {?>
            <p class="error"><?= $errors["name"]?></p>
            <?php } ?>
        </label>
        <label>Author:
            <input name="author" value="<?= $_POST["author"] ?? $post["author"] ?>">
            <?php if(isset($errors["author"])) {?>
            <p class="error"><?= $errors["author"]?></p>
            <?php } ?>
        </label>
        <label>Year:
            <input name="year" type="date" value="<?= $_POST["year"] ?? $post["YEAR"] ?>">
            <?php if(isset($errors["year"])) {?>
            <p class="error"><?= $errors["year"]?></p>
            <?php } ?>
        </label>
        <label>availability:
            <input name="availability" type="checkbox" value="<?= $_POST["availability"] ?? $post["availability"] ?>">
        </label>
        <button>Submit</button>
    </form>
    </div>


<?php require "views/components/footer.php" ?>