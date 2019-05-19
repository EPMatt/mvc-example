<nav class="navbar navbar-expand-lg navbar-dark bg-primary text-center">
    <a class="navbar-brand" href="index.php">DBOrders!</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class='nav-item <?=isset($home)?"active":""?>'>
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class='nav-item <?=isset($about)?"active":""?>'>
                <a class="nav-link" href="about">About</a>
            </li>
            <?php if (isset($_SESSION['admin'])){?>
            <li class='nav-item <?=isset($users)?"active":""?>'>
                <a class="nav-link" href="users">Manage Users</a>
            </li>
            <?php } ?>
            <?php if (isset($_SESSION['user'])){?>
            <li class="nav-item">
                <a class="nav-link" href="logout">Logout</a>
            </li>
            <?php } ?>
        </ul>
    </div>
</nav>