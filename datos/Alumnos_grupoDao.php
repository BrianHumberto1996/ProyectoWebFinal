<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/AlumnosGrupo.php'; /*importa el modelo */
class Alumnos_grupoDao
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

			$sentenciaSQL = $this->conexion->prepare("SELECT id, noControl, idGrupo FROM alumnos_grupo"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new AlumnosGrupo();
                $obj->id = $fila->id;
	            $obj->noControl = $fila->noControl;
	            $obj->idGrupo = $fila->idGrupo;



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

			$sentenciaSQL = $this->conexion->prepare("SELECT id, noControl, idGrupo FROM alumnos_grupo WHERE id=?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);

            $registro = new AlumnosGrupo();
            $registro->id = $fila->id;
            $registro->noControl = $fila->noControl;
            $registro->idGrupo = $fila->idGrupo;



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

            $sentenciaSQL = $this->conexion->prepare("DELETE FROM alumnos_grupo WHERE noControl = ?");			          

			$sentenciaSQL->execute(array($id));
            return true;
		} catch (Exception $e)
		{
            return false;
		}//finally{
//            Conexion::cerrarConexion();
//        }

	}



    //Función para cambiar alumno de grupo
	public function editar(AlumnosGrupo $obj)
	{
		try
		{
			$sql = "UPDATE alumnos_grupo SET
                    idGrupo = ?,
				    WHERE id = ?";

            $this->conectar();

            $sentenciaSQL = $this->conexion->prepare($sql);
			$sentenciaSQL->execute(
				array(	$obj->idGrupo,
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


    //Agrega un nuevo alumno a un grupo
	public function agregar(AlumnosGrupo $obj)
	{
        $clave=0;
		try
		{
            $sql = "INSERT INTO alumnos_grupo (noControl, idGrupo) values(?, ?)";

            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(
                array($obj->noControl,
						$obj->idGrupo));
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
