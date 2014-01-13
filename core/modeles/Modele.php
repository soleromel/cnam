<?php
class Modele{

    protected $db;

	function __construct(){
        $this->db = Fabrique::getFabrique()->getConnexion();
	}

    protected function parseVarchar($string){
        $tabParse = preg_split("/,(\s)?/",$string );
        return $tabParse;
    }
    /*function getTemplate(id){

    }

    function getModule(id){

    }

    function getComposant(id){

    }
    */
}