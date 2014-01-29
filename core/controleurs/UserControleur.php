<?php
class UserControleur extends Controleur{

    function __construct(){
        parent::__construct();
        call_user_func_array(array($this,$this->requete->action),$this->requete->params);



    }

    function login(){
        $user = $this->getUserSecure($_POST["login"], $_POST["password"]);
        $_SESSION["nomUser"]= $user["nom"];
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