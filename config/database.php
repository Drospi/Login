<?php

//mysqli
try{

    $mysqli = new mySqli("localhost", "root","root", "login_db");
}catch(mysqli_sql_exception $e){
    echo "Error: " . $e->getMessage();
}
?>