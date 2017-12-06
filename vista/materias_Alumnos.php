<?php
    if(isset($_POST["materia"])){
        require_once "../datos/AlumnosMateriasDao.php";
        $ob = new ALumnosMateriasDao();
        $alumno = new AlumnosMaterias();
        $alumno->materia = $_POST["materia"];
        $alumno->noControl = $_GET["editar"];
        $ob->agregar($alumno);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>


    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/estilos.css">
    
    <link rel="stylesheet" href="datatables/DataTables-1.10.16/css/dataTables.bootstrap4.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body>
 
<nav class="navbar navbar-inverse bg-primary">
    
<form class="form-inline my-2 my-lg-0">
<button type="button" class="btn btn-primary" style="font-size: 20px; font-weight: bold">Sistema de tutorias</button>
<button type="button" class="btn btn-primary">inicio</button>
<a  href="Alumnos_grupos (2).php" type="button" class="btn btn-primary">Grupos</a>

</form>
<span style="font-family: Arial; margin-left: 700px; font-weight: bold" >Juan Peres </span>
<button type="button" class="btn btn-outline-warning">cerrar secion</button>
</nav>
<h3>Registro de materias para el alumno</h3>    
<div style="border: solid; border-color: black;">
    <span>tutor</span>
    <span>jorge Guzman</span>
    <span>tutor</span>
    
</div>

<div class="form-group" style="width: 300px;">
    
<form method="post">
<select class="form-control" id="sel2" name="guardar">
  <?php
        require_once "../datos/AlumnosDao.php";
        $dao = new AlumnosDao();
        $al = $dao->obtenerUno($_POST["usuario"]);
        
        $client = new SoapClient("http://http://192.168.1.157:8010/WebServiceLogin.asmx?WSDL");
        $ar = array("idCarrera"=>$al->idcarrera);
        var_dump($ar);
        $result = json_decode($client->Materias($ar)->MateriasPorCarreraResult);
        if($result != null){
            foreach($result as $materia){
                echo "<option value='".$materia->nombre."'>$materia->nombre</option>";
            }
        }
    ?>
  </select>      

<button type="submit" class="btn btn-success">Agregar</button> 
</form>
    </div>
<button type="button" class="btn btn-primary">Volver al grupo</button>    
<h2>Alumnos del grupo</h2>
    
<table class="table table-hover table-inverse">
  <thead>
    <tr>
      <th><b>Materia</b></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Redes</td>
    </tr>
    <?php
      require_once "../datos/AlumnosMateriasDao.php";
        $ob = new ALumnosMateriasDao();
        $lista = $ob->obtenerTodos($_GET["editar"]);
        foreach($lista as $row){
            echo "<tr><td>".$row->materia."</td></tr>";
        }
      ?>
  </tbody>
</table>



<footer class="bg-primary" style="position: relative; bottom: 0; width: 100%; text-algin: center">
    <span>Francisco Avalos Murillo</span>
    <br>
    <span>Humberto Diaz</span>
    <br>
    <span>Jonathan Camacho Lopez</span>
    
    
</footer>

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script src="datatables/DataTables-1.10.16/js/jquery.dataTables.js"></script>
        <script src="datatables/DataTables-1.10.16/js/dataTables.bootstrap4.js"></script>

       
   


</body>



</html>