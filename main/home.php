<?php
session_start();

print_r($_SESSION);

//personalização de página
$cadastro = file_get_contents("../json/cadastro.json");
$tempSession = json_decode($cadastro, true);
$_SESSION['nome'] = $tempSession[0]['nome'];


require ('validar-add-user.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php require('../includes/head.php'); ?>

<body>
    <?php require('../includes/navbar.php'); ?>
<!-- início divona -->
<div class="container mt-2">
    <h3>Lista de produtos</h3>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Descrição </th>
            <th> Preço </th>
            <th> Ações </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</td>
            <td>Produto 1</td>
            <td>Produto 1</td>
            <td> 20,00</td>
            <td> 
            <button type="button" class="btn btn-danger">editar</button>
            <button type="button" class="btn btn-warning">excluir</button>
            </td>
        </tr>
    </tbody>
</table>


<!-- fim divona -->
</div>



</body>
</html>