<?php

include_once('classe_connexion.php');
include_once('fonctions.php');
include_once('connexion_vars.php');



class Actu {
	
	var $news_db		= NULL;
	var $id				= NULL;
	
	/* GESTION DES NEWS*/
	function actu($_id=NULL){
		global $news_cInfo;
		$this->news_db		= new connexion($news_cInfo['server'],$news_cInfo['user'],$news_cInfo['password'],$news_cInfo['db']);

		if(isset($_id) && !empty($_id)){
			$this->id = $_id;
		}
	}
	
	function create_actu($_array_val,$_id=NULL){
		$this->news_db->connect_db();

		if(isset($_id)){
			//MODIFICATION
			$updateSQL 		= sprintf("UPDATE actu_item_tb SET date=%s, titre=%s, categorie=%s, soustitre=%s, texte=%s, image=%s, moreTXT=%s, URL=%s WHERE id=".GetSQLValueString($_id,"int"),
													GetSQLValueString($_array_val['date'],		"date"),
													GetSQLValueString($_array_val['titre'],		"text"),
													GetSQLValueString($_array_val['categorie'], "int"),
													GetSQLValueString($_array_val['soustitre'], "text"),
													GetSQLValueString($_array_val['texte'],		"text"),
													GetSQLValueString($_array_val['image'],		"text"),
													GetSQLValueString($_array_val['moreTXT'],		"text"),
													GetSQLValueString($_array_val['URL'],	"text"));
			$update_query	= mysql_query($updateSQL) or die(mysql_error());
		}else{
			//CREATION
			$insertSQL 		= sprintf("INSERT INTO actu_item_tb (date,titre,categorie,soustitre,texte,image,moreTXT,URL) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)",
													GetSQLValueString($_array_val['date'],		"date"),
													GetSQLValueString($_array_val['titre'],		"text"),
													GetSQLValueString($_array_val['categorie'], "int"),
													GetSQLValueString($_array_val['soustitre'], "text"),
													GetSQLValueString($_array_val['texte'],		"text"),
													GetSQLValueString($_array_val['image'],		"text"),
													GetSQLValueString($_array_val['moreTXT'],		"text"),
													GetSQLValueString($_array_val['URL'],	"text"));
			$insert_query	= mysql_query($insertSQL) or die(mysql_error());

			return mysql_insert_id();
		}	
	}
	
	
	function duplicate_actu($id=NULL){
		$this->news_db->connect_db();
		if(isset($id)){
			$duplicateSQL 	="INSERT INTO actu_item_tb (titre, date, categorie, soustitre, texte, image, moreTXT, URL) SELECT titre, date, categorie, soustitre, texte, image, moreTXT, URL FROM actu_item_tb WHERE id = ".$id;
			$duplicate_query = mysql_query($duplicateSQL) or die(mysql_error());
			
			$id_duplicate 	=  mysql_insert_id();
			!is_dir('../actu_images/'.$id_duplicate )?mkdir('../actu_images/'.$id_duplicate ):"";
			
			$info		= $this->get_info($id);
			$image		= $info['image'];
			
			if(isset($info['image'])){
				$file		= '../actu_images/'.$id.'/'.$image;
				$newfile	= '../actu_images/'.$id_duplicate.'/'.$image;
				
				copy($file, $newfile);
			}
			
			return $id_duplicate;
		}
	}
	/*function edit_actu(){
		
	}*/

	function create_cat($_array_val){
		if(!empty($_array_val)){
			$this->news_db->connect_db();

			$insertSQL 		= sprintf("INSERT INTO actu_cat_tb (libelle) VALUES (%s)",
													GetSQLValueString($_array_val['libelle'], "text"));
			$insert_query	= mysql_query($insertSQL) or die(mysql_error());
		
			return mysql_insert_id();
		}
	}

	function delete_cat(){

	}

	function get_cat(){
		$this->news_db->connect_db();

		$sql_liste_cat	= 'SELECT * FROM actu_cat_tb ORDER BY libelle';
		$sql_liste_cat_query = mysql_query($sql_liste_cat) or die(mysql_error());
		$liste_items	= '';
		$date			= '';
		$oldDate		= '';

		$cat_actu = array();

		while ($cat = mysql_fetch_assoc($sql_liste_cat_query)){
			$temp->label	= $cat['libelle'];
			$temp->select	= '';
			$temp->value	= $cat['id'];
		
			$cat_actu[]		= $temp;
			$temp = NULL;
		}

		return createCheckBox($cat_actu,'cat_actu[]','cat_actu');
	}

	

	function get_liste_cat(){
		$this->news_db->connect_db();

		$sql_liste_cat			= 'SELECT id,libelle FROM actu_cat_tb ORDER BY libelle';
		$sql_liste_cat_query	= mysql_query($sql_liste_cat) or die(mysql_error());

		$liste_cat = array();

		while ($cat_actu = mysql_fetch_assoc($sql_liste_cat_query)){
			$liste_cat[$cat_actu['id']] = $cat_actu['libelle'];
		}

		return $liste_cat;
	}

	function get_select_actu($_cat,$_annee,$_mois){
		$this->news_db->connect_db();

		$_mois = strlen($_mois)==1? '0'.$_mois:$_mois;
		$_mois2= strlen($_mois+1)==1? '0'.($_mois+1):($_mois+1);

		$sql_liste_actu			= sprintf("SELECT id,titre
									FROM actu_item_tb
									WHERE categorie=%s
									AND date >= %s
									AND date < %s
									ORDER BY date DESC",GetSQLValueString($_cat,"int"),GetSQLValueString($_annee.'-'.$_mois, "date"),GetSQLValueString($_annee.'-'.($_mois2), "date"));
		$sql_liste_actu_query	= mysql_query($sql_liste_actu) or die(mysql_error());

		$liste_actu	 = array();

		while ($item_actu = mysql_fetch_assoc($sql_liste_actu_query)){
			$liste_actu[$item_actu['id']] = $item_actu['titre'];
		}

		return $liste_actu;
	}

	/* RETOURNE LA LISTE DES ELEMENTS D'UNE LISTE D'ACTUALITÉS DONNÉ AUX DATES DONNÉES */
	function get_liste_actu($_id,$_annee,$_mois){
		//echo 'ACTU '.$_id;


		$_mois = strlen($_mois)==1? '0'.$_mois:$_mois;
		$_mois2= strlen($_mois+1)==1? '0'.($_mois+1):($_mois+1);

		$this->news_db->connect_db();
		
		$sql_liste_actu		= sprintf("SELECT DISTINCT id,categorie,titre,date
									FROM actu_item_tb
									WHERE categorie = %s
									AND date >= %s
									AND date < %s
									ORDER BY date DESC",GetSQLValueString($_id,"int"),GetSQLValueString($_annee.'-'.$_mois, "date"),GetSQLValueString($_annee.'-'.($_mois2), "date"));

		$sql_liste_actu_query	= mysql_query($sql_liste_actu) or die(mysql_error());
		$liste_actu			= '';

		date_default_timezone_set("Europe/Paris");
		$format['fr'] = "d";
		

		while ($actu_item = mysql_fetch_assoc($sql_liste_actu_query)){
			$laDate = date($format['fr'],strtotime($actu_item['date']));
			$liste_actu 	.= '<li id="actu@'.$actu_item['id'].'" class="item item_sort"><span class="handler"></span>'.($laDate).' '.$actu_item['titre'].' <a href="?categorie='.$_id.'&annee='.$_annee.'&mois='.$_mois.'&id_actu='.$actu_item['id'].'" target="_blank">voir</a></li>'."\n";
		}
		mysql_free_result($sql_liste_actu_query);

		if($liste_actu == ''){
			$liste_actu = '<li>Aucun élément</li>';
		}	
		return $liste_actu;
	}

	function get_info($_id){
		if(!empty($_id)){
			$this->news_db->connect_db();
			
			$sql_actu	= sprintf("SELECT * FROM actu_item_tb WHERE id=%s",GetSQLValueString($_id,"int"));
			$sql_actu_query = mysql_query($sql_actu) or die(mysql_error());
			$actu_info	= mysql_fetch_assoc($sql_actu_query);
		
			$tab['id']			= $actu_info['id'];
			$tab['date']		= $actu_info['date'];
			$tab['titre']		= $actu_info['titre'];
			$tab['categorie']	= $actu_info['categorie'];
			$tab['soustitre']	= $actu_info['soustitre'];
			$tab['texte']		= $actu_info['texte'];
			$tab['image']		= $actu_info['image'];
			$tab['moreTXT']		= $actu_info['moreTXT'];
			$tab['URL']			= $actu_info['URL'];
			
			return $tab;
		}
	}
}
	
	

?>