<?php
class Requete{


	public $url; 	// URL appellé par l'utilisateur
	public $controleur;
	public $action;
	public $params;


	function __construct(){
		$req = $_SERVER['REQUEST_URI']; 			//totalit� de l'url
		$req = str_replace(BASE_URL , "" , $req );	//on supprime la base de l'url pour n'avoir que ce qui interesse le routeur
		$this->url = $req;
	}


}