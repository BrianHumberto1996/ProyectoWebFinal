<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Empleado.php'; /*importa el modelo */
class EmpleadoDao
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
    
    
   /*Metodo que obtiene todos los alumnos de la base de datos, retorna una lista de objetos */
	public function obtenerTodos()
	{
		try
		{
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT EmployeeId, FirstName, LastName, City, BirthDate FROM Employees"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Empleado();
                $obj->id = $fila->EmployeeId;
	            $obj->nombre = $fila->FirstName;
	            $obj->apellido = $fila->LastName;
	            $obj->ciudad = $fila->City;
	            $obj->fecha_nacimiento = $fila->BirthDate;

                
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
            
			$sentenciaSQL = $this->conexion->prepare("SELECT EmployeeId, FirstName, LastName, City, BirthDate FROM Employees WHERE EmployeeId=?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $registro = new Empleado();
            $registro->id = $fila->EmployeeId;
            $registro->nombre = $fila->FirstName;
            $registro->apellido = $fila->LastName;
            $registro->ciudad = $fila->City;
            $registro->fecha_nacimiento = $fila->BirthDate;
                
			
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
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM Employees WHERE EmployeeId = ?");			          
            
			$sentenciaSQL->execute(array($id));
            return true;
		} catch (Exception $e) 
		{
            return false;
		}//finally{
//            Conexion::cerrarConexion();
//        }
        
	}

	//Función para editar al alumno de acuerdo al objeto recibido como parámetro
	public function editar(Empleado $obj)
	{
		try 
		{
			$sql = "UPDATE Employees SET 
                    FirstName = ?,
                    LastName = ?,
                    City = ?,
					BirthDate= ?
				    WHERE EmployeeId = ?";

            $this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare($sql);			          
			$sentenciaSQL->execute(
				array(	$obj->nombre,
						$obj->apellido,
						$obj->ciudad,
						$obj->fecha_nacimiento,
						$obj->id )
					);
            return true;
		} catch (Exception $e){
			echo $e->getMessage();
			return false;
		}//finally{
           // Conexion::cerrarConexion();
        //}
	}

	//Agrega un nuevo alumno de acuerdo al objeto recibido como parámetro
	public function agregar(Empleado $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO Employees (FirstName, LastName, City, BirthDate) values(?, ?, ?, ?)";
            
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(
                array($obj->nombre,
						$obj->apellido,
						$obj->ciudad,
						$obj->fecha_nacimiento));
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