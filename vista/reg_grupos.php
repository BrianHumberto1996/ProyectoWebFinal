<?php
session_start();
$salir = isset($_POST["outt"]);
 if($salir){
     unset($_SESSION["usuario"]);
 }

 $user = isset($_SESSION["usuario"]);
 if(!$user){
     echo "<script>location.href='Login.php'</script>";
 }
if(isset($_POST["tutores"], $_POST["actividad"])){
    require_once "../datos/GrupotutoriasDao.php";
    $ob = new Grupotutorias();
    $ob->idtutor = $_POST["tutores"];
    $ob->actividad = $_POST["actividad"];
    $dao = new GrupotutoriasDao();
    $dao->agregar($ob);
    echo "<script>location.href='lista_gru2pos.php'</script>";
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
<a href="Home.php" type="button" class="btn btn-primary">inicio</a>
<a href="lista_gru2pos.php" type="button" class="btn btn-primary">Grupos</a>

</form>
<span style="font-family: Arial; margin-left: 700px; font-weight: bold" ><?php echo $_SESSION["usuario"]->nombre; ?></span>
<button type="button" class="btn btn-outline-warning">cerrar secion</button>

</nav>
    <h2>Grupo de Tutorias</h2>
    <form method="post">
    Tutor
    <div class="form-group" style="width: 78%">
        
    <select class="form-control" id="barra1" name="tutores">
    <?php 
    require_once "../datos/TutoresDao.php";
    $dao = new TutoresDao();
    $paco = $dao->obtenerTodos();
    foreach($paco as $lose){
        echo "<option value='".$lose->id."'>".$lose->nombre." ".$lose->apellido1." ".$lose->apellido2."</option>"; 
    } 
    ?> 
    </select>
        
    </div>
    Actividad
    <div class="form-group" style="width: 100%">
        
    <select class="form-control" id="barra1" name="actividad">
    <option>Asesorias</option>    
    <option>Turorias</option>    
    <option>Voleyball</option>    
     </select>
        
    <br>
    <br>
    
    <button type="submit" class="btn btn-primary">Guardar</button>
        
    
    <a href="lista_gru2pos.php" type="button" class="btn btn-success">Volver a los Grupos</a>
    
    </div>
        </form>
    
    
    
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