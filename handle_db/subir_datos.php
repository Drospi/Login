
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
if ($_SERVER["REQUEST_METHOD"]==="POST"){
    //datos
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $bio = $_POST["bio"];
    $phone = $_POST["phone-number"];
    
    $tmp_name = $_FILES["file-profile-upload"]["tmp_name"];
    $contenido = addslashes(file_get_contents($tmp_name));

    //subiendo datos
    require_once "../config/database.php";
    $mysqli->query("insert into usuarios(name,password, email, bio,phone, img_blob) values('$name', '$password', '$email', '$bio', '$phone','$contenido')");

echo "Datos subidos";
echo "<main class='grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8'>";
echo "  <div class='text-center'>";
echo "    <h1 class='mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl'>Datos subidos exitosamente</h1>";
echo "    <p class='mt-6 text-base leading-7 text-gray-600'>Se te redirigira en 5s o puedes hacerlo manualmente</p>";
echo "    <div class='mt-10 flex items-center justify-center gap-x-6'>";
echo "      <a href='../index.php' class='rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>Iniciar Sesion</a>";
echo "    </div>";
echo "  </div>";
echo "</main>";
}
header("refresh:5;url=../index.php");
?>
</body>
</html>
