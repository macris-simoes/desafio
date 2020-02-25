<?php

//personalização da sessão
$cadastro = file_get_contents("../json/cadastro.json");
$tempSession = json_decode($cadastro, true);

$nomeLogin = array_search($_SESSION['user']["email"], array_column($tempSession, "email"));



$_SESSION['user'] = $tempSession[$nomeLogin];

