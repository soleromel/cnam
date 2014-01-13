<?php
/**
 * Distributeur
 * Permet de charger le Controleur en fonction de la requête utilisateur
 **/
class Distributeur{

	/**
	 * Fonction principale du Distributeur
	 * Charge le Controleur en fonction du routage
	 **/
	function __construct(){

		$requete = Routeur::parse( Fabrique::getFabrique()->getRequete() );		// appel du routeur par la fonction static parse();
        Fabrique::getFabrique()->getMVC("controleur", ucfirst($requete->controleur));
	}
}
?>