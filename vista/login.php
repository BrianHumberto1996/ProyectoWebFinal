<?php

  $usuario = isset($_POST["user"], $_POST["pass"]);
  if($usuario){

    $nwCliente = new SoapClient("http://192.168.1.67:8010/WebServiceLogin.asmx?WSDL");
    $argl = array("usuario"=>$_POST["user"],"pass"=>$_POST["pass"]);
    $answ = json_decode($nwCliente->login($argl)->loginResult);
    if($answ != null){
      session_start();
      $_SESSION["usuario"] = $answ;
      echo "<script>location.href='home.php'</script>";

    }else{
      echo "<script>alert('noacceso');</script>";
    }
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


</form>

<form method="post">
<div class="form-group1" style="margin-left: 10px">
 <input type="text" class="form-control" id="usr" placeholder="Usuario" name="user">
</div>
<div class="form-group1" style="margin-left: 5px" >
 <input type="password" class="form-control" id="usr" placeholder="Contraseña" name="pass">
</div>
<button type="submit" class="btn btn-outline-danger">Iniciar Sesion</button>
    </form>
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
