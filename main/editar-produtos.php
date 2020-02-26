<?php 
session_start();
print_r($_SESSION);


?>
<!DOCTYPE html>
<html lang="pt-br">
<?php require('../includes/head.php'); ?>

<body>
   <?php require('../includes/navbar.php'); ?>
   
<!-- início divona -->
<div class="container mt-2">
        <h3>Editar produto</h3>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="nome">Nome</label>
                    <input type="text" class=form-control id="nome">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="nome">Preço</label>
                    <input type="text" class=form-control id="preco">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div>
            <img src="../img/imagem1.jpg" class="img-fluid" alt="imagem1.jpg">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Adicionar imagem </label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div
            <div class="form-group">
            <button type="button" class="btn btn-sm btn-block btn-outline-danger"> Enviar </button>
        </form>





    <!-- fim divona -->
    </div>

</body>
</html>