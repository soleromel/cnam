<?php
class UserControleur extends Controleur{

    function __construct(){
        parent::__construct();
        print_r($_SESSION);
        print_r($_POST);
        call_user_func_array(array($this,$this->requete->action),$this->requete->params);



    }

    function login(){
        $user = $this->getUserSecure($nom, $pass);
        $_SESSION["$user->nomUser"];
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