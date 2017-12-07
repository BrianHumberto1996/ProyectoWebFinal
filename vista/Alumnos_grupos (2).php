<?php
$agr = isset($_POST["agregar"]);
if($agr){
    require_once "../datos/GruposDao.php";
    $ob = new GruposDao();
    $ag = new AlumnosGrupo();
    $ag->noControl = $_POST["agregar"];
    $ag->idGrupo = $_GET["editar"];
    $ob->agregar($ag);
    
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

</form>
<span style="font-family: Arial; margin-left: 700px; font-weight: bold" >Juan Peres </span>
<button type="button" class="btn btn-outline-warning">cerrar secion</button>
</nav>
<h3>Grupo de Tutorias</h3>    
<div style="border: solid; border-color: black;">
    <span>tutor</span>
    
</div>
<a href="lista_gru2pos.php" type="button" class="btn btn-primary">Volver al grupo</a>    
<h2>Alumnos del grupo</h2>
    

    <?php
		require_once "../datos/AlumnosDao.php";
		$dao = new AlumnosDao();
		$lista = $dao->obtenerTodos($_POST["editar"]);

                
    
		if($lista != null){
			echo "<table id='tablita' class='table' border='1'>
			<thead class='thead-inverse'>
			  <tr>
            <th scope='col'>N° de Control</th>
				<th scope='col'>Alumno</th>
				<th scope='col'></th>
				<th scope='col'></th>
				<th scope='col'></th>
				
			  </tr>
			</thead>
			<tbody>";
			  foreach($lista as $ls){
				echo "<tr>
				<th scope='row'>".$ls->numcontrol."</th>
				<th>".$ls->nombre."</th>
				
                
                <th>
                <center>
                <form action='materias_alumnos.php' method='get'>
                <button type='submit' name='editar' value='".$ls->numcontrol."' class='btn btn-primary btn-lg'>
                <span class='fa fa-pencil fa-lg'></span>                
                Editar Materias
                </button>
                </form>
                </th>
                </center>
                
				<th>
                <center>
                <a href='reg_alumnos_grupo.php' class='btn btn-warning btn-lg'>
                <span class='fa fa-pencil fa-lg'></span>                
                Editar Horarios
                </a>
                </th>
                </center>

                <th>
                <center>
                <a href='reg_alumnos_grupo.php' class='btn btn-danger btn-lg'>
                <span class='fa fa-trash fa-lg'></span>                
                Eliminar
                </a>
                </th>
                </center>
				
                
                
                
               
				</tr>";
			  }
			echo "</tbody>
		  </table>";
		}
	?>

 <h2>Alumnos a añadir</h2>

     <?php
		include "../datos/CarrerasDao.php";
		$dao = new CarrerasDao();
		$lista = $dao->obtenerTodos();

                
    
		if($lista != null){
			echo "<table id='tablitita' class='table' border='1'>
			<thead class='thead-inverse'>
			  <tr>
            <th scope='col'>N° Control</th>
				<th scope='col'>Alumno</th>
				<th scope='col'>Carrera</th>
				<th scope='col'></th>
				
				
			  </tr>
			</thead>
			<tbody>";
			  foreach($lista as $ls){
				echo "<tr>
				<th scope='row'>".$ls->noControl."</th>
				<th>".$ls->alumno."</th>
				<th>".$ls->carrera."</th>
				
          
                
				<th>
                <center>
                <form action='' method='get'>
                <input name='editar' value='".$_GET["editar"]."' hidden='true'>
                <button class='btn btn-warning btn-lg' name='agregar' value='".$ls->noControl."'>
                <span class='fa fa-pencil fa-lg'></span>                
                Añadir al Grupo
                </a>
                </form>
                </th>
                </center>

             
				
                
                
                
               
				</tr>";
			  }
			echo "</tbody>
		  </table>";
		}
	?>





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

        <script>
            $(document).ready(function() {

                $("#tablita").dataTable({
                    "aoColumnDefs": [{
                        "bSortable": false,
                        "aTargets": [2, 3,4]
                    }],
                    "order": [
                        [0, "asc"],
                        [1, "asc"]
                    ],
                    "language": {
                        "url": "datatables/DataTables-1.10.16/js/jquery.datatables_i18n.spanish.json"
                    }
                });
            });

        </script>
    
       <script>
            $(document).ready(function() {

                $("#tablitita").dataTable({
                    "aoColumnDefs": [{
                        "bSortable": false,
                        "aTargets": [2, 3]
                    }],
                    "order": [
                        [0, "asc"],
                        [1, "asc"]
                    ],
                    "language": {
                        "url": "datatables/DataTables-1.10.16/js/jquery.datatables_i18n.spanish.json"
                    }
                });
            });

        </script>
    
   


</body>



</html>
