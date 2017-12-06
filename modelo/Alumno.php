<?php
	/**
	* 
	*/
	class Alumno
	{
		//Definiendo atributos
		public $numcontrol;
		public $nombre;
		public $apellido1;
		public $apellido2;
		public $idcarrera;
		public $vigente;
		public $correo;

		function __construct1(){}

		function __construct2($numcontrol,$nombre,$apellido1,$apellido2,$idcarrera,$vigente,$correo)
		{
			$this->numcontrol=$numcontrol;
			$this->nombre=$nombre;
			$this->apellido1=$apellido1;
			$this->apellido2=$apellido2;
			$this->idcarrera=$idcarrera;
			$this->vigente=$vigente;
			$this->correo=$correo;
		}

/*
		 public function set_numcontrol($numcontrol){
         $this->numcontrol=$numcontrol;
	     }

	     public function get_numcontrol(){
         return $this->numcontrol;
	     }

         public function set_nombre($nombre){
         $this->nombre=$nombre;
	     }

	     public function get_nombre(){
         return $this->nombre;
	     }

	      public function set_apellido1($apellido1){
         $this->apellido1=$apellido1;
	     }

	     public function get_apellido1(){
         return $this->apellido1;
	     }

	      public function set_apellido2($apellido2){
         $this->apellido2=$apellido2;
	     }

	     public function get_apellido2(){
         return $this->apellido2;
	     }

	     public function set_idcarrera($idcarrera){
         $this->idcarrera=$idcarrera;
	     }

	     public function get_idcarrera(){
         return $this->idcarrera;
	     }

	     public function set_vigente($vigente){
         $this->vigente=$vigente;
	     }

	     public function get_vigente(){
         return $this->vigente;
	     }

	     public function set_correo($correo){
         $this->correo=$correo;
	     }

	     public function get_correo(){
         return $this->correo;
	     }
	     */


		
	}
?>