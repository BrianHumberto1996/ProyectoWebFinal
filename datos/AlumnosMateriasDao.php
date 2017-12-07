<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/AlumnosMaterias.php'; /*importa el modelo */
class AlumnosMateriasDao
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
	public function obtenerTodos($noC)
	{
		try
		{
            $this->conectar();

			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT id, materia, noControl FROM alumnos_materias where noControl = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

			$sentenciaSQL->execute([$noC]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new AlumnosMaterias();
                $obj->id = $fila->id;
	            $obj->materia = $fila->materia;
	            $obj->noControl = $fila->noControl;



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

			$sentenciaSQL = $this->conexion->prepare("SELECT id, materia, noControl FROM alumnos_materias WHERE id=?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);

            $registro = new AlumnosMaterias();
            $registro->id = $fila->id;
            $registro->materia = $fila->materia;
            $registro->noControl = $fila->noControl;



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

            $sentenciaSQL = $this->conexion->prepare("DELETE FROM alumnos_materias WHERE id = ?");

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
	public function agregar(AlumnosMaterias $obj)
	{
        $clave=0;
		try
		{
            $sql = "INSERT INTO alumnos_materias (materia,noControl) values(?, ?)";

            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(
                array($obj->materia,
						$obj->noControl));
            return true;
		} catch (Exception $e)
		{
			return false;
		}//finally{

            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
         //   Conexion::cerrarConexion();
       // }
	}




}
