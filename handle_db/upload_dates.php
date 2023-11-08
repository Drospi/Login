
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
    
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $bio = $_POST["bio"];
    $phone = $_POST["phone-number"];
    $id = $_POST['id'];
    $tmp_name = $_FILES["file-profile-upload"]["tmp_name"];
    $hash_contra = password_hash($password,PASSWORD_DEFAULT);
    //subiendo datos
    require_once "../config/database.php";
    if($tmp_name!=''){
        $contenido = addslashes(file_get_contents($tmp_name));
        $mysqli->query("UPDATE usuarios SET img_blob='$contenido'  WHERE id='$id'");
    }
    $mysqli->query("UPDATE usuarios SET name='$name',password='$hash_contra', email='$email', bio='$bio', phone='$phone'  WHERE id='$id'");
    $res = $mysqli->query("select * from usuarios where email = '$email'");
    $userdata = $res->fetch_assoc();
    $hash = $userdata['password'];
    $_SESSION["user"]=$userdata["name"];
    $_SESSION["password"]=$password;
    $_SESSION["email"]=$userdata["email"];
    $_SESSION["bio"]=$userdata["bio"];
    $_SESSION["phone"]=$userdata["phone"];
    $_SESSION["id"]=$userdata["id"];
    $_SESSION["photo"]=$userdata['img_blob'];
    header("refresh:5;url=../views/dashboard.php");
    
echo "<main class='grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8'>";
echo "  <div class='text-center'>";
echo "    <h1 class='mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl'>Datos editados exitosamente</h1>";
echo "    <p class='mt-6 text-base leading-7 text-gray-600'>Se te redirigira en 5s o puedes hacerlo manualmente</p>";
echo "    <div class='mt-10 flex items-center justify-center gap-x-6'>";
echo "      <a href='../views/dashboard.php' class='rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>Regresar</a>";
echo "    </div>";
echo "  </div>";
echo "</main>";
}
header("refresh:5;url=../views/dashboard.php");
?>
</body>
</html>