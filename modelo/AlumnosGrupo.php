<?php
	/**
	* 
	*/
	class AlumnosGrupo
	{
		//Definiendo atributos
		public $id;
		public $noControl;
		public $idGrupo;

		function __construct1(){}

		function __construct2($id,$noControl,$idGrupo)
		{
			$this->id=$id;
			$this->noControl=$noControl;
			$this->idGrupo=$idGrupo;
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

	      public function set_idGrupo($idGrupo){
         $this->idGrupo=$idGrupo;
	     }

	     public function get_idGrupo(){
         return $this->idGrupo;
	     }
	     */


		
	}
?>