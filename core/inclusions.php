<?php
require 'Requete.php';
require 'Routeur.php';
require 'Distributeur.php';
require 'Erreurs.php';
require CORE.DS.'patron'.DS.'Conteneur.php';
require CORE.DS.'patron'.DS.'Fabrique.php';
require CORE.DS.'controleurs'.DS.'Controleur.php';
require CORE.DS.'modeles'.DS.'Modele.php';

class Inclure{

    static $inclus;

    static function getConfXML($chemin){
        return new SimpleXMLElement($chemin.DS.'conf.xml', Null, True);
    }

    static function Module($nom){
        $conf=Inclure::getConfXML(ROOT.DS.'modules'.DS.$nom);
        if ($conf->dependances->composant[0]!==''){
            foreach ($conf->dependances->composant as $val){
                if (!isset(Inclure::$inclus[$val->__toString()])){
                    Inclure::Composants($val->__toString(), 'helpers');
                }
            }
        }

    }


    static function Composants($nom, $dossier=null){
        if(Inclure::$inclus[$nom]==1){return;}
        if (($dossier !== null)&&(is_dir(COMPOSANTS.DS.$nom.DS.$dossier))){
            $comDir=opendir(COMPOSANTS.DS.$nom.DS.$dossier);
            while(false!==($fichiers = readdir($comDir))){
                if (($fichiers!=='.') && ($fichiers!=='..')){
                    include(COMPOSANTS.DS.$nom.DS.$dossier.DS.$fichiers);
                    echo $fichiers;
                }
            }
        }
    }
}
