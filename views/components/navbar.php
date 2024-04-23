<header>
    <nav>
    <a class="nav-link" href="/katalogs">Katalogs</a>
    <?php if($_SESSION["role"] == "admin"){ ?><a href="/add">ADD book</a><?php } ?>
    <a class="nav-link" href="/logout-screen">Logout</a>
    </nav>
</header> 