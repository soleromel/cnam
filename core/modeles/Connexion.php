<?php
class Connexion{

    static protected
        $_instance;

    static public function getInstance()
    {
        if (!isset(self::$_instance)){
            try {
                self::$_instance = new PDO('mysql:host=localhost;dbname=cnam, port=3306', 'root', '');
            }
            catch ( Exception $e ) {
                 echo "Connection à MySQL impossible : ", $e->getMessage();
            die();
            }

        }
        return self::$_instance;
    }
}
