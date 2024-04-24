<?php require "views/components/head.php" ?>
    <?php require "views/components/navbar.php" ?>
    <div class="item">
    <h1>Add book</h1>
    <form method="POST">
        <label>Nosaukums:
            <input name='name' />
        </label>
        <label>Autors:
            <input name='author' />
        </label>
        <label>gads:
            <input type="date" name='year'/>
        </label>
        <label>pieejamiba:
            <input type="checkbox" name='availability'/>
        </label>
        <button >Submit</button>
    </form>
    </div>
<?php require "views/components/footer.php" ?>