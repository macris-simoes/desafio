<?php
session_start();
$_SESSION["addUser"] = $_POST;
session_destroy();
die();
require '../teste/validar-add-user-copy.php';

echo ('<pre>');
echo ("POST <br>");
print_r($_POST);
echo ("SESSION <br>");
print_r($_SESSION);
// print_r($temp);
// print_r($x);
echo ('</pre>');

?>


<!DOCTYPE html>
<html lang="pt-br">
<?php require('../includes/head.php'); ?>

<body>
    <?php //require('../includes/navbar.php'); ?>

    <div class="container col-">


        <!-- início div box da direita -->
        <div class="flex-row rounded mt-2">
            <h1 class="py-3">Cadastrar Usuário</h1>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="formGroupExampleInput1">Nome do usuário</label>
                    <span class="small error text-danger">* <?php echo $nomeErr; ?></span>
                    <input type="text" class="form-control" id="formGroupExampleInput1" name="nome" placeholder = "Inserir nome (apenas letras e espaços)" require>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">E-mail</label>
                    <span class="small error text-danger">* <?php echo $emailErr; ?></span>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder = "Inserir e-mail válido" require name="email">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput3">Senha</label>

                    <span class="small error text-danger">* <?php echo $senhaErr; ?></span>
                    <input type="password" class="form-control" id="formGroupExampleInput3" placeholder="ATENÇÃO: Senha com 4 a 6 números apenas" name="senha">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput4">Confirmar senha</label>
                    <span class="small error text-danger">* <?php echo $confsenhaErr; ?></span>
                    <input type="password" class="form-control" id="formGroupExampleInput4" placeholder="Confirmar senha" name="confsenha">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-block btn-outline-danger"> Enviar </button>
                </div>
            </form>
            <!-- fim div box da direita -->
        </div>
        <!-- fim da div row -->
    </div>


    <!-- <h1 class="text-center">Ele só manda no segundo clique :(</h1> -->
    </div>

</body>

</html>