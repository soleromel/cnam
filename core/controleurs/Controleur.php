<?php
/**
 * Controleur
 **/
class Controleur{

	protected $requete;  				// Objet requete
	protected $modele;
    protected $vue;

	/**
	 * Constructeur
	 * @param $requete Objet requete de notre application
	 **/
	function __construct(){
		$this->requete = Fabrique::getFabrique()->getRequete(); 	// On référence l'objet $requete dans une variable d'instance pour la rendre disponible dans toute classe h�rit�e
	}

}
