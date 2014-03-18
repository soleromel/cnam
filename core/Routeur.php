<?php
class Routeur{

	/**
	 * Permet de parser une url
	 * @param $url Url à parser
	 * @return tableau contenant les paramètres
	 **/
	static function parse($requete){
		$requete->url = trim($requete->url,'/'); 			//on supprime le slash pour �viter un conflit avec la fonction d'apr�s.
		$params = preg_split("/[\/\?\&]+/", $requete->url); 	// on créé un tableau dont le s�parateur est slash
		$params= Routeur::testErreur($params); // j'utilise cette fonction car je n'arrive à accéder à ma fonction avec un $this puisque je ai appelé Routeur en static.
		
		$requete->controleur = $params[0];
		$requete->action = (isset($params[1])&&!($params[1][0]==='?')) ? $params[1] : 'index';
		$requete->params = array_slice($params,2); // ces paramètre GET sont ajouté aux paramètres de $requête
		return $requete;
	}
	
	static function testErreur($params){
		//vérification si une url a été insérée.
		if (!is_array($params)){
			$params=array();
			$params[0]='Pages';$params[1]='index';
		}
		// vérification au niveau du nom du controlleur
		/*$pattern = '/^[pP]ages$/';
		$test0 = preg_match($pattern, $params[0]); //test du controlleur
		if (!$test0){
			throw new Erreurs('erreur404');
		}
		*/
		//verification action
		if (!isset($params[1])){
			$params[1] = 'index';
		} 
		
		//verification pramètres
		if (!isset($params[2]))
			return $params;
		$test2 = preg_split("/[\/\?\&]+/", $params[2]); // permet de récupérer les paramètres de type GET (? &)
		if ($test2[0]==null){		// parfois un "?" peut être le premier caractère, ce qui créer précedemment une case de taleau vide. On le corrige.
			for ($i=0; $i<count($test2)-1; $i++){
				$test2[$i]=$test2[$i+1];
			}
			unset($test2[count($test2)-1]);
		}  
		for ($i=0; $i<count($test2);$i++ ){
			$params[$i+2]=$test2[$i];
		}
		return $params;
	}

    static function route($controleur, $action){

        $req=Fabrique::getFabrique()->getRequete();
        $_SESSION['prevControleur']=$req->controleur;
        $_SESSION['prevAction']=$req->action;
        $_SESSION['prevParams']=$req->params;
        echo(BASE_URL."/".$controleur."/".$action) ;

    }

    static function redirige($controleur, $action, $params=null){
        if ($params===null){
            header('Location: '.BASE_URL.'/'.$controleur.'/'.$action.'/');
            exit();
        }
    }

}