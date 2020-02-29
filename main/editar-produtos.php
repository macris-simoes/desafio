<?php
session_start();
// print_r($_SESSION);
require('validar-add-prod.php');

$produtos = file_get_contents("../json/produtos.json");
$tempeditar = json_decode($produtos, true);

if(isset($_GET['idprod'])){
    $idprodGET = array_search($_GET['idprod'], array_column($tempeditar,"idprod"));

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php require('../includes/head.php'); ?>

<body>
    <?php require('../includes/navbar.php'); ?>

    <!-- início divona -->
    <div class="container mt-2">
        <h3>Editar produto - tentei várias paradas, mas não consegui, então deletei. Foi mal :'(</h3>
        <form enctype="multipart/form-data" method="post" id="editprod">
            <div class="form-row ">
                <div class="flex-row col-md-8">
                    <label for="nome">Nome</label>
                    <input type="text" class=form-control name="nomeprod" value="<?php if (isset($_GET['idprod'])) {echo $tempeditar[$idprodGET]['nomeprod'];} ?>">
                
                    <label for="nome">Preço</label>
                    <input type="text" class=form-control name="precoprod" value="<?php if (isset($_GET['idprod'])) {echo $tempeditar[$idprodGET]['precoprod'];} ?>">
                
                    <label>Descrição</label>
                    <textarea name = "descprod" class="form-control" form="editprod" rows="2"><?php if (isset($_GET['idprod'])) {echo $tempeditar[$idprodGET]['descprod'];} ?></textarea>
                </div>
                              
                <div class=" flex-row col-4 text-center">
                    <div>
                    <label for="imgprod">Imagem anterior</label>
                    </div>
                    <img class="col-12 mb-2" name="imgprod" id="imgprod" src="<?php if (isset($_GET['idprod'])) {echo $tempeditar[$idprodGET]['imgprod'];} ?>" class="img-fluid" alt="imagem">
                </div>
                
            </div>
            <button type="submit" class="mt-3 btn btn-sm btn-block btn-outline-danger" name="enviarProd"> Enviar </button>
        </form>





        <!-- fim divona -->
    </div>

<?php }else{
        echo "Acho que você não deveria estar aqui, num deu tempo de mexer no navbar, volta lá e clica em editar, bebê, beijos";
    }
?>
</body>

</html>