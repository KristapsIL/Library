<?php require "views/components/head.php" ?>
<div>
    <h1>Are you sure?</h1>
    <div class="buttons">
        <form action="/katalogs">
            <button>Back</button>
        </form>
        <form method="POST" action="/logout">                    
            <button>Logout</button>
        </form>
    </div> 
</div>

<?php require "views/components/footer.php" ?>