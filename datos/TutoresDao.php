<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Tutores.php'; /*importa el modelo */
class TutoresDao
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
    
    
   /*Metodo que obtiene todos los Tutores de la base de datos, retorna una lista de objetos */
	public function obtenerTodos()
	{
		try
		{
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT id,nombre,apellido1,apellido2,correo,idcarrera FROM tutores"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Tutores();
                $obj->id = $fila->id;
	            $obj->nombre = $fila->nombre;
	            $obj->apellido1 = $fila->apellido1;
	            $obj->apellido2 = $fila->apellido2;
	            $obj->correo = $fila->correo;
	            $obj->idcarrera = $fila->idcarrera;
	            
	            

                
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
            
 			$sentenciaSQL = $this->conexion->prepare("SELECT id,nombre,apellido1,apellido2,correo,idcarrera FROM tutores WHERE id=?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
 			$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
             /*Obtiene los datos*/
 			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
             $registro = new Alumno();
             $registro->id = $fila->id;
             $registro->nombre = $fila->nombre;
             $registro->apellido1 = $fila->apellido1;
             $registro->apellido2 = $fila->apellido2;
             $registro->correo = $fila->correo;
             $registro->idcarrera = $fila->idcarrera;
            
                
		return $registro;
 		}
 		catch(Exception $e){
             echo $e->getMessage();
             return null;
	 }//finally{
           Conexion::cerrarConexion();
      }
 	}
    


