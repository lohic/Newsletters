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
	
	
	function update_actu_newsletter($id=NULL){
		/*if(isset($id)){
			$date	= NULL;
			$titre	= NULL;		
			$texte	= NULL;
			$info	= NULL;
			
			$origine		= $_origine;
			$id_origine 	= $_id_origine;
			$ordre			= $_ordre;
			$id_newsletter	= $this->id_newsletter;
			$liste_name		= $_liste_name;
			
			$date1			= '';
			$date2			= '';	
			$horaire		= '00:00:00';
			$lieu			= '';
			$titre			= '';
			$soustitre		= '';
			$texte			= '';
			$info			= '';
			$image			= '';
			$moreTXT		= '';
			$URL			= '';
			$isInscription	= false;
	
			////// FORMATAGE DES ELEMENTS ACTU
			$this->news_db->connect_db();
			$sql_actu_info			= sprintf("SELECT 	*
												FROM actu_item_tb
												WHERE id=%s",GetSQLValueString($id, "int"));
			$sql_actu_info_query	= mysql_query($sql_actu_info) or die(mysql_error());
			$actu_info				= mysql_fetch_assoc($sql_actu_info_query);
			
			$titre		= $actu_info['titre'];
			$soustitre	= $actu_info['soustitre'];
			$texte		= $actu_info['texte'];
			$date		= date("Y-m-d",strtotime($actu_info['date']));
			$moreTXT	= $actu_info['moreTXT'];
			$URL		= $actu_info['URL'];
			if(isset($actu_info['image']) && $actu_info['image']!=''){
				if($_SERVER["SERVER_NAME"] == 'localhost'){
					$image	= 'http://localhost:8888/Site%20SCIENCESPO%20NEWSLETTER/actu_images/'.$actu_info['id'].'/'.$actu_info['image'];
				}else{
					$image	= 'http://'.$_SERVER["SERVER_NAME"].'/newsletter/actu_images/'.$actu_info['id'].'/'.$actu_info['image'];
				}
			}
			
	
			$this->news_db->connect_db();
	
			$updateSQL 		= sprintf("INSERT INTO newsletter_item_tb (origine,id_origine,ordre,id_newsletter,liste_name,date1,horaire,lieu,titre,soustitre,texte,info,image,moreTXT,URL,is_inscription) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
													GetSQLValueString($origine, "text"),
													GetSQLValueString($id_origine, "int"),
													GetSQLValueString($ordre, "int"),
													GetSQLValueString($id_newsletter, "int"),
													GetSQLValueString($liste_name, "text"),
													GetSQLValueString($date, "date"),
													GetSQLValueString($horaire, "date"),
													GetSQLValueString($lieu, "text"),
													GetSQLValueString($titre, "text"),
													GetSQLValueString($soustitre, "text"),
													GetSQLValueString($texte, "text"),
													GetSQLValueString($info, "text"),
													GetSQLValueString($image, "text"),
													GetSQLValueString($moreTXT, "text"),
													GetSQLValueString($URL, "text"),
													GetSQLValueString($isInscription, "int"));
			
			$update_query	= mysql_query($updateSQL) or die(mysql_error());
		
		}*/
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
			
			//MODIFICATION
			$sql_actu	= sprintf("SELECT titre FROM actu_item_tb WHERE id=%s",GetSQLValueString($id_duplicate,"int"));
			$sql_actu_query = mysql_query($sql_actu) or die(mysql_error());
			$actu_info	= mysql_fetch_assoc($sql_actu_query);
			
			$updateSQL 		= sprintf("UPDATE actu_item_tb SET titre=%s WHERE id=".GetSQLValueString($id_duplicate,"int"),
													GetSQLValueString($actu_info['titre']." (copie)",		"text"));
			$update_query	= mysql_query($updateSQL) or die(mysql_error());
			
			
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = '?page=actu_modif&id_actu='.$id_duplicate;
			header("Location: http://$host$uri/$extra");
			exit;
			
			//return $id_duplicate;
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

		$i = 0;
	
		while ($cat = mysql_fetch_assoc($sql_liste_cat_query)){
			
			$class  = 'listItemRubrique'.($i+1);
			$id = $cat['id'];
			$nom = $cat['libelle'];
			
			include('structure/admin-categorie-list-bloc.php');
			
			$i = ($i+1)%2;
		}

		//return createCheckBox($cat_actu,'cat_actu[]','cat_actu');
	}

	

	function get_liste_cat(){
		$this->news_db->connect_db();

		$sql_liste_cat			= 'SELECT id,libelle FROM actu_cat_tb ORDER BY libelle';
		$sql_liste_cat_query	= mysql_query($sql_liste_cat) or die(mysql_error());

		$liste_cat = array();
		
		$liste_cat[-1]	= 'Toutes les categories';

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
	
	function get_actu_liste($_cat,$_annee=NULL,$_mois=NULL){
		$this->news_db->connect_db();
				
		if(empty($_cat)) 	$_cat = -1;
		if(empty($_annee))	$_annee = date('Y');
		if(empty($_mois))	$_mois = date('m');
		
		$signe = '=';
		if($_cat == -1) $signe = '<>';

		$_mois = strlen($_mois)==1? '0'.$_mois:$_mois;
		$_mois2= strlen($_mois+1)==1? '0'.($_mois+1):($_mois+1);

		$sql_liste_actu			= sprintf("SELECT A.id,A.titre,A.date,C.libelle
									FROM actu_item_tb AS A, actu_cat_tb AS C
									WHERE A.categorie $signe %s
									AND A.date >= %s
									AND A.date < %s
									AND A.categorie = C.id
									ORDER BY A.date DESC, A.id DESC",GetSQLValueString($_cat,"int"),GetSQLValueString($_annee.'-'.$_mois, "date"),GetSQLValueString($_annee.'-'.($_mois2), "date"));
		$sql_liste_actu_query	= mysql_query($sql_liste_actu) or die(mysql_error());


		$i = 0;

		while ($actu_item = mysql_fetch_assoc($sql_liste_actu_query)){
			//$liste_news[$news_item['id']]	= 'n°'.$news_item['id'].' : '.$news_item['nom'];
			
			$class  = 'listItemRubrique'.($i+1);
			$id = $actu_item['id'];
			$titre = $actu_item['titre'];
			$date = $actu_item['date'];
			$categorie = $actu_item['libelle'];
			
			include('structure/actu-list-bloc.php');
			
			$i = ($i+1)%2;
			
		}
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
			$liste_actu 	.= '<li id="actu@'.$actu_item['id'].'" class="item item_sort"><span class="handler"></span>'.($laDate).' '.$actu_item['titre'].' <a href="?page=actu_modif&id_actu='.$actu_item['id'].'" target="_blank">voir</a></li>'."\n";
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