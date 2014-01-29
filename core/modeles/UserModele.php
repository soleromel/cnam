<?php
class UserModele extends Modele{

    function __construct(){
        parent::__construct();
    }

    public function getUserSecure ($id, $pass){
        $sql_user =  'SELECT u.id, u.nom
                FROM cnam.user u
                 WHERE u.login=\''.$id.'\'
                 AND u.motdepasse=\''.$pass.'\';
        ';

        $User;
        foreach  ($this->db->query($sql_user) as $row) { //c'est la seule syntaxe que j'ai trouvé pour que query s'execute
            $User = $row;
        }
        return $User;
    }
}