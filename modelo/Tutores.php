<?php
	/**
	* 
	*/
	class Tutores
	{
		//Definiendo atributos
		public $id;
		public $nombre;
		public $apellido1;
		public $apellido2;
        public $correo;
		public $idcarrera;

		

		function __construct1(){}

		function __construct2($id,$nombre,$apellido1,$apellido2,$correo,$idcarrera)
		{
			$this->id=$id;
			$this->nombre=$nombre;
			$this->apellido1=$apellido1;
			$this->apellido2=$apellido2;
			$this->correo=$correo;
			$this->idcarrera=$idcarrera;
			
		}


/*
		 public function set_id($id){
         $this->id=$id;
	     }

	     public function get_id(){
         return $this->id;
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


	     public function set_correo($correo){
         $this->correo=$correo;
	     }

	     public function get_correo(){
         return $this->correo;
	     }

*/
		
	}
?>