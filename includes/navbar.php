<nav class="navbar navbar-expand-lg navbar-light bg-light">

<?php
// if(isset($_SESSION)){
//   $log = "#";
// } else{
//   $log = "logar.php";
// }
// ?>
// <?php //echo $log ?>

<a class="navbar-brand" href="logar.php"> Desafio PHP da macris</a>

<?php 
  if (isset($_SESSION)){ ?>
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adicionar-produtos.php">Adicionar produtos</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="editar-produtos.php">Editar produtos</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="adicionar-usuarios.php">Adicionar usuário</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="editar-usuarios.php">Editar usuário</a>
      </li>
      
    </ul>
  </div>
   
    <div>
      <a class="btn btn-light" name="sair" href="#"> Me tira daqui!</a>
    </div>
  <?php }; ?>

</nav>