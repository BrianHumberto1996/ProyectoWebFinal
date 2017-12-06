<?php
	/**
	* 
	*/
	class Grupos
	{
		//Definiendo atributos
		public $clave;
		public $tutor;
		public $actividad;
		public $no_Alumnos;


		function __construct1(){}

		function __construct2($clave,$tutor,$actividad,$no_Alumnos)
		{
			$this->clave=$clave;
			$this->tutor=$tutor;
			$this->actividad=$actividad;
			$this->no_Alumnos=$no_Alumnos;
		}




		
	}
?>