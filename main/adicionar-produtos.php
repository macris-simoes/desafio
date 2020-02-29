<?php
session_start();

require('validar-add-prod.php');

if ((count($prodErr) == 0) && isset($_POST['enviarProd'])) {

    if (!empty($_POST['nomeprod']) && !empty($_POST['precoprod']) && !empty($_FILES['imgprod'])) {


        $produto = file_get_contents("../json/produtos.json");
        $tempProd = json_decode($produto, true);

        $prod = [
            "id" => $_SESSION['user']['id'],
            "idprod" => microtime(true) * 1000000,
            "nomeprod" => $nomeprod,
            "precoprod" => $precoprod,
            "descprod" => $descprod,
            "imgprod" => $imgprod,
        ];
        $tempProd[] = $prod;
        $inserirProdJson = json_encode($tempProd, JSON_PRETTY_PRINT);
        file_put_contents("../json/produtos.json", $inserirProdJson);

        $_SESSION['user']['produtos'] = $prod;
        unset($_POST['enviarProd']);
    }
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<?php require('../includes/head.php'); ?>

<body>
    <?php require('../includes/navbar.php'); ?>


    <!-- início divona -->
    <div class="container mt-2">
        <h3>Adicionar produto</h3>
        <form method="post" enctype="multipart/form-data" id="addprod">
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
                <textarea class="form-control" form="addprod" rows="3" " name="descprod"></textarea>
                
            </div>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="imgprod">
                    <label class="custom-file-label" for="inputGroupFile04">Escolher arquivo</label>
                </div>
            </div>
            <span class="small error text-danger">* <?php echo $imgprodErr; ?></span>
            <button type="submit" class="btn btn-sm btn-block btn-outline-danger mt-1" name="enviarProd"> Enviar </button>
        </form>
        <!-- fim divona -->
    </div>

    <?php
    // echo ('<pre>');
    // print_r($_POST);
    // print_r($_SESSION);
    // print_r($_FILES);
    // echo ('</pre>');
    ?>

</body>

</html>