<?php
session_start();
require '../includes/userSession.php';

print_r($_SESSION);



$produtos = file_get_contents("../json/produtos.json");
$tempListProd = json_decode($produtos, true);

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php require('../includes/head.php'); ?>

<body>
    <?php require('../includes/navbar.php'); ?>

    <!-- início divona -->
    <div class="container mt-2">
        <h1>Olá <?php echo $_SESSION['user']['nome'] . "!<br>" ?></h1>
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
                <?php if(empty($_SESSION['user'] ['produtos'])){
                    echo ("Você ainda não tem produtos cadastrados"); }else{ ?>
                <tr>
                    <?php foreach ($_SESSION['user']['produtos'] as $prod) {
                        $posicao = array_search($prod,$_SESSION['user']['produtos'])+1;?>
                                <th scope="row"> <?php echo $posicao; ?></td>
                                <td><?php echo ($prod['nomeprod']); ?></td>

                                <!-- //criar um popup balão com a descrição? -->

                                <td> <?php echo ($prod['descprod']); ?></td>
                                <td> <?php echo ($prod['precoprod']); ?></td>
                                <td>
                                    <a href="editar-produtos.php" class="button btn btn-danger text-light">editar</a>
                                    <a class="button btn btn-warning text-light">excluir</a>
                                </td>
                </tr>
            <?php } } ?>

            </tbody>
        </table>


        <!-- fim divona -->
    </div>



</body>

</html>