<?php require "views/components/head.php" ?>
    <?php require "views/components/navbar.php"; ?>
    <div class="book" id="book-show">
    <h1><?= htmlspecialchars($posts["NAME"]) ?></h1>
    <p><?= htmlspecialchars($posts["author"]) ?></p>
    <p><?= htmlspecialchars($posts["YEAR"]) ?></p>
    <p><?= $posts["availability"] == 1 ? "available" : "Not available"?></p>
    <div class="buttons">
            <?php if($posts["availability"] == 1){ ?>
                <form method="POST" action="/reserve">
                <button name="id" value=" <?= $posts['id'] ?>">Borrow</button>
                </form>
                <?php } else {?>
                    <form method="POST" action="/putback">
                <button name="id" value=" <?= $posts['id'] ?>">Putback</button>
                </form>
                <?php } ?>
    <?php if($_SESSION["role"] == "admin") { ?>
        <form class="delete-form" method="POST" action="/delete">
            <Button name="id" value=" <?= $_GET['id'] ?>">Delete</Button>
        </form>
        <form class="edit-form" action="/edit">
            <Button name="id" value=" <?= $_GET['id'] ?>">edit</Button>
        </form>
    <?php } ?>
    </div>
    </div>

    

<?php require "views/components/footer.php" ?>