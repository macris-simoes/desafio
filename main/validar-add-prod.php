<?php

// definição de variáveis

$nomeprod = $precoprod = $descprod = $imgprod = "";
$nomeprodErr = $precoprodErr = $descprodErr = $imgprodErr = "";

$produto = [
  "nomeprod" => "",
  "precoprod" => "",
  "descprod" => "",
  "imgprod" => "",
];

$prodErr = [];

//função anti-hacker
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //nomeprod
  if (empty($_POST["nomeprod"])) {
    $nomeprodErr = "Nome é obrigatório";
  } else {
    $nomeprod = test_input($_POST['nomeprod']);
    if (!preg_match("/^[a-zA-Z0-9 ]+$/", $nomeprod)) {
      $nomeprodErr = "não utilizar caracteres especais";
      array_push($prodErr,1);
    } else {
      // $produto["nomeprod"]
      $nomeprod = $_POST['nomeprod'];
    };
  };
  //fim nomeprod

  //preço
  if (empty($_POST['precoprod'])) {
    $precoprodErr = "Preço é obrigatório";
  } else {
    $precoprod = test_input($_POST['precoprod']);
    if (!preg_match('^[0-9]+$^', $precoprod)) {
      $precoprodErr = "SÓ NÚMERO E PONTO";
    } else {
      // $user["precoProd"] 
      $precoprod = $_POST['precoprod'];
    };
  };
  //fim preço



}; //fim da IF SERVER




if (!empty($nomeprod && $precoprod)) {
  $prod = [
    "idprod" => count($tempProd)+1,
    "nomeprod" => $nomeprod,
    "precoprod" => $precoprod,
    "descprod" => $descprod,
    "imgprod" => $imgprod,
  ];

  $produtos = file_get_contents("../json/produtos.json");
  $tempProd = json_decode($produtos, true);
  $tempProd[] = $prod;
  $inserirProdJson = json_encode($tempProd, JSON_PRETTY_PRINT);
  file_put_contents("../json/produtos.json", $inserirProdJson);

  
};


print_r($tempProd);
?>
