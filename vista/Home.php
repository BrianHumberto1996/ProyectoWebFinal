<?php
  session_start();
  $salir = isset($_POST["out"]);
  if($salir){
      unset($_SESSION["usuario"]);
  }

  $user = isset($_SESSION["usuario"]);
  if(!$user){
      echo "<script>location.href='Login.php'</script>";
  }
?>
<html>
<head>
    <meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.css">

</head>
<body>

<nav class="navbar navbar-inverse bg-primary">

<form class="form-inline my-2 my-lg-0">
<button type="button" class="btn btn-primary" style="font-size: 20px; font-weight: bold">Sistema de tutorias</button>
<button type="button" class="btn btn-primary">inicio</button>
<a href="lista_gru2pos.php" class="btn btn-primary">Grupos</a>

</form>
<span style="font-family: Arial; margin-left: 700px; font-weight: bold" ><?php echo $_SESSION["usuario"]->nombre; ?> </span>
<form class=""  method="post">
<button type="submit" class="btn btn-outline-warning" name="out">cerrar sesión</button>
</form>


</nav>

    <div class="container text-justify">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>
<footer class="bg-primary" style="position: absolute; bottom: 0; width: 100%; text-algin: center">
    <span>Francisco Avalos Murillo</span>
    <br>
    <span>Humberto Diaz</span>
    <br>
    <span>Jonathan Camacho Lopez</span>


</footer>

	<script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
