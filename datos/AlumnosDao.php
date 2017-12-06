<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Alumno.php'; /*importa el modelo */
class AlumnosDao
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
	public function obtenerTodos($paco)
	{
		try
		{
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT a.noControl, concat(a.apellido2, ' ',a.apellido1,' ',a.nombre) as Alumno from alumnos a join alumnos_grupo ag on a.noControl = ag.noControl 
			join grupos_tutorias gt on ag.idGrupo = gt.id join tutores t on t.id = gt.idTutor where gt.id = ?;"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute([$paco]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Alumno();
                $obj->numcontrol = $fila->noControl;
	            $obj->nombre = $fila->Alumno;
	         

                
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
	public function obtenerUno($numcontrol)
 	{
		try
 		{ 
            $this->conectar();
            
 			$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
            
 			$sentenciaSQL = $this->conexion->prepare("SELECT noControl,nombre,apellido1,apellido2,idcarrera,vigente,correo FROM alumnos WHERE numcontrol=?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
 			$sentenciaSQL->execute([$numcontrol]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
             /*Obtiene los datos*/
 			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
             $registro = new Alumno();
             $registro->numcontrol = $fila->noControl;
             $registro->nombre = $fila->nombre;
             $registro->apellido1 = $fila->apellido1;
             $registro->apellido2 = $fila->apellido2;
             $registro->idcarrera = $fila->idcarrera;
             $registro->vigente = $fila->vigente;
             $registro->correo = $fila->correo;
                
		return $registro;
 		}
 		catch(Exception $e){
             echo $e->getMessage();
             return null;
	 }//finally{
           Conexion::cerrarConexion();
      }
 	}
    
//     //Elimina el alumno con el id indicado como parámetro
// 	public function eliminar($numcontrol)
// 	{
// 		try 
// 		{
// 			$this->conectar();
            
//             $sentenciaSQL = $this->conexion->prepare("DELETE FROM Alumnos WHERE numcontrol = ?");			          
            
// 			$sentenciaSQL->execute(array($numcontrol));
//             return true;
// 		} catch (Exception $e) 
// 		{
//             return false;
// 		}//finally{
// //            Conexion::cerrarConexion();
// //        }
        
// 	}

// 	//Función para editar al alumno de acuerdo al objeto recibido como parámetro
// 	public function editar(Alumno $obj)
// 	{
// 		try 
// 		{
// 			$sql = "UPDATE Alumnos SET 
//                     nombre = ?,
//                     apellido1 = ?,
//                     apellido2 = ?,
//                     idCarrera = ?,
// 					vigente= ?,
// 					correo= ?
// 				    WHERE numcontrol = ?";

//             $this->conectar();
            
//             $sentenciaSQL = $this->conexion->prepare($sql);			          
// 			$sentenciaSQL->execute(
// 				array(	$obj->nombre,
// 						$obj->apellido1,
// 						$obj->apellido2,
// 						$obj->idcarrera,
// 						$obj->vigente,
// 						$obj->correo,
// 						$obj->numcontrol)
// 					);
//             return true;
// 		} catch (Exception $e){
// 			echo $e->getMessage();
// 			return false;
// 		}//finally{
//            // Conexion::cerrarConexion();
//         //}
// 	}

// 	//Agrega un nuevo alumno de acuerdo al objeto recibido como parámetro
// 	public function agregar(Alumno $obj)
// 	{
//         $clave=0;
// 		try 
// 		{
//             $sql = "INSERT INTO Alumnos (numcontrol,nombre, apellido1, apellido2,idCarrera,vigente,correo) values(?, ?, ?, ?,?,?,?)";
            
//             $this->conectar();
//             $this->conexion->prepare($sql)
//                  ->execute(
//                 array($obj->numcontrol,
//                 	    $obj->nombre,
// 						$obj->apellido1,
// 						$obj->apellido2,
// 						$obj->idcarrera,
// 						$obj->vigente,
// 						$obj->correo));
//             $clave=$this->conexion->lastInsertId();
//             return $clave;
// 		} catch (Exception $e) 
// 		{
// 			return $clave;
// 		}//finally{
            
//             /*
//             En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
//             */
//          //   Conexion::cerrarConexion();
//        // }



// 	}
