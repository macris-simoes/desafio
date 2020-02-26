<?php
session_start();

require ('validar-add-prod.php');

if ((count($prodErr) == 0) && isset($_POST['enviarProd'])){

    if(!empty($_POST['nomeprod'])){

    
    $produto = file_get_contents("../json/produtos.json");
    $tempProd = json_decode($produto,true);
    
    $prod = [
        "id" => $_SESSION['user']['id'],
        "idprod" => microtime(true)*100000,
        "nomeprod" => $nomeprod,
        "precoprod" => $precoprod,
        "descprod" => $descprod,
        "imgprod" => $imgprod,
      ];
    $tempProd[] = $prod;
    $inserirProdJson = json_encode($tempProd,JSON_PRETTY_PRINT);
    file_put_contents("../json/produtos.json", $inserirProdJson);

    $_SESSION ['produtos'] = $prod;
    unset($_POST['enviarProd']);
} 
    
} else{ echo "carai tipsy";}


?>
<!DOCTYPE html>
<html lang="pt-br">
<?php require('../includes/head.php'); ?>

<body>
    <?php require('../includes/navbar.php'); ?>


    <!-- início divona -->
    <div class="container mt-2">
        <h3>Adicionar produto</h3>
        <form method="post">
            <div class="invisible">
                <input type="text" name="idprod">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="nome">Nome</label>
                    <span class="small error text-danger">* <?php echo $nomeprodErr; ?></span>
                    <input type="text" class=form-control name="nomeprod">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="nome">Preço</label>
                    <span class="small error text-danger">* <?php echo $precoprodErr; ?></span>
                    <input type="text" class=form-control name="precoprod">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" rows="3" name="descprod"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Adicionar imagem </label>
                <input type="file" class="form-control-file" name="imgprod">
            </div <div class="form-group">
            <button type="submit" class="btn btn-sm btn-block btn-outline-danger" name="enviarProd"> Enviar </button>
        </form>
        <!-- fim divona -->
    </div>

</body>

</html>