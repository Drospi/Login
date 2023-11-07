
<html>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] ==="POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    
    require_once "../config/database.php";
    $res = $mysqli->query("select * from usuarios where email = '$email'");
    $userdata = $res->fetch_assoc();
    $hash = $userdata['password'];
    if(password_verify($password, $hash)){
        session_start();
        $_SESSION["user"]=$userdata["name"];
        $_SESSION["password"]=$password;
        $_SESSION["email"]=$userdata["email"];
        $_SESSION["bio"]=$userdata["bio"];
        $_SESSION["phone"]=$userdata["phone"];
        $_SESSION["id"]=$userdata["id"];
        $_SESSION["photo"]=$userdata['img_blob'];
        header("Location: ../views/dashboard.php");
    } else{
   //     header("refresh:3;url=../index.php");
echo "<main class='grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8'>";
echo "  <div class='text-center'>";
echo "    <h1 class='mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl'>No existe el Usuario</h1>";
echo "    <p class='mt-6 text-base leading-7 text-gray-600'>Perdon no pudimos encontrar el usuario, deseas revisar tus datos o registrarte?</p>";
echo "    <div class='mt-10 flex items-center justify-center gap-x-6'>";
echo "      <a href='../index.php' class='rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>Iniciar Sesion</a>";
echo "      <a href='../views/signin.php' class='text-sm font-semibold text-gray-900'>Registrarse<span aria-hidden='true'>&rarr;</span></a>";
echo "    </div>";
echo "  </div>";
echo "</main>";
        
    }
}
?>
</body>
</html>
