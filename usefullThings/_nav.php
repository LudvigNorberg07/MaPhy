
<nav>
    <a href="index.php">Home</a>
    <a href="study.php">Study</a>
    <a href="discuss.php">Discuss</a>
    <a href="contact.php">Contact</a>

    <?php if(!isLevel(10)):?>
        <a href="login.php">Login</a>
    <?php else: ?>
        <a href="login.php?logout=1">Logout</a>
    <?php endif; ?>
    
    <div class="changeTheme">
        <button data-theme="light">☀️</button>
        <button data-theme="dark">🌙</button>
        <button data-theme="auto">⚙️</button>
    </div>
</nav>

    
