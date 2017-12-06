<?php
	/**
	* 
	*/
	class Grupotutorias
	{
		//Definiendo atributos
		public $id;
		public $idtutor;
		public $actividad;

		function __construct1(){}

		function __construct2($id,$idtutor,$actividad)
		{
			$this->id=$id;
			$this->idtutor=$idtutor;
			$this->actividad=$actividad;
		}


/*
		 public function set_id($id){
         $this->id=$id;
	     }

	     public function get_id(){
         return $this->id;
	     }

         public function set_idtutor($idtutor){
         $this->idtutor=$idtutor;
	     }

	     public function get_idtutor(){
         return $this->idtutor;
	     }

	      public function set_actividad($actividad){
         $this->actividad=$actividad;
	     }

	     public function get_actividad(){
         return $this->actividad;
	     }
*/

		
	}
?>