<!DOCTYPE html>
<?php
require_once("assets.php");

if(isset($_GET['logout'])){
    $_SESSION['user']="";
    $_SESSION['level']="";
    $_SESSION['id']="";
    $_SESSION['mess']="";
    header("Location: index.php");
}
if(isset($_POST['Loginbtn'])){
    $user=$_POST['user'];
    $pass=md5($_POST['pass']);
    $sql="SELECT * FROM users WHERE ((username='$user') AND (password='$pass'))";
    $result=mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)===1){
        $row=mysqli_fetch_assoc($result);
        $_SESSION['mess']="Login successful";
        $_SESSION['user']=$row['username'];
        $_SESSION['level']=$row['userlevel'];
        $_SESSION['id']=$row['id'];
        header("Location: index.php");
    }else{
        $_SESSION['mess']="Login Failed! Leaking ip";
    }    
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div>
        <h1>LOGIN</h1>
        <form action="login.php" method="post">
            <input type="text" name="user" id="user" placeholder="username">
            <input type="password" name="pass" id="pass" placeholder="password">
            <button type="submit" name="Loginbtn"> Login </button>
            <p>If you dont have an account <a href="register.php">Create one here!</a></p>
            <?= $_SESSION['mess']; ?>
        </form>

    </div>
</body>
</html>