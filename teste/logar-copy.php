<?php
session_start();
// session_destroy();
// die();

require '../main/validar-add-user.php';

print_r($_POST);
print_r($_SESSION);


$cadastro = file_get_contents("../json/cadastro.json");
$templogar = json_decode($cadastro, true);

//Se o POST foi enviado
if (isset($_POST["enviar"])) {
   
   // Se o POST foi enviado, vai ver se o EMAIL está no json
   $emailCheck = array_search($_POST["email"], array_column($templogar, "email"));
   
   // se o e-mail ESTÁ NO JSON
   if ($emailCheck !== false) {
      
      //se o e-mail está no JSON, vai checar senha
      $hash = $templogar[$emailCheck]['senha'];
      $senhaCheck = password_verify($_POST['senha'], $hash);
      $senhaErr = "Ixi manx, sei não, confere a senha aí";
      
      //se o e-mail está no JSON e a senha tá certa
      if ($senhaCheck == true) {
         header('location:home-copy.php');
      } else {
         $emailErr = "O e-mail tava certo, mas a senha não";
      };
      //se o email NÃO ESTÁ NO JSON
   } else {
      $emailErr = "e-mail não cadastrado";
   };
}

$_SESSION['email'] = $_POST['email'];
?>

<!DOCTYPE html>
<html lang="pt-br">
   <?php require('../includes/head.php'); ?>
   
   <body>
      <?php require('../includes/navbar.php'); ?>
      
      <div class="container col-4">
         <form method="POST">
            
            <div class="card-body border mt-5">
               <div class="form-group">
                  <label for="formGroupExampleInput2">E-mail</label>
                  <span class="small error text-danger">* <?php echo $emailErr; ?></span>
                  <input type="text" class="form-control" id="formGroupExampleInput2" name="email" <?php if (isset($_POST['email'])) { ?> value="<?php echo $_POST['email'];} ?>">
               </div>
               <div class="form-group">
                  <label for="formGroupExampleInput3">Senha</label>
                  <span class="small error text-danger">* <?php echo $senhaErr; ?></span>
                  <input type="password" class="form-control" id="formGroupExampleInput3" name="senha">
               </div>
               <div>
                  <button type="submit" class="btn btn-danger btn-block" name="enviar">Vamos lá!
                     </button>
                  </div>
                  <div class="small">
                     <a href="adicionar-usuarios.php"> Ainda não tem login? Clica aqui e faz, migue!</a>
            </div>
         </div>
      </form>
   </div>
</body>

</html>