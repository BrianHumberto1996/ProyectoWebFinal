<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Carrera.php'; /*importa el modelo */
require_once '../modelo/AlumnoCarrera.php';
class CarrerasDao
{
    
	private $conexion; /*Crea una variable conexion*/
        
    private function conectar(){
        try{
			$this->conexion = Conexion::abrirConexion(); /*inicializa la variable conexion, llamando el metodo abrirConexion(); de la clase Conexion por medio de una instancia*/
		}
		catch(Exception $e)
		{
			die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
		}
    }
    
    
   /*Metodo que obtiene todos las Carreras de la base de datos, retorna una lista de objetos */
	public function obtenerTodos()
	{
		try
		{
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare(" SELECT a.noControl, concat(a.apellido2, ' ',a.apellido1,' ',a.nombre) as Alumno,c.nombreCorto from alumnos a left join alumnos_grupo ag on a.noControl = ag.noControl left join 
 grupos_tutorias gt on ag.idGrupo = gt.id left join tutores t on t.id = gt.idTutor join carreras c on a.idCarrera = c.id where gt.actividad is null;"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new AlumnoCarrera();
                $obj->noControl = $fila->noControl;
	            $obj->carrera = $fila->nombreCorto;
	            $obj->alumno = $fila->Alumno;


                
				$lista[] = $obj;
			}
            
			return $lista;
		}
		catch(Exception $e){
			echo $e->getMessage();
			return null;
		}
		// finally
		// {
  //           Conexion::cerrarConexion();
  //       }
	}
    
    /*Metodo que obtiene un registro de la base de datos, retorna un objeto */
	public function obtenerUno($id)
	{
		try
		{ 
            $this->conectar();
            
			$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
            
			$sentenciaSQL = $this->conexion->prepare("SELECT id, carrera, nombreCorto FROM carreras WHERE id=?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $registro = new Carrera();
            $registro->id = $fila->id;
            $registro->carrera = $fila->carrera;
            $registro->nombreCorto = $fila->nombreCorto;
            
                
			
			return $registro;
		}
		catch(Exception $e){
            echo $e->getMessage();
            return null;
		 }//finally{
  //           Conexion::cerrarConexion();
  //       }
	}
    


    

}