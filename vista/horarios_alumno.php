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
<button type="button" class="btn btn-primary">Grupos</button>

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
<table width = "100%">
<tr>
    <th>Dia(s):</th>
    <th>De:</th>
    <th>A:</th>
</tr>    
<tr>
<td>
   <div class="form-group" style="width: 300px;">
<select class="form-control" id="select">
<option>LUN-VIE</option>    
<option>Sabado</option>    
<option>Domingo</option>        
</select>     
</div> 
    
</td>
<td>
     <div class="form-group" style="width: 300px;">
<select class="form-control" id="select">
<option>LUN-VIE</option>    
<option>Sabado</option>    
<option>Domingo</option>        
</select>     
</div>     
</td>
<td>
     <div class="form-group" style="width: 300px;">
<select class="form-control" id="select">
<option>LUN-VIE</option>    
<option>Sabado</option>    
<option>Domingo</option>        
</select>     
</div>     
</td>
    
</tr>    
    
</table>

<button type="button" class="btn btn-success">Agregar</button>  
<button type="button" class="btn btn-primary">Volver al Registro de alumnos</button>    
<h2>Horarios de asesorias de alumno</h2>
    
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
    <tr>
    
      <td>Calculo Diferencial</td>
    </tr>
    <tr>
      <td>Automatas</td>
    </tr>
  </tbody>
</table>

    <?php
		include "../datos/GruposDao.php";
		$dao = new GruposDao();
		$lista = $dao->obtenerTodos();

                
    
		if($lista != null){
			echo "<table id='tablita' class='table' border='1'>
			<thead class='thead-inverse'>
			  <tr>
            <th scope='col'>Dias</th>
				<th scope='col'>De</th>
				<th scope='col'>A</th>
				
				
			  </tr>
			</thead>
			<tbody>";
			  foreach($lista as $ls){
				echo "<tr>
				<th scope='row'>".$ls->clave."</th>
				<th>".$ls->tutor."</th>
				<th>".$ls->tutor."</th>
				
				
                
               
				
                
                
                
               
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