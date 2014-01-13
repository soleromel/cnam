<?php
class PageControleur extends Controleur{

    private $pageParams;
	function __construct(){
		parent::__construct();
        $this->modele = Fabrique::getFabrique()->getMVC("modele","Page");
        $this->pageParams = $this->modele->getPage($this->requete->action);
        $this->vue = Fabrique::getFabrique()->getMVC("vue","Page",$this->pageParams);
		
	}
}
