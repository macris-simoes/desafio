<?php
session_start();
require ('validar-add-user.php');

// print_r($_SESSION);

$cadastro = file_get_contents("../json/cadastro.json");
$tempeditar = json_decode($cadastro, true);

//excluir
if (isset($_POST['excluir'])) {
    $posexcluir = array_search($_POST['id'], array_column($tempeditar, "id"));
    
    // print_r($tempeditar[$posexcluir]);
    unset($tempeditar[$posexcluir]);
    
    foreach($tempeditar as $t){
        $tempeditada[]=$t;}
        
    $inserirUserJson = json_encode($tempeditada, JSON_PRETTY_PRINT);
    
    // print_r($tempeditada);
    // exit();
    file_put_contents("../json/cadastro.json", $inserirUserJson);
    // header('location:editar-usuarios.php');
};
//fim excluir


//editar
if (isset($_GET['id'])) {
    $idGET = array_search($_GET['id'], array_column($tempeditar, "id"));    
}

if ((count($userErr) == 0) && isset($_POST['enviar'])) {
    $poseditar = array_search($_GET['id'], array_column($tempeditar, "id"));

    $user = [
        "id" => $tempeditar[$poseditar]['id'],
        "nome" => $_POST['nome'],
        "email" => $_POST['email'],
        "senha" => password_hash($_POST['senha'], PASSWORD_DEFAULT)
    ];

    $tempeditar[$poseditar] = $user;

    $inserirUserJson = json_encode($tempeditar, JSON_PRETTY_PRINT);
    file_put_contents("../json/cadastro.json", $inserirUserJson);
    header('location:editar-usuarios.php');
};
// fim editar

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php require('../includes/head.php'); ?>

<body>
    <?php require('../includes/navbar.php'); ?>

    <!-- início class container - div mãe de todas -->
    <div class="container mt-3">
        <!-- início da div row -->
        <div class="row">
            <!-- início da div do box lateral esquerda -->
            <div class=" flex-row border rounded col-4 ">
                <h3 class="border-bottom m-2">Editar usuários</h3>
                <!-- início da lista do box lateral  -->

                <ul class=" list-group list-group-flush ">
                    <?php foreach ($tempeditar as $P) { ?>
                        <li class="list-group-item d-flex ">
                            <div class="text-wrap col-md-8">
                                <?php
                                echo ($P['nome'] . "<br>");
                                echo ($P['email'] . "<br>");
                                ?>
                            </div>

                            <div class=" col-md-4 d-flex flex-column">
                                <a class="btn btn-danger btn-small mb-2" href="editar-usuarios.php?id=<?php echo $P['id']; ?>"> editar </a>
                                <form method="post">
                                    <input hidden value="<?php echo $P['id']; ?>" name="id">
                                    <button name="excluir" class="btn btn-warning btn-small mb-auto"> excluir </button>
                                </form>
                            </div>
                        </li>

                    <?php }; ?>
                    <!-- fim da lista do box lateral  -->
                </ul>
                <!-- fim da div do box lateral esquerda-->
            </div>

            <!-- início div box da direita -->

            <!-- PHP NO VALUE -->
            <div class="flex-row col-8 rounded mt-2">
                <form method="post">
                    <div class="form-group">
                        <label for="formGroupExampleInput1">Nome do usuário</label>
                        <span class="small error text-danger">* <?php echo $nomeErr; ?></span>
                        <input name="nome" type="text" class="form-control" id="formGroupExampleInput1" value="<?php if (isset($_GET['id'])) {
                                                                                                                    echo $tempeditar[$idGET]['nome'];
                                                                                                                } ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">E-mail</label>
                        <span class="small error text-danger">* <?php echo $emailErr; ?></span>
                        <input name="email" type="text" class="form-control" id="formGroupExampleInput2" value="<?php if (isset($_GET['id'])) {
                                                                                                                    echo $tempeditar[$idGET]['email'];
                                                                                                                } ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput3">Senha</label>
                        <span class="small error text-danger">* <?php echo $senhaErr; ?></span>
                        <input name="senha" type="password" class="form-control" id="formGroupExampleInput3">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput4">Confirmar senha</label>
                        <span class="small error text-danger">* <?php echo $confsenhaErr; ?></span>
                        <input name="confsenha" type="password" class="form-control" id="formGroupExampleInput4">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-block btn-outline-danger" name="enviar">Enviar</button>
                    </div>
                </form>

                <!-- fim div box da direita -->
            </div>
            <!-- fim da div row -->
        </div>
        <!-- fim class container - div mãe de todas -->
    </div>

</body>

</html>