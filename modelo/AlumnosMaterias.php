<?php
	/**
	* 
	*/
	class AlumnosMaterias
	{
		//Definiendo atributos
		public $id;
		public $materia;
		public $noControl;

		function __construct1(){}

		function __construct2($id,$materia,$noControl)
		{
			$this->id=$id;
			$this->materia=$materia;
			$this->noControl=$noControl;
		}

/*

		 public function set_id($id){
         $this->id=$id;
	     }

	     public function get_id(){
         return $this->id;
	     }

         public function set_materia($materia){
         $this->materia=$materia;
	     }

	     public function get_materia(){
         return $this->materia;
	     }

	      public function set_noControl($noControl){
         $this->noControl=$noControl;
	     }

	     public function get_noControl(){
         return $this->noControl;
	     }
	     */


		
	}
?>