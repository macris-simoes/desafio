    <?php
session_start();
die();

if (!empty($_SESSION["addUser"])) {
    $_POST = $_SESSION["addUser"];
    header("location: home.php");
} elseif (!empty($_SESSION["login"])) {
    $_POST =  $_SESSION["login"];
    header("location: home.php");
}

$cadastro = file_get_contents("../json/cadastro.json");
$temp = json_decode($cadastro, true);


echo ('<pre>');
// echo ("POST <br>");
// print_r($_POST);
// echo ("SESSION <br>");
// print_r($_SESSION);
echo ("temp <br>");
print_r($temp);
// print_r($x);
echo ('</pre>');

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php require('../includes/head.php'); ?>

<body>
    <?php require('../includes/navbar.php'); ?>

    <!-- início class container - div mãe de todas -->
    <div class="container">
        <!-- início da div row -->
        <div class="row">
            <!-- início da div do box lateral esquerda -->
            <div class=" flex-row border rounded  col-4 ">
                <h3 class="border-bottom">Editar usuários</h3>
                <!-- início da lista do box lateral  -->

                <ul class=" list-group list-group-flush ">
                    <?php foreach ($temp as $P) { ?>
                        <li class="list-group-item d-flex ">
                            <div class="text-wrap col-md-8">
                                <?php
                                // tem que por foreach aqui, carai tipsy
                                echo ($P['nome'] . "<br>");
                                echo ($P['email'] . "<br>");
                                ?>
                            </div>
                            <div class=" col-md-4 d-flex flex-column ">
                                <button type="button" class="btn btn-danger btn-small mb-2"> editar </button>
                                <button type="button" class="btn btn-warning btn-small mb-auto"> excluir </button></div>
                        </li>

                    <?php }; ?>
                    <!-- fim da lista do box lateral  -->
                </ul>
                <!-- fim da div do box lateral esquerda-->
            </div>

            <!-- início div box da direita -->

            <!-- PHP NO VALUE -->
            <div class="flex-row col-8 rounded mt-2">
                <form>
                    <div class="form-group">
                        <label for="formGroupExampleInput1">Nome do usuário</label>
                        <input type="text" class="form-control" id="formGroupExampleInput1" placeholder="Example input placeholder">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">E-mail</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Example input placeholder">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput3">Senha</label>
                        <input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Another input placeholder">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput4">Confirmar senha</label>
                        <input type="text" class="form-control" id="formGroupExampleInput4" placeholder="Another input placeholder">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-sm btn-block btn-outline-danger">Enviar</button>

                    </div>
                </form>
                <!-- início div box da direita -->
            </div>
            <!-- fim da div row -->
        </div>
        <!-- fim class container - div mãe de todas -->
    </div>

</body>

</html>