<?php

// definição de variáveis
$nomeprod = $precoprod = $descprod = $imgprod = "";
$nomeprodErr = $precoprodErr = $descprodErr = $imgprodErr = "";
$prodErr = [];


//função anti-hacker
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//validação
if (isset($_POST['enviarProd'])) {

  //nomeprod
  if (empty($_POST["nomeprod"])) {
    $nomeprodErr = "Nome é obrigatório";
  } else {
    $nomeprod = test_input($_POST['nomeprod']);
    if (!preg_match("/^[a-zA-Z0-9 ]+$/", $nomeprod)) {
      $nomeprodErr = "não utilizar caracteres especais";
      array_push($prodErr,1);
    } else {
      $nomeprod = $_POST['nomeprod'];
    };
  };
  //fim nomeprod

  //preço
  if (empty($_POST['precoprod'])) {
    $precoprodErr = "Preço é obrigatório";
  } else {
    $precoprod = test_input($_POST['precoprod']);
    if (!preg_match('^[0-9.]+$^', $precoprod)) {
      $precoprodErr = "SÓ NÚMERO E PONTO";
    } else {
      // $user["precoProd"] 
      $precoprod = $_POST['precoprod'];
    };
  };
  //fim preço

  //img

  if(empty($_FILES['imgprod']['name'])){
    $imgprodErr = "Imagem é obrigatória";
  } else{
    $imgprod = $_FILES['imgprod'];
    $caminho = $_FILES['imgprod']['tmp_name'];

    $img_content = file_get_contents($caminho);
    $imgSrc = "../img/".$_SESSION['user']['produtos']['idprod'].".jpg";
    file_put_contents($imgSrc,$img_content);
    





    // header('location:../includes/imgPost.php');
  };
    //fim img
  } //fim da validação





?>
