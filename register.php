<html lang="en">
<?php
require_once("assets.php");

if(isset($_POST['Registerbtn'])){
    $realname = $_POST['realname'];
    $username = $_POST['user'];
    $password = md5($_POST['pass']);
    $mail = $_POST['email'];
    $sql= "INSERT INTO users(username, password, name, mail) VALUES ('$username','$password','$realname','$mail')";
    $result=mysqli_query($conn, $sql);
    $_SESSION['mess']="Successfully registerd account!";
    $_SESSION['user']=$row['username'];
    $_SESSION['level']=$row['userlevel'];
    $_SESSION['id']=$row['id'];
    header("Location: index.php");
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <script src="https://cdn.jsdelivr.net/npm/js-md5@0.8.3/src/md5.min.js"></script>
</head>
<body>
    <div>
        <h1>Register</h1>
        <form action="register.php" method="post">
            <input type="test" name="realname" id="realname" placeholder="Real name">
            <input type="text" name="user" id="user" placeholder="username">
            <input type="password" name="pass" id="pass" placeholder="password">
            <input type="email" name="email" id="email" placeholder="abc123@gmail.com">
            <button type="submit" name="Registerbtn"> Register </button>
            <p>If you already have an account <a href="login.php">Log in here!</a></p>
            <?= $_SESSION['mess']; ?>
        </form>

    </div>
</body>
</html>
<script>
    //validate if username is taken
    const username=document.getElementById('user');
    names=[
        <?php
            $sql="SELECT username FROM users";
            $result=mysqli_query($conn, $sql);
            while($row=mysqli_fetch_assoc($result)): ?>
                "<?=md5($row['username'])?>",
        <?php endwhile; ?>
    ]
    username.addEventListener("input", function(){
        if(names.includes(md5(username.value))){
            username.setCustomValidity("Username is already taken");
            username.reportValidity();

        }else{
            username.setCustomValidity("");
            username.reportValidity();
        }
    });  
    const mail=document.getElementById('email');
    mails=[
        <?php
            $sql="SELECT mail FROM users";
            $result=mysqli_query($conn, $sql);
            while($row=mysqli_fetch_assoc($result)): ?>
                "<?=md5($row['mail'])?>",
        <?php endwhile; ?>
    ]
    mail.addEventListener("input", function(){
        if(mails.includes(md5(mail.value))){
            mail.setCustomValidity("Email is already used by another account");
            mail.reportValidity();

        }else{
            mail.setCustomValidity("");
            mail.reportValidity();
        }
    }); 
</script>