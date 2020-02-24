<?php
session_start();



print_r($_POST);
print_r($_SESSION);

require '../main/validar-add-user.php';


if ((count($userErr) == 0) && isset($_POST['enviar'])) {
    $cadastro = file_get_contents("../json/cadastro.json");
    $temp = json_decode($cadastro, true);

    //verificar se o email ja existe


    $user = [
        'id' => microtime(true) * 1000000,
        'nome' => $nome,
        'email' => $email,
        'senha' => password_hash($senha, PASSWORD_DEFAULT),
    ];

    $temp[] = $user;
    $inserirUserJson = json_encode($temp, JSON_PRETTY_PRINT);
    file_put_contents("../json/cadastro.json", $inserirUserJson);

    header('Location:home.php');
} else {
    echo ":(";
};

?>


<!DOCTYPE html>
<html lang="pt-br">
<?php require('../includes/head.php'); ?>

<body>
    <?php require('../includes/navbar.php'); ?>

    <div class="container col-">


        <!-- início div box da direita -->
        <div class="flex-row rounded mt-2">
            <h1 class="py-3">Cadastrar Usuário</h1>
            <form method="POST">

                <div class="invisible">
                    <input type="text" name="id">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput1">Nome do usuário</label>
                    <span class="small error text-danger">* <?php echo $nomeErr; ?></span>
                    <input type="text" class="form-control" id="formGroupExampleInput1" name="nome" placeholder="Inserir nome (apenas letras e espaços)" require>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">E-mail</label>
                    <span class="small error text-danger">* <?php echo $emailErr; ?></span>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Inserir e-mail válido" require name="email">
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
                    <button type="submit" class="btn btn-sm btn-block btn-outline-danger" name="enviar"> Enviar </button>
                </div>
            </form>
            <!-- fim div box da direita -->
        </div>
        <!-- fim da div row -->
    </div>

</body>

</html>