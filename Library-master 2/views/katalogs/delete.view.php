<?php require "views/components/head.php" ?>
<div>
    <h1>Are you sure?</h1>
    <div class="buttons">
        <form action="/katalogs">
            <button>NO</button>
        </form>
        <form method="POST" action="/delete">                    
            <button name="id" value=" <?= $_GET['id'] ?>">yes</button>
        </form>
    </div> 
</div>

<?php require "views/components/footer.php" ?>