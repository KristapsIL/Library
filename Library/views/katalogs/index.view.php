<?php require "views/components/head.php" ?>
    <?php  require "views/components/navbar.php"; ?>
        <div class="container">
        <?php foreach($posts as $post){ ?>
            <div class="book">
                <p class="name"><a class="name-a" href="/show?id=<?= $post['id']?>"><?= $post["NAME"]?></a></p>
                <p class="ptext">By <?= $post["author"]?></p>
                <p class="ptext">released in <?= $post["YEAR"]?></p>
                <p class="ptext"><?= $post["availability"] == 1 ? "available" : "Not available"?></p>
                <div class="buttons">
                <?php if($post["availability"] == 1){ ?>
                    <form method="POST" action="/reserve">
                        <button name="id" value=" <?= $post['id'] ?>">Borrow</button>
                    </form>
                <?php } else {?>
                    <form method="POST" action="/putback">
                        <button name="id" value=" <?= $post['id'] ?>">Putback</button>
                    </form>
                <?php } ?>
                <?php if($_SESSION["role"] == "admin"){ ?>
                    <form method="POST" action="/delete">
                        <button name="id" value=" <?= $post['id'] ?>">Delete</button>
                    </form>
                <?php } ?>
                </div>
            </div>
        <?php } ?>
        </div>

    </form>

<?php require "views/components/footer.php" ?>