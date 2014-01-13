<?php
/* se charge d'instancier les divers Objects demandés et de les stocker dans l'object $conteneur
 dont le contenu pourra être injecté sur demande du controlleur.
*/
class Conteneur{

    public $tabContenu = array(
                        "Controleur" => array(),
                        "Modele" => array(),
                        "Vue" => array()
                        );


    public function creer($type, $name, $injection = null){
        $nomComplet = $name.ucfirst($type).'';
        $fichier=CORE.DS.lcfirst($type).'s'.DS.$nomComplet.'.php';
        $existe = false;

        foreach($this->tabContenu as $clef => $valeur){ //la classe est-elle dans la liste de classe possible
            if ($clef === ucfirst($type)){
                $existe = true;
            }
        }
        if ($existe){
            if (file_exists($fichier)){
                require $fichier;
                if (class_exists($nomComplet)){
                    if (isset($injection)){
                        return new $nomComplet($injection);
                    }
                    else{
                        return new $nomComplet(); // on instancie XXXControlleur.php avec en pramaètre l'objet requete
                    }

                }
            }
        }
    }
}

