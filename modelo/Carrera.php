<?php
	/**
	* 
	*/
	class Carrera
	{
		//Definiendo atributos
		public $id;
		public $carrera;
		public $nombrecorto;

		function __construct1(){}

		function __construct2($id,$carrera,$nombrecorto)
		{
			$this->id=$id;
			$this->carrera=$carrera;
			$this->nombrecorto=$nombrecorto;
		}

/*
		 public function set_id($id){
         $this->id=$id;
	     }

	     public function get_id(){
         return $this->id;
	     }

         public function set_carrera($carrera){
         $this->carrera=$carrera;
	     }

	     public function get_carrera(){
         return $this->carrera;
	     }

	      public function set_nombrecorto($nombrecorto){
         $this->nombrecorto=$nombrecorto;
	     }

	     public function get_nombrecorto(){
         return $this->nombrecorto;
	     }
*/

		
	}
?>