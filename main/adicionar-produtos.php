<?php
session_start();
print_r($_SESSION);

//personalização de página
$cadastro = file_get_contents("../json/cadastro.json");
$tempSession = json_decode($cadastro, true);
$_SESSION['nome'] = $tempSession[0]['nome'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php require('../includes/head.php'); ?>

<body>
    <?php require('../includes/navbar.php'); ?>
    <?php require('validar-add-prod.php'); ?>

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
                    <input type="text" class=form-control id="nomeprod">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="nome">Preço</label>
                    <input type="text" class=form-control id="precoprod">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" class="descprod"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Adicionar imagem </label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imgprod">
            </div <div class="form-group">
            <button type="button" class="btn btn-sm btn-block btn-outline-danger"> Enviar </button>
        </form>





        <!-- fim divona -->
    </div>

</body>

</html>