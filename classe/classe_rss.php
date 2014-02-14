<?php

include_once('classe_connexion.php');
include_once('fonctions.php');
include_once('connexion_vars.php');

class RSS {

	var $news_db		= NULL;
	var $id_flux		= NULL;
	
	/*
	@ PREPARATION DU CONTENU DE LA PAGE
	@
	@
	*/
	function rss($_id_flux=NULL){
		global $news_cInfo;
		
		$this->news_db		= new connexion($news_cInfo['server'],$news_cInfo['user'],$news_cInfo['password'],$news_cInfo['db']);
		
		if(isset($_id_flux)){
			$this->id_flux		= $_id_flux;
		}
	}
	
	/*
	@ AJOUT D'UN FLUX RSS
	@
	@
	*/
	function add_flux($data_array=NULL){
		if(isset($data_array)){
			$this->news_db->connect_db();
			$sql_insert		= sprintf("INSERT INTO rss_flux_tb (URL,nom) VALUES (%s,%s)",
													GetSQLValueString($data_array['URL'], "text"),
													GetSQLValueString($data_array['nom'], "text"));
			$insert_query	= mysql_query($sql_insert) or die(mysql_error());
		
			$this->id_flux = mysql_insert_id();
		
			return mysql_insert_id();
		}
	}

	/*
	@ MODIFIER UN FLUX RSS
	@
	@
	*/
	function modif_flux($_array_val=NULL){
		if(!empty($_array_val)){
			$this->news_db->connect_db();

			$updateSQL 		= sprintf("UPDATE rss_flux_tb SET nom=%s,URL=%s WHERE id=%s",
													GetSQLValueString($_array_val['nom'], "text"),
													GetSQLValueString($_array_val['URL'], "text"),
													GetSQLValueString($_array_val['id'], "int"));
			$update_query	= mysql_query($updateSQL) or die(mysql_error());
		}
	}
	
	
	/*
	@ SUPPRIMER UN FLUX RSS
	@ en realite on cache le flux
	@
	*/
	function delete_flux($id=NULL){
		if(isset($id)){
			$this->news_db->connect_db();

			$suppr_req 		= sprintf("UPDATE rss_flux_tb SET cache=1 WHERE id=%s", GetSQLValueString($id,'int'));
			//$suppr_req 		= sprintf("DELETE FROM rss_flux_tb WHERE id=%s", GetSQLValueString($id,'int'));
			$query_suppr	= mysql_query($suppr_req) or die(mysql_error());	
		}
	}

	/*
	@ RETOURNE LA LISTE DES FLUX
	@
	@
	*/
	function get_flux(){
		$this->news_db->connect_db();
		
		$sql_liste_rss	= 'SELECT * FROM rss_flux_tb WHERE cache=0 ORDER BY nom';
		$sql_liste_rss_query = mysql_query($sql_liste_rss) or die(mysql_error());
	
		
		$i = 0;
	
		while ($rss_flux = mysql_fetch_assoc($sql_liste_rss_query)){
			
			$class	= 'listItemRubrique'.($i+1);
			$id		= $rss_flux['id'];
			$nom	= $rss_flux['nom'];
			$url	= $rss_flux['URL'];
			
			include('../structure/admin-rss-list-bloc.php');
			
			$i = ($i+1)%2;
		}
	}
	
	/*
	@ RETOURNE LA LISTE DES FLUX SOUS FORME DE TABLEAU ASSOCIATIF
	@
	@
	*/
	function get_flux_url(){
		$this->news_db->connect_db();
		
		$sql_liste_rss	= 'SELECT * FROM rss_flux_tb WHERE cache=0 ORDER BY nom';
		$sql_liste_rss_query = mysql_query($sql_liste_rss) or die(mysql_error());
		
		$rss_liste = array();
		
		while ($rss_flux = mysql_fetch_assoc($sql_liste_rss_query)){
			$temp->id	= $rss_flux['id'];
			$temp->nom	= $rss_flux['nom'];
			$temp->URL	= $rss_flux['URL'];
		
			$rss_liste[]		= $temp;
			$temp = NULL;
		}
		
		return $rss_liste;
	}
	
	/*
	@ PERMET D'ARCHIVER LES FLUX RSS
	@
	@
	*/
	function archive_rss($data_array=NULL){
		if(isset($data_array)){
			
			if(!$this->check_item_rss($data_array['titre'],$data_array['date'],$data_array['URL'])){		
				$this->news_db->connect_db();
				$sql_insert		= sprintf("INSERT INTO rss_item_tb (id_flux,titre,description,texte,date,URL,image) VALUES (%s,%s,%s,%s,%s,%s,%s)",
														GetSQLValueString($data_array['id_flux'], "int"),
														GetSQLValueString($data_array['titre'], "text"),
														GetSQLValueString($data_array['description'], "text"),
														GetSQLValueString($data_array['texte'], "text"),
														GetSQLValueString($data_array['date'], "date"),
														GetSQLValueString($data_array['URL'], "text"),
														GetSQLValueString($data_array['image'], "text"));
				$insert_query	= mysql_query($sql_insert) or die(mysql_error());
			
				return mysql_insert_id();
			}
		}
	}
	
	/*
	@ VERIFIE SI UN ELEMENT RSS EXISTE DEJA EN BASE DE DONNEE 
	@
	@
	*/
	function check_item_rss($titre,$date,$lien){
		$this->news_db->connect_db();
		
		$sql_check_rss	= sprintf("SELECT id FROM rss_item_tb WHERE URL=%s", GetSQLValueString($lien, "text"));
		$sql_check_rss_query = mysql_query($sql_check_rss) or die(mysql_error());
		
		if(mysql_num_rows($sql_check_rss_query)>0){
			return true;	
		}else{
			return false;	
		}
	}

	/*
	@ RETOURNE LA LISTE DES ELEMENTS D'UN FLUX DONNE AUX DATES DONNÉES 
	@
	@
	*/
	function get_liste_rss($_id,$_annee,$_mois){
		$_mois = strlen($_mois)==1? '0'.$_mois:$_mois;
		$_mois2= strlen($_mois+1)==1? '0'.($_mois+1):($_mois+1);
		//echo 'RSS '.$_id.' '.GetSQLValueString($_annee.'-'.$_mois, "date").' '.GetSQLValueString($_annee.'-'.($_mois2), "date");

		$this->news_db->connect_db();
		
		$sql_liste_rss		= sprintf("SELECT DISTINCT id,URL,titre,date
									FROM rss_item_tb
									WHERE id_flux = %s
									AND date >= %s
									AND date < %s
									ORDER BY date DESC",GetSQLValueString($_id,"int"),GetSQLValueString($_annee.'-'.$_mois, "date"),GetSQLValueString($_annee.'-'.($_mois2), "date"));

		$sql_liste_rss_query	= mysql_query($sql_liste_rss) or die(mysql_error());
		$liste_rss			= '';

		date_default_timezone_set("Europe/Paris");
		$format['fr'] = "d";
	
		while ($rss_item = mysql_fetch_assoc($sql_liste_rss_query)){
			$laDate = date($format['fr'],strtotime($rss_item['date']));
			$liste_rss 	.= '<li id="rss@'.$rss_item['id'].'" class="item item_sort"><span class="handler"></span>'.($laDate).' '.$rss_item['titre'].' <a href="'.$rss_item['URL'].'" target="_blank">voir</a></li>'."\n";
		}

		mysql_free_result($sql_liste_rss_query);

		if($liste_rss == ''){
			$liste_rss = '<li>Aucun élément</li>';
		}	

		return $liste_rss;
	}


	/*
	@ FONCTION QUI IDENTIFIE LES IMAGE DANS UN PARAGRAPHE
	@
	@
	*/
	function trouverimage($texte){
		global $tabImg;
		$tabImg = array();
		$txt	= preg_replace_callback("/\<img(.+)\/>/Ui","image",$texte);
				
		preg_match_all('#src="(.*?)"#i', $tabImg[0],$tab);		
		
		//retourne le texte et le lien de la première image
		$retour->txt = $txt;
		$retour->img = $tab[1][0];
		// ATTENTION VERIFIER SI L'IMAGE FAIT BIEN PLUS DE 10 pixels de haut ou de large
		/*$size = getimagesize($tab[1][0]);
		if($size[0]>10 && $size[1]>10){
			$retour->img = $tab[1][0];
		}else{
			$retour->img = '';
		}*/
		
		return $retour;
	}
	
	/*
	@ SERT A NETTOYER l'HTML
	@ NE FONTIONNE PAS 
	@
	*/
	static function cleanUpRssHTML($html){
		
		$data_str = utf8_encode($html);
		
		/*$html = strip_tags($html,'<div><p><a><br><em><strong><ul><li><h1><h2><h3><h4><h5><h6>');
		
		return $html;*/

		// define allowable tags
		$allowable_tags = '<p><a><img><ul><ol><li><table><thead><tbody><tr><th><td>';
		// define allowable attributes
		$allowable_atts = array('href','src','alt');
		
		// strip collector
		$strip_arr = array();
		
		
		
		// load XHTML with SimpleXML
		$data_sxml = simplexml_load_string('<root>'. $data_str .'</root>', 'SimpleXMLElement', LIBXML_NOERROR | LIBXML_NOXMLDECL);
		
		if ($data_sxml ) {
			// loop all elements with an attribute
			foreach ($data_sxml->xpath('descendant::*[@*]') as $tag) {
				// loop attributes
				foreach ($tag->attributes() as $name=>$value) {
					// check for allowable attributes
					if (!in_array($name, $allowable_atts)) {
						// set attribute value to empty string
						$tag->attributes()->$name = '';
						// collect attribute patterns to be stripped
						$strip_arr[$name] = '/ '. $name .'=""/';
					}
				}
			}
		}
		
		//$data_sxml = new SimpleXMLElement($data_sxml);
		
		//var_dump($data_sxml->asXML());
		
		// strip unallowed attributes and root tag
		$data_str = strip_tags(preg_replace($strip_arr,array(''),$data_sxml->asXML()), $allowable_tags);
		
		return $data_str;

	}

}


/*
@ FONCTION PREG CALLBACK POUR STOCKER LES IMAGES DANS UN TABLEAU
@ LA FONCTION N'EST PAS DANS LA CLASSE RSS
@
*/
function image($matches){
	global $tabImg;
	$tabImg[] = "<img ".$matches[1]."/>";
	
	return "";
}



?>