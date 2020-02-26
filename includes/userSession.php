<?php
// session_start();

//personalização da sessão
$cadastro = file_get_contents("../json/cadastro.json");
$tempSession = json_decode($cadastro, true);

$nomeLogin = array_search($_SESSION['user']["email"], array_column($tempSession, "email"));

$_SESSION['user'] = $tempSession[$nomeLogin];


//produtos
$produto = file_get_contents("../json/produtos.json");
$tempProd = json_decode($produto,true);

$produtosDoId=[];
for($i=0; $i<count($tempProd);$i++){
    if($_SESSION['user']['id'] == $tempProd[$i]['id']){
   array_push ($produtosDoId,$tempProd[$i]);
}
}

$_SESSION['user']['produtos'] = $produtosDoId;
//CARAIIIII TIPSY
?>


