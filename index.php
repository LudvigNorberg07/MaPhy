<!DOCTYPE html>
<?php   require_once("assets.php")?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="theme.js"></script>
</head>
<body>
    <?php require_once("usefullThings/_nav.php") ?>
    <?php require_once("usefullThings/_header.php") ?>
    <?php
    if(isset($_SESSION['mess']) && $_SESSION['mess']!=""){
        echo $_SESSION['mess'] ?> Logged in as: <?php echo $_SESSION['user'];
    }
    ?>
    <main class="indexMain">
        <section>
            <h1>Study</h1>
            <p>LINK TO STUDY THINGS</p>
        </section>
        <section>
            <h1>WELCOME</h1>
            <p>ABOUT MaPhy</p>
        </section>
        <section>
            <h1>Discuss</h1>
            <p>LINK TO DISCUSSIONS </p>
        </section>
    </main>
    <?php require_once("usefullThings/_footer.php") ?>
</body>
</html>