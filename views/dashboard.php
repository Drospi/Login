<?php
session_start();
if(!isset($_SESSION["user"])){
    echo "Debes iniciar sesion primero";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido <?php echo $_SESSION["user"]?></h1>

    <a href="../handle_db/logout.php">Logout</a>
</body>
</html>