<?php
	/**
	* 
	*/
	class Empleado
	{
		//Definiendo atributos
		public $id;
		public $nombre;
		public $apellido;
		public $ciudad;
		public $fecha_nacimiento;

		function __construct1(){}

		function __construct2($id,$nombre,$apellido,$ciudad,$fecha_nacimiento)
		{
			$this->id=$id;
			$this->nombre=$nombre;
			$this->apellido=$apellido;
			$this->ciudad=$ciudad;
			$this->fecha_nacimiento=$fecha_nacimiento;
		}
	}
?>