<?php
class UserControleur extends Controleur{

    function __construct(){
        parent::__construct();
        call_user_func_array(array($this,$this->requete->action),$this->requete->params);



    }

    function login(){
        $user = $this->getUserSecure($_POST["login"], $_POST["password"]);
        if (isset ($user)){
            $_SESSION["nomUser"]= $user["nom"];
            Routeur::redirige('Page','1');
        }
        else
            echo('erreur : login ou identifiant incorrect');
    }

    function getUser(){
        $modele = Fabrique::getFabrique()->getMVC("modele","User");
        return $modele->getUser();
    }

    function getUserSecure($nom, $pass){
        $modele = Fabrique::getFabrique()->getMVC("modele","User");
        return $modele->getUserSecure($nom, $pass);
    }
}