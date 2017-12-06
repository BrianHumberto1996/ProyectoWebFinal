<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Grupotutorias.php'; /*importa el modelo */
class GrupotutoriasDao
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
    
    
   /*Metodo que obtiene todos las Grupos de tutorias de la base de datos, retorna una lista de objetos */
	public function obtenerTodos()
	{
		try
		{
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT id, idTutor, actividad FROM grupos_tutorias"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Grupotutorias();
                $obj->id = $fila->id;
	            $obj->idTutor = $fila->idTutor;
	            $obj->actividad = $fila->actividad;


                
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
            
			$sentenciaSQL = $this->conexion->prepare("SELECT id, idTutor, actividad FROM grupos_tutorias WHERE id=?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $registro = new Grupotutorias();
            $registro->id = $fila->id;
            $registro->idTutor = $fila->idTutor;
            $registro->actividad = $fila->actividad;
            
                
			
			return $registro;
		}
		catch(Exception $e){
            echo $e->getMessage();
            return null;
		 }//finally{
  //           Conexion::cerrarConexion();
  //       }
	}
    
    public function agregar($obj){
    
    $clave=0;
    try{
        $sql =  "INSERT into grupos_tutorias (idTutor, actividad) values(?, ?);";
        
        $this->conectar();
        $this->conexion->prepare($sql)
        ->execute(
        array($obj->idtutor, $obj->actividad));
        return true;
        
        
        
    } catch(Exception $e){
        
        
        return false;
    }
        
        
        
    }


    

}