<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/HorariosAlumnos.php'; /*importa el modelo */
class HorariosAlumnosDao
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

			$sentenciaSQL = $this->conexion->prepare("SELECT id, noControl, dia,horario_de,horario_a FROM horarios_alumnos"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new HorariosAlumnos();
                $obj->id = $fila->id;
	            $obj->noControl = $fila->noControl;
	            $obj->dia = $fila->dia;
	            $obj->horario_de = $fila->horario_de;
	            $obj->horario_a = $fila->horario_a;


                
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
            
			$sentenciaSQL = $this->conexion->prepare("SELECT id, noControl, dia,horario_de,horario_a FROM horarios_alumnos WHERE id=?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
               $obj = new HorariosAlumnos();
                $obj->id = $fila->id;
	            $obj->noControl = $fila->noControl;
	            $obj->dia = $fila->dia;
	            $obj->horario_de = $fila->horario_de;
	            $obj->horario_a = $fila->horario_a;
            
                
			
			return $registro;
		}
		catch(Exception $e){
            echo $e->getMessage();
            return null;
		 }//finally{
  //           Conexion::cerrarConexion();
  //       }
	}



	 //Elimina el alumno con el id indicado como parámetro
	public function eliminar($id)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM horarios_alumnos WHERE id = ?");			          
            
			$sentenciaSQL->execute(array($id));
            return true;
		} catch (Exception $e) 
		{
            return false;
		}//finally{
//            Conexion::cerrarConexion();
//        }
        
	}
    


  

    //Agrega un nuevo alumno a un grupo
	public function agregar(HorariosAlumnos $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO horarios_alumnos (noControl, dia,horario_de,horario_a) values(?, ?,?, ?)";
            
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(
                array($obj->noControl,
						$obj->dia,
						$obj->horario_de,
						$obj->horario_a)
                );
            $clave=$this->conexion->lastInsertId();
            return $clave;
		} catch (Exception $e) 
		{
			return $clave;
		}//finally{
            
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
         //   Conexion::cerrarConexion();
       // }
	}


    

}