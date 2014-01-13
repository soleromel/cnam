<?php
class Erreurs extends Exception{
	
	function __construct($natureErreur){
		$this->$natureErreur();
	}
	
	function erreur404(){
		echo 'ta mère';
		die();
	}
	
}