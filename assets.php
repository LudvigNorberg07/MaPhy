<?php
session_start();
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="MaPhy";
$conn=mysqli_connect($db_host, $db_user, $db_pass, $db_name);

//Kollar vilket userlevel en användare är
function isLevel($level){
    if(isset($_SESSION['level'])){
        if(intval($_SESSION['level']>=$level)){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
//Ser till att allt som skickas till databasen är säkert
function fix($str_raw){
    $str_raw=trim($str_raw);
    $str_raw=stripslashes($str_raw);
    $str_raw=htmlspecialchars($str_raw); 
    return $str_raw;
}
?>