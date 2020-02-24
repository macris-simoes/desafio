<?php
session_start();

if(isset($_POST['sair'])){
session_destroy();
header('location:logar.php');
} else{
    print_r($_SESSION);
}
?>
