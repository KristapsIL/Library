<?php require "views/components/head.php" ?>
<div class="logout">
    <p class="logout-text">Are you sure?</p>
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