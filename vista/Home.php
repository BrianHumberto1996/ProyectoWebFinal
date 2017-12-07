<?php
  session_start();
  $salir = isset($_POST["out"]);
  if($salir){
      unset($_SESSION["usuario"]);
  }

  $user = isset($_SESSION["usuario"]);
  if(!$user){
      echo "<script>location.href='Login.php' </script>";
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
<button type="button" class="btn btn-primary">Grupos</button>    

</form>
<span style="font-family: Arial; margin-left: 700px; font-weight: bold" ><?php echo $_SESSION["usuario"]->nombre; ?> </span>
<button type="button" class="btn btn-outline-warning" name="out">cerrar secion</button>

</nav>
    
    
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