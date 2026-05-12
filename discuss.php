<!DOCTYPE html>
<?php
require_once("assets.php");

//Skickar meddelandet i databasen
if(isset($_POST['sendmsg'])){
    $message=fix($_POST['msg']);
    $userid=$_SESSION['id'];
    $chatid=$_POST['chatid'];
    $sql="INSERT INTO messages (userid,message,chatid) VALUES ($userid,'$message',$chatid)";
    $result=mysqli_query($conn, $sql);
    header("Location: discuss.php/#" .$_POST['chatid']); //MÅSTE FIXA NÄSTA GÅNG
    exit();
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/discuss.css">
    <script src="theme.js"></script>
</head>
<body>
    <?php require_once("usefullThings/_nav.php")?>
    <?php require_once("usefullThings/_header.php")?>

    <main class="discussMain">

        <section id="search">SEARCH FIELD + Filter</section>

        <!--Hämtar alla chattar-->
        <?php
        $sql = "SELECT * FROM chat";
        $chatResult = mysqli_query($conn, $sql); 
        while($row=mysqli_fetch_assoc($chatResult)): ?>

            <!--Skriver ut alla chattar-->
            <details class="expand">
                <summary class="title" id="<?=$row['id']?>"><p><?=$row['rating']?></p>&nbsp;&nbsp;<h1><?=$row['chatname']?></h1><div class="filler"></div><p><?=$row['Ma/Phy']?></p></summary>
                <p class="title"><?=$row['description']?></p>

                <!--Skriver ut meddelanden i chatten-->
                <?php
                $sql="SELECT * FROM messages WHERE chatid={$row['id']}";
                $resultMessage=mysqli_query($conn, $sql);
                while($rowMessage=mysqli_fetch_assoc($resultMessage)):?>
                    <?php 
                    $sql="SELECT username FROM users WHERE id={$rowMessage['userid']}"; //Hämtar username
                    $username=mysqli_query($conn, $sql);
                    $username=mysqli_fetch_assoc($username);
                    ?>
                    <p class="message"><?=$username['username']?>: <?=$rowMessage['message'];?></p> <!--Skriver username + meddelande-->
                <?php endwhile;?>

                <form action="discuss.php" method="post">
                    <input type="text" id="msg" name="msg" placeholder="Send message" required> <!--Meddelande-->
                    <input type="hidden" id="chatid" name="chatid" value="<?=$row['id']?>"> <!--Vilken chatt skcikas det i?-->
                    <button type="submit" name="sendmsg">Send</button>
                </form>
            </details>

        <?php endwhile;?>
    </main>

    <?php require_once("usefullThings/_footer.php")?>
</body>
</html>