<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Grupos.php'; /*importa el modelo */
require_once '../modelo/AlumnosGrupo.php';
class GruposDao
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

			$sentenciaSQL = $this->conexion->prepare(" SELECT gt.id as Clave, concat(t.nombre, ' ', t.apellido1, ' ', t.apellido2) as Tutor, actividad as Actividad,
   count(a.nocontrol) as noalumnos from grupos_tutorias gt
   left join tutores t on gt.idTutor = t.id left join alumnos_grupo ag on ag.idgrupo = gt.id
   left join alumnos a on a.nocontrol = ag.noControl group by gt.id;"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Grupos();
                $obj->clave = $fila->Clave;
	            $obj->tutor = $fila->Tutor;
	            $obj->actividad = $fila->Actividad;
	            $obj->No_Alumnos = $fila->noalumnos;



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


public function eliminar($id)
	{
		try
		{
			$this->conectar();

            $sentenciaSQL = $this->conexion->prepare("DELETE FROM grupos_tutorias WHERE id = ?");

			$sentenciaSQL->execute(array($id));
            return true;
		} catch (Exception $e)
		{
            return false;
		}//finally{
//            Conexion::cerrarConexion();
//        }

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



public function agregar(AlumnosGrupo $obj){

    $clave=0;
    try{
        $sql =  "INSERT INTO Alumnos_Grupo (noControl, idGrupo) values (?, ?)";

        $this->conectar();
        $this->conexion->prepare($sql)
        ->execute(
        array($obj->noControl, $obj->idGrupo));
        return true;



    } catch(Exception $e){


        return false;
    }



    }




}
