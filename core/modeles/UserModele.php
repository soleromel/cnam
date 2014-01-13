<?php
class UserModele extends Modele{

    function __construct(){
        parent::__construct();
    }

    public function getUserSecure (){
        $sql_user =  'SELECT p.titre as page_titre, p.modules as page_modules, p.composants as page_composant, p.template as template_id,
                 t.nom as template_nom, t.chemin as template_chemin, t.verif as template_verif
                 FROM cnam.user u
                 WHERE u.login=\''.$id.'\'
                 AND u.motdepasse;
        ';
    }
}