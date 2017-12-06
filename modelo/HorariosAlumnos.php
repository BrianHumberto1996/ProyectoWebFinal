<?php
	/**
	* 
	*/
	class HorariosAlumnos
	{
		//Definiendo atributos
		public $id;
		public $noControl;
		public $dia;
		public $horario_de;
		public $horario_a;


		function __construct1(){}

		function __construct2($id,$noControl,$dia,$horario_de,$horario_a)
		{
			$this->id=$id;
			$this->noControl=$noControl;
			$this->dia=$dia;
			$this->horario_de=$horario_de;
			$this->horario_a=$horario_a;

		}


/*
		 public function set_id($id){
         $this->id=$id;
	     }

	     public function get_id(){
         return $this->id;
	     }

         public function set_noControl($noControl){
         $this->noControl=$noControl;
	     }

	     public function get_noControl(){
         return $this->noControl;
	     }

	      public function set_dia($dia){
         $this->dia=$dia;
	     }

	     public function get_dia(){
         return $this->dia;
	     }

	      public function set_horario_de($horario_de){
         $this->horario_de=$horario_de;
	     }

	     public function get_horario_de(){
         return $this->horario_de;
	     }

	     public function set_horario_a($horario_a){
         $this->horario_a=$horario_a;
	     }

	     public function get_horario_a(){
         return $this->horario_a;
	     }

*/

		
	}
?>