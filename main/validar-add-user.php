<?php

// definição de variáveis
$nome = $email = $senha = $confsenha =  "";
$nomeErr = $emailErr = $senhaErr = $confsenhaErr = "";
$userErr = [];

//função anti-hacker
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



//validação 1
if (isset($_POST['enviar'])) {
  //nome
  if (empty($_POST["nome"])) {
    $nomeErr = "Nome é obrigatório";
  } else {
    $nome = test_input($_POST['nome']);
    if (!preg_match("/^[a-zA-Z ]+$/", $nome)) {
      $nomeErr = "Apenas letras e espaços";
      array_push($userErr,1);
    } else {
      $nome = $_POST['nome'];
    };
  };
  //fim nome

  //email
  if (empty($_POST["email"])) {
    $emailErr = "Email é obrigatório";
  } else {
    $email = test_input($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Tem certeza que isso é um e-mail?";
      array_push($userErr,1);
    } else {
      $email = $_POST['email'];
    };
  };
  // fim email

  //senha
  if (empty($_POST['senha'])) {
    $senhaErr = "Senha é obrigatório";
  } else {
    $senha = test_input($_POST['senha']);
    if (!preg_match('^[0-9]{4,6}+$^', $senha)) {
      $senhaErr = "Manx, tem que ser no mínimo 4 e no máximo 6 números, SÓ NÚMERO";
      array_push($userErr,1);
    } else {
      $senha = $_POST['senha'];
    };
  };
  //fim senha

  //confsenha
  if (empty($_POST["confsenha"])) {
    $confsenhaErr = "confsenha é obrigatório";
  } else {
    $confsenha = test_input($_POST['confsenha']);
    if ($senha !== $confsenha) {
      $confsenhaErr = "tem que ser igual a senha";
      array_push($userErr,1);
    } else { 
      $confsenha = $_POST['confsenha']; 
    };
    //fim confsenha

    }; //fim da validação 1

  };