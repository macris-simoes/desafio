<?php
session_start();
require '../includes/userSession.php';

print_r($_SESSION);

// require ('validar-add-user.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php require('../includes/head.php'); ?>

<body>
    <?php require('../includes/navbar.php'); ?>
<!-- início divona -->
<h1>Olá <?php echo $_SESSION['nome'] . "!<br><br>" ?></h1>
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