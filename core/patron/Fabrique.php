<?php

/*on y met ici tout les singletons*/

class Fabrique
{

    protected function __construct() { }
    protected function __clone() { }

    static protected $factory;
    public static function getFabrique()
    {
        if (!self::$factory){
            self::$factory = new self();
        }
        return self::$factory;
    }

    private $requete;
    public function getRequete() {
        if (!isset($this->requete)){
            $this->requete = new Requete();
        }
        return $this->requete;
    }
    public function resetRequete(){
        $this->requete = null;
    }



    private $db;
    public function getConnexion() {
        if (!isset($this->db)){
            try {
                $this->db = new PDO('mysql:host=localhost;dbname=cnam', 'root', '');
            }
            catch ( Exception $e ) {
                echo "Connection à MySQL impossible : ", $e->getMessage();
                die();
            }
        }
        return $this->db;
    }


    private $MVC;
    public function getMVC($type, $name, $injection=null){
        if (!isset($this->MVC)){
            $this->MVC = new Conteneur();
        }
        return $this->MVC->creer($type, $name, $injection);
    }

}

//$conn = Fabrique::getFabrique()->getConteneur();

