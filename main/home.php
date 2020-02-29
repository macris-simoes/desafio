<?php
session_start();
require '../includes/userSession.php';

// print_r($_POST);


$produtos = file_get_contents("../json/produtos.json");
$tempListProd = json_decode($produtos, true);

//excluir
if(isset($_POST['excluirProd'])){
    
    
    $posexcluir = array_search($_POST['prod'], array_column($tempListProd,"idprod"));
    // print_r($posexcluir);
    
    unset($tempListProd[$posexcluir]);    
    //PAREI AQUI, TESTAR SE VAI FUNCIONAR, PORQUE TA APAGANDO TUDO DOS GATO TUDO CARAI
    
    // print_r($tempListProd);
    // exit();
    foreach($tempListProd as $prodtemp){
       $tempeditada[] = $prodtemp;
    }   
    $inserirProdJson = json_encode($tempeditada,JSON_PRETTY_PRINT);
    file_put_contents("../json/produtos.json",$inserirProdJson);
    header ('location:home.php');
}
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
                                    <form method="post">

                                        <a href="editar-produtos.php?idprod=<?php echo $prod['idprod']; ?>" class="button btn btn-danger text-light">editar</a>                                        
                                       
                                        <input hidden value="<?php echo $prod['idprod']; ?>" name="prod">
                                        <button name="excluirProd" class="btn btn-warning btn-small mb-auto"> excluir </button>
                                    </form>
                                </td>
                </tr>
            <?php } } ?>

            </tbody>
        </table>


        <!-- fim divona -->
    </div>



</body>

</html>