<?php
if ($_SERVER["REQUEST_METHOD"] ==="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    require_once "../config/database.php";
    $res = $mysqli->query("select * from usuarios where username = '$username'");
    if($res->num_rows === 1){
        $userdata = $res->fetch_assoc();
        session_start();
        $_SESSION["user"]=$userdata["username"];
        header("Location: ../views/dashboard.php");
    } else{
        echo "No existe el usuario";
    }
}
?>