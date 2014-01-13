<?php
class PageModele extends Modele{
   function __constuct(){
        parent::__construct();
    }


    public function getPage ($id){
        $sql_page =  'SELECT p.titre as page_titre, p.modules as page_modules, p.composants as page_composant, p.template as template_id,
                 t.nom as template_nom, t.chemin as template_chemin, t.verif as template_verif
                 FROM cnam.page p, cnam.template t
                 WHERE p.id=\''.$id.'\'
                 AND p.template=t.id;
        ';

        //lancer requête et obtenir UNE page voulue
        $prePage;
        foreach  ($this->db->query($sql_page) as $row) { //c'est la seule syntaxe que j'ai trouvé pour que query s'execute
            $prePage = $row;
        }
        //on va construire l'objet $page à envoyer à la vue
        $page;
        $page["titre"] = $prePage["page_titre"];
        $page["template"]["chemin"] = $prePage["template_chemin"];
        $page["template"]["verif"] = $prePage["template_verif"];
        //Obtenir l'ensemble des infos sur les modules

        $liste_module =$this->parseVarchar($prePage["page_modules"]);
        foreach ($liste_module as $module){
            $sql_module = 'SELECT *
                FROM cnam.module
                WHERE id = \''.$module.'\';';
            foreach  ($this->db->query($sql_module) as $row) {
                $page["modules"][$row["nom"]]=$row;
            }
        }
        $liste_composant =$this->parseVarchar($prePage["page_composant"]);
        foreach ($liste_composant as $composant){
            $sql_composant = 'SELECT *
                FROM cnam.composant
                WHERE id = \''.$composant.'\';';
            foreach  ($this->db->query($sql_composant) as $row) {
                $page["composants"][$row["nom"]]=$row;
            }
        }
        return $page;
    }
}