 <?php


		if(isset($_POST["eliminar"])){
			require_once "../datos/GruposDao.php";
			$dao = new GruposDao();
			$re = $dao->eliminar($_POST["eliminar"]);
		    if(!$re){
          echo "<script>alert('El grupo a eliminar ya tiene alumnos');</script>";
        }
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
<a href="Home.php" type="button" class="btn btn-primary">inicio</a>
<a href="lista_gru2pos.php" type="button" class="btn btn-primary" >Grupos</a>

</form>
<span style="font-family: Arial; margin-left: 700px; font-weight: bold" > <?php    session_start(); echo $_SESSION["usuario"]->nombre; ?> </span>
<button type="button" class="btn btn-outline-warning">cerrar sesión</button>

</nav>


<a href="reg_grupos.php" style="margin-bottom:15px;" class='btn btn-success btn-lg'><span class="fa fa-plus fa-lg"></span>Agregar</a>


    <?php
        require_once "../datos/GruposDao.php";
		$dao = new GruposDao();
		$lista = $dao->obtenerTodos();



		if($lista != null){
			echo "<table id='tablita' class='table' border='1'>
			<thead class='thead-inverse'>
			  <tr>
				<th scope='col'>Clave</th>
				<th scope='col'>Tutor</th>
				<th scope='col'>Actividad</th>
				<th scope='col'>Número de alumnos</th>
				<th scope='col'></th>
				<th scope='col'></th>
			  </tr>
			</thead>
			<tbody>";
			  foreach($lista as $ls){
				echo "<tr>
				<th scope='row'>".$ls->clave."</th>
				<th>".$ls->tutor."</th>
				<th>".$ls->actividad."</th>
				<th>".$ls->No_Alumnos."</th>

				<th>
                <center>
                <form action='Alumnos_grupos (2).php' method='get'>
                <button name='editar' value='".$ls->clave."' class='btn btn-primary btn-lg'>
                <span class='fa fa-pencil fa-lg'></span>
                Editar
                </button>
                </form>
                </th>
                </center>

                <th>
                <center>
				<form method='post'>
                <button class='btn btn-danger btn-lg' name='eliminar' value='".$ls->clave."'>
                <span class='fa fa-trash fa-lg'></span>
                Eliminar
                </button>
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
                        "aTargets": [4, 5]
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
