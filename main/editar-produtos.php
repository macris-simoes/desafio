<?php
session_start();
//print_r($_SESSION);

require('validar-add-prod.php');

// if(isset($_GET{'idprod'}))




?>
<!DOCTYPE html>
<html lang="pt-br">
<?php require('../includes/head.php'); ?>

<body>
    <?php require('../includes/navbar.php'); ?>

    <!-- início divona -->
    <div class="container mt-2">
        <h3>Editar produto</h3>
        <form enctype="multipart/form-data" id="editprod">
            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="nome">Nome</label>
                    <input type="text" class=form-control name="nomeprod" value="<?php if (isset($_GET['idprod'])) {echo $tempeditar[$idprodGET]['nomeprod'];} ?>">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="nome">Preço</label>
                    <input type="text" class=form-control name="precoprod" value="<?php if (isset($_GET['idprod'])) {echo $tempeditar[$idprodGET]['precoprod'];} ?>">
                </div>
            </div>
            <div class="form-group">
                <label>Descrição</label>
                <textarea class="form-control" form="editprod" rows="3" value="<?php if (isset($_GET['idprod'])) {echo $tempeditar[$idprodGET]['descprod'];} ?>"></textarea>
            </div>
            <div>
                <img src="value="<?php if (isset($_GET['idprod'])) {echo $tempeditar[$idprodGET]['imgprod'];} ?>"" class="img-fluid" alt="imagem">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Adicionar imagem </label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div <div class="form-group">
            <button type="button" class="btn btn-sm btn-block btn-outline-danger"> Enviar </button>
        </form>





        <!-- fim divona -->
    </div>

</body>

</html>