<!-- Pr?ambule : 
Le but va ?tre de mettre en place une structure php bas? sur le Patron de conception MVC.
Structure compos? de 3 ?tages:

-Mod?le : va int?ragir avec la base de donn?e essentiellement
-Vue : Affichera les pages (aider de helpers)
-Controlleur : celui qui appellera les vue et les mod?les.

A cela s'ajoute la partie distributrice.
Pour naviguer dynamiquement l'url sera de la forme http://monsite.fr/nomControlleur/nomVue/Action/params1/params2/paramEtc.../index.php
Sa d?composition est ? la charge de routeur.php qui met les diff?rent ?l?ment dans un tableau renvoy? ? distributeur.php
Distributeur.php se chargera avec ces informations d'instancier les controlleurs ad?quats.

Index.php est l'entr? de tout le processus. Hors avec la structure d'url voulu on ne peut se permettre de dupliquer ? chaque fois index.php pour chaque url servant de param?tres.
Le fichier .htaccess ? la racine du site permet de contourner le probl?me.
Il va rediriger toute requ?te url vers le index.php sauf si ceux ci sont des fichier existant ou dossiers existant (si on appelle une image on voudrait tomber dessus et non pas sur index.php)

-->


<?php
//point d'entr? du MVC
session_start();
define('ROOT',dirname(__FILE__)); 	// permet de r?cup?rer le dossier racine du site
define('DS',DIRECTORY_SEPARATOR); 	// simplification de s?parateur de dossier
define('CORE',ROOT.DS.'core');  	// dossier contenant les fichiers coeur du syst?me, tel le routeur, ditributeur, le controlleur parent etc..)
define('BASE_URL',dirname($_SERVER['SCRIPT_NAME'])); //dossier racine sous format html
define('COMPOSANTS',ROOT.DS.'composants');
define('MODULES',ROOT.DS.'modules');
define('TEMPLATES',ROOT.DS.'template');
require CORE.DS.'inclusions.php';
new Distributeur();
?>

