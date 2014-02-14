<?php


include_once(REAL_LOCAL_PATH.'classe/classe_connexion.php');
include_once(REAL_LOCAL_PATH.'classe/classe_core.php');
include_once(REAL_LOCAL_PATH.'classe/classe_spuser.php');
include_once(REAL_LOCAL_PATH.'classe/classe_func.php');



/**
 * Classe Api
 */
class Api {

	var $core;
	var $json;
	var $langues_evenement;
	var $isAuthenticated;
	
	/**
	 * [api description]
	 * @return [type] [description]
	 */
	function api(){	
		$this->core = new core();
		$this->json = new stdClass();


		if($this->core->isAdmin && $this->core->userLevel<=3){
			// on est connecté
			$this->isAuthenticated = true;
		}else{
			$this->isAuthenticated = false;
		}


		$this->json->isAuthenticated = $this->isAuthenticated;
		$this->check_request();
		

		if(isset($_GET['templates'])){
			$this->templates_list();
		}
		else
		if(isset($_GET['rubriques'])){
			$this->rubriques_list();
		}
		else
		if(isset($_GET['template']) && !empty($_GET['mois']) && !empty($_GET['annee'])){
			$this->newsletter_list();
		}	
		else
		if(isset($_GET['rubrique']) && !empty($_GET['mois']) && !empty($_GET['annee'])){
			$this->actualite_list();
		}	
		else
		if(!empty($_GET['actualite'])){
			$this->actualite_detail();
		}	
		

		// on vérifie si une variable a été passée en paramètre
		// si oui on sort le JSON
		if($this->check_request()){
			$this->json_output();
		}
		// si non on affiche le résumé des commandes
		else{
			$this->api_home();
		}

	}

	/**
	 * Vérifie qu'on a passé des paramètres en requêtes, autre que les cookies de sessions
	 * @return boolean 		true si des paramètres ont étés passés, false dans le cas contraire
	 */
	function check_request(){
		$isRequestVar = false;
		foreach($_REQUEST as $key=>$value){
			if($key == 'templates' || $key == 'template' || $key == 'rubriques' || $key == 'rubrique' || $key == 'actualite' || $key == 'login' || $key == 'logout'){
				$isRequestVar = true;

				break;
			}
		}
		return $isRequestVar;
	}



	/**
	 * sert à encoder le json et à le retourner sous forme de chaîne
	 * @return json		une chaîne encodée au format json
	 */
	function json_output(){
		echo json_encode($this->json);
	}



	/**
	 * [templates_list description]
	 * @return [type] [description]
	 */
	function templates_list(){
		$sql = sprintf("SELECT *
						FROM template_tb
						ORDER BY nom");
		$query	= mysql_query($sql) or die(mysql_error());

		$template_array = array();

		while ($template = mysql_fetch_assoc($query)){

			$template_obj = new stdClass();

			$template_obj->id    = $template['id'];
			$template_obj->nom   = $template['nom'];
			$template_obj->dates = array();


			$sql_date = sprintf("SELECT DISTINCT
								MONTH(date) AS mois,
								YEAR(date) AS annee
								FROM newsletter_tb
								WHERE template=%s
								ORDER BY date",
								func::GetSQLValueString($template['id'], 'int'));
			$query_date = mysql_query($sql_date) or die(mysql_error());

			while ($template_date = mysql_fetch_assoc($query_date)){

				$date_obj = new stdClass();

				$date_obj->mois  = $template_date['mois'];
				$date_obj->annee = $template_date['annee'];

				$template_obj->dates[] = $date_obj;

			}

			$template_array[$template['id']] = $template_obj ;
		}

		$this->json->template = $template_array ;
	}



	/**
	 * [newsletter_list description]
	 * @return [type] [description]
	 */
	function newsletter_list(){

		$sql = sprintf("SELECT *
						FROM newsletter_tb
						WHERE MONTH(date)=%s
						AND YEAR(date)=%s
						AND template=%s",  
						func::GetSQLValueString($_GET['mois'],'text'),
						func::GetSQLValueString($_GET['annee'],'text'),
						func::GetSQLValueString($_GET['template'],'int'));
		$query	= mysql_query($sql) or die(mysql_error());

		$newsletters_array = array();

		while ($newsletter = mysql_fetch_assoc($query)){

			$newsletter_obj = new stdClass();

			$newsletter_obj->id 		= $newsletter['id'];
			$newsletter_obj->unique_id 	= $newsletter['unique_id'];
			$newsletter_obj->nom 		= $newsletter['nom'];
			$newsletter_obj->objet 		= $newsletter['objet'];
			$newsletter_obj->is_archive = $newsletter['is_archive'] == 1 ? true : false;
			$newsletter_obj->url 		= 'http://www.sciencespo.fr/newsletter/archive-'.$newsletter['unique_id'].'.html';

			$newsletters_array[ $newsletter['id'] ] = $newsletter_obj;

		}

		$this->json->newsletters = $newsletters_array ;

	}


	/**
	 * [rubriques_list description]
	 * @return [type] [description]
	 */
	function rubriques_list(){

		$sql = sprintf("SELECT *
						FROM actu_cat_tb
						ORDER BY libelle");
		$query	= mysql_query($sql) or die(mysql_error());

		$rubriques_array = array();

		while ($rubrique = mysql_fetch_assoc($query)){

			$rubrique_obj = new stdClass();

			$rubrique_obj->id 		  = $rubrique['id'];
			$rubrique_obj->nom 		  = $rubrique['libelle'];


			$sql_date = sprintf("SELECT DISTINCT
								MONTH(date) AS mois,
								YEAR(date) AS annee
								FROM actu_item_tb
								WHERE categorie=%s
								ORDER BY date",
								func::GetSQLValueString($rubrique['id'], 'int'));
			$query_date = mysql_query($sql_date) or die(mysql_error());


			while ($rubrique_date = mysql_fetch_assoc($query_date)){

				$date_obj = new stdClass();

				$date_obj->mois  = $rubrique_date['mois'];
				$date_obj->annee = $rubrique_date['annee'];

				$rubrique_obj->dates[] = $date_obj;

			}

			$rubriques_array[ $rubrique['id'] ] = $rubrique_obj;

		}

		$this->json->rubriques = $rubriques_array ;

	}


	/**
	 * [actualite_list description]
	 * @return [type] [description]
	 */
	function actualite_list(){
		$sql = sprintf("SELECT *
						FROM actu_item_tb
						WHERE MONTH(date)=%s
						AND YEAR(date)=%s
						AND categorie=%s
						ORDER BY date",  
						func::GetSQLValueString($_GET['mois'],'text'),
						func::GetSQLValueString($_GET['annee'],'text'),
						func::GetSQLValueString($_GET['rubrique'],'int'));
		$query	= mysql_query($sql) or die(mysql_error());

		$actualites_array = array();

		while ($actualite = mysql_fetch_assoc($query)){

			$actualite_obj = new stdClass();

			$actualite_obj->id 			= $actualite['id'];
			$actualite_obj->titre 		= $actualite['titre'];
			$actualite_obj->date 		= $actualite['date'];
			//$actualite_obj->url 		= 'http://www.sciencespo.fr/newsletter/archive-'.$actualite['unique_id'].'.html';

			$actualites_array[ $actualite['id'] ] = $actualite_obj;

		}

		$this->json->actualites = $actualites_array ;
	}


	/**
	 * [actualite_detail description]
	 * @return [type] [description]
	 */
	function actualite_detail(){
		$sql = sprintf("SELECT *
						FROM actu_item_tb
						WHERE id=%s",  
						func::GetSQLValueString($_GET['actualite'],'int'));
		$query	= mysql_query($sql) or die(mysql_error());

		$actualite = mysql_fetch_assoc($query);

		$actualite_obj = new stdClass();

		$actualite_obj->id 			= $actualite['id'];
		$actualite_obj->titre 		= $actualite['titre'];
		$actualite_obj->soustitre 	= $actualite['soustitre'];
		$actualite_obj->texte 		= $actualite['texte'];
		$actualite_obj->image 		= ABSOLUTE_URL.IMG_ACTU.$actualite['id'].'/'.$actualite['image'];
		$actualite_obj->moreTXT 	= $actualite['moreTXT'];
		$actualite_obj->URL 		= $actualite['URL'];
		$actualite_obj->date 		= $actualite['date'];


		$this->json->actualite = $actualite_obj;
	}


	/**
	 * [home_api description]
	 * @return [type] [description]
	 */
	function api_home(){
		echo '<!doctype html>
		<html>
		<head>
		<meta charset="UTF-8">
		<title>Api Sciences po newsletters</title>
		</head>

		<body><pre>';

		//echo '<p>ok'."</br>\n";
		echo 'paramètres GET attendus :'."</br>\n";
		echo '- templates		(pour obtenir la liste des gabarits de newsletters, et les mois/années où ont été créés des newsletters)'."</br>\n";
		echo "</br>\n";
		echo '- template		(id du template dont on souhaite obtenir les newsletters)'."</br>\n";
		echo '+ mois			(mois correspondant)'."</br>\n";
		echo '+ annee			(année correspondante)'."</br>\n";
		echo "</br>\n";
		echo '- rubriques		(pour obtenir la liste des rubriques d’actualité, et les mois/années où ont été créés des actualités)'."</br>\n";
		echo "</br>\n";
		echo '- rubrique		(id de la rubrique dont on souhaite obtenir les actualités)'."</br>\n";
		echo '+ mois			(mois correspondant)'."</br>\n";
		echo '+ annee			(année correspondante)'."</br>\n";
		echo "</br>\n";
		echo '- actualite		(id de l’actualité dont on souhaite obtenir les détails)'."</br>\n";
		echo "</br>\n";
		echo 'paramètres POST attendus :'."</br>\n";
		echo '- logout		(defaut : false)'." - pour se déconnecter de l'API</br>\n";
		echo "</br>\n";
		echo 'pour la liste des templates :      	<a href="'.ABSOLUTE_URL.'api/?templates">'.ABSOLUTE_URL.'api/?templates</a>'."</br>\n";
		echo 'pour un template en particulier :  	<a href="'.ABSOLUTE_URL.'api/?template=4&annee=2011&mois=1">'.ABSOLUTE_URL.'api/?template=4&annee=2011&mois=1</a>'."</br>\n";
		echo 'pour la liste des rubriques :      	<a href="'.ABSOLUTE_URL.'api/?rubriques">'.ABSOLUTE_URL.'api/?rubriques</a>'."</br>\n";
		echo 'pour les actualités d’une rubrique :  	<a href="'.ABSOLUTE_URL.'api/?rubrique=1&annee=2011&mois=1">'.ABSOLUTE_URL.'api/?rubrique=1&annee=2011&mois=1</a>'."</br>\n";
		echo 'pour une actualité en particulier :  	<a href="'.ABSOLUTE_URL.'api/?actualite=17">'.ABSOLUTE_URL.'api/??actualite=17</a>'."</br>\n";
			
		echo '</pre></body></html>';
	}

}