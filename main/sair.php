<?php
session_start();
if(isset($_SESSION)){
session_destroy();
header('location:logar.php');
die();
} else{ 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <h1> eita, algo está errado aqui tipsy </h1> 
 <img src="../img/tipsy.jpg" alt="">
</body>
</html>
<?php };?>