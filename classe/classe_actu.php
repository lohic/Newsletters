<?php

//include_once('../vars/constantes_vars.php');
include_once('classe_connexion.php');
include_once('classe_newsletter.php');
include_once('fonctions.php');
include_once('connexion_vars.php');



class Actu {
	
	var $news_db		= NULL;
	var $id				= NULL;
	var $core			= NULL;
	
	/*
	@ GESTION DES actualités
	@
	@
	*/
	function actu($_id=NULL){
		global $news_cInfo;
		$this->news_db		= new connexion($news_cInfo['server'],$news_cInfo['user'],$news_cInfo['password'],$news_cInfo['db']);

		if(isset($_id) && !empty($_id)){
			$this->id = $_id;
		}
	}
	
	function set_core($coreRef){
		$this->core = $coreRef;
	}
	
	/*
	@ création ou modification d'une actualités
	@
	@
	*/
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
			
			$this->update_actu_newsletter($_id);
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
	
	/*
	@ SUPPRIMER UNE ACTUALITÉ
	@
	@
	*/
	function suppr_actu($id=NULL){
		if(isset($id)){
			$this->news_db->connect_db();
			
			// liste des newsletters à archiver
			$news = new Newsletter();
			
			$sql_newsletter_liste			= sprintf("SELECT DISTINCT id_newsletter
												FROM newsletter_item_tb
												WHERE origine = 'actu'
												AND id_origine = %s
												ORDER BY id_newsletter",GetSQLValueString($id, "int"));
			$sql_newsletter_liste_query		= mysql_query($sql_newsletter_liste) or die(mysql_error());
			
			while ($news_id = mysql_fetch_assoc($sql_newsletter_liste_query)){
				$news->create_archive($news_id['id_newsletter']);
			}
			
					
			$cheminImages = BASE_URL.IMG_ACTU.$id.'/';
			$cheminMedias = BASE_URL.ACTU_MEDIA_FOLDER.$id.'/';
			
			sup_repertoire($cheminImages);
			sup_repertoire($cheminMedias);			

			$supprSQL		= sprintf("DELETE FROM actu_item_tb WHERE id=%s", GetSQLValueString($id,'int'));
			$suppr_query	= mysql_query($supprSQL) or die(mysql_error());
			
			$supprSQL		= sprintf("DELETE FROM actu_media_tb WHERE actu_id=%s", GetSQLValueString($id,'int'));
			$suppr_query	= mysql_query($supprSQL) or die(mysql_error());
		}
	}
	
	
	/*
	@ mise à jour des différents items d'une actualités dans les newsletter
	@
	@
	*/
	function update_actu_newsletter($id=NULL){
		if(isset($id)){
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
				/*if($_SERVER["SERVER_NAME"] == 'localhost'){
					$image	= 'http://localhost:8888/Site_SCIENCESPO_NEWSLETTER/actu_images/'.$actu_info['id'].'/'.$actu_info['image'];
				}else{
					$image	= 'http://'.$_SERVER["SERVER_NAME"].'/newsletter/actu_images/'.$actu_info['id'].'/'.$actu_info['image'];
				}*/
				
				$image = SYSTEM_URL.IMG_ACTU.$actu_info['id'].'/'.$actu_info['image'];
			}
			
	
			$this->news_db->connect_db();
	
			/*$updateSQL 		= sprintf("INSERT INTO newsletter_item_tb (origine,id_origine,ordre,id_newsletter,liste_name,date1,horaire,lieu,titre,soustitre,texte,info,image,moreTXT,URL,is_inscription) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
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
													GetSQLValueString($isInscription, "int"));*/
			$updateSQL 		= sprintf("UPDATE newsletter_item_tb SET titre=%s,soustitre=%s,texte=%s,date1=%s,moreTXT=%s,URL=%s,image=%s WHERE id_origine=%s",
													GetSQLValueString($titre, "text"),
													GetSQLValueString($soustitre, "text"),
													GetSQLValueString($texte, "text"),
													GetSQLValueString($date, "date"),
													GetSQLValueString($moreTXT, "text"),
													GetSQLValueString($URL, "text"),
													GetSQLValueString($image, "text"),
													GetSQLValueString($id, "int"));
			
			$update_query	= mysql_query($updateSQL) or die(mysql_error());
		
		}
	}
	
	/*
	@ duplication d'une actualités
	@
	@
	*/
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
	
	/*
	@ création d'une catégorie d'actualités
	@
	@
	*/
	function create_cat($_array_val){
		if(!empty($_array_val)){
			$this->news_db->connect_db();

			$insertSQL 		= sprintf("INSERT INTO actu_cat_tb (libelle,google_analytics_id,template) VALUES (%s,%s,%s)",
													GetSQLValueString($_array_val['libelle'], "text"),
													GetSQLValueString($_array_val['google_analytics_id'], "text"),
													GetSQLValueString($_array_val['template'], "text"));
			$insert_query	= mysql_query($insertSQL) or die(mysql_error());
			
			
			$id_cat = mysql_insert_id();
			
			$this->add_groupe_cat($id_cat,$_array_val['groupe_cat']);
			
		
			return $id_cat;
		}
	}
	
	/*
	@ modification d'une catégorie d'actualités
	@
	@
	*/
	function modif_cat($_array_val=NULL){
		if(!empty($_array_val)){
			$this->news_db->connect_db();

			$updateSQL 		= sprintf("UPDATE actu_cat_tb SET libelle=%s,google_analytics_id=%s,template=%s WHERE id=%s",
													GetSQLValueString($_array_val['libelle'], "text"),
													GetSQLValueString($_array_val['google_analytics_id'], "text"),
													GetSQLValueString($_array_val['template'], "text"),
													GetSQLValueString($_array_val['id'], "int"));
			$update_query	= mysql_query($updateSQL) or die(mysql_error());
			
			$this->add_groupe_cat($_array_val['id'],$_array_val['groupe_cat']);
		}
	}

	/*
	@ suppression d'une catégorie d'actualités
	@
	@
	*/
	function delete_cat($id=NULL){
		if(isset($id)){
			$this->news_db->connect_db();
			
			$updateSQL 		= sprintf("UPDATE actu_item_tb SET categorie=%s WHERE categorie=%s",
													GetSQLValueString(-1, "int"),
													GetSQLValueString($id, "int"));
			$update_query	= mysql_query($updateSQL) or die(mysql_error());

			$suppr_req 		= sprintf("DELETE FROM rel_cat_actu_groupe_tb WHERE id_cat=%s", GetSQLValueString($id,'int'));
			$query_suppr	= mysql_query($suppr_req) or die(mysql_error());

			$suppr_req 		= sprintf("DELETE FROM actu_cat_tb WHERE id=%s", GetSQLValueString($id,'int'));
			$query_suppr	= mysql_query($suppr_req) or die(mysql_error());	
		}
	}

	/*
	@ récupération de la liste des catégories d'actualités
	@
	@
	*/
	function get_cat($idUserGroupes=NULL){
		$this->news_db->connect_db();
		
		$idGroups = implode(',',$idUserGroupes);
		
		
		$sql_get_cat_id = "SELECT id_cat
								FROM rel_cat_actu_groupe_tb
								WHERE id_groupe IN ($idGroups)";
		$sql_get_template_id_query = 	mysql_query($sql_get_cat_id) or die(mysql_error());
		$id_categories = array();
		while ($result = mysql_fetch_assoc($sql_get_template_id_query)){
			$id_categories[] = $result['id_cat'];
		}
		
		if(!empty($idUserGroupes) && intval($this->core->userLevel)>1){
			$groupesFILTER = 'WHERE C.id IN ('.implode(',',$id_categories).')';	
		}else{
			$groupesFILTER = '';
		}
		
		if(implode(',',$id_categories) == NULL && $groupesFILTER != '') $groupesFILTER = 'WHERE C.id IN (-1)';
		

		$sql_liste_cat	= "SELECT *
							FROM actu_cat_tb AS C 
							$groupesFILTER 
							ORDER BY libelle";
		$sql_liste_cat_query = mysql_query($sql_liste_cat) or die(mysql_error());
		$liste_items	= '';
		$date			= '';
		$oldDate		= '';

		$i = 0;
	
		while ($cat = mysql_fetch_assoc($sql_liste_cat_query)){
			
			$class 					= 'listItemRubrique'.($i+1);
			$id						= $cat['id'];
			$nom					= $cat['libelle'];
			$template				= $cat['template'];
			$google_analytics_id	= $cat['google_analytics_id'];
			
			
			$groupes 				= $this->get_groupe($id,$id);
			
			include('../structure/admin-categorie-list-bloc.php');
			
			$i = ($i+1)%2;
		}

	}
	
	/*
	@ GESTION DE LA VISIBILITE DES ACTUALITES SUIVANT LES GROUPES D'UTILISATEURS
	@
	@
	*/
	function get_groupe($_id=NULL,$id_cat=NULL){
				
		$this->news_db->connect_db();
				
		$sql_liste_groupe	= 'SELECT * FROM user_groupes_tb ORDER BY libelle';
		$sql_liste_groupe_query = mysql_query($sql_liste_groupe) or die(mysql_error());
		

		while ($groupe = mysql_fetch_assoc($sql_liste_groupe_query)){
			$temp->label	= $groupe['libelle'];
			$temp->select	= '';
			$temp->value	= $groupe['id'];
			$temp->classe	= 'inline';
			
			if(isset($id_cat)){
				$sql_liste_cat	= "SELECT * FROM rel_cat_actu_groupe_tb WHERE id_groupe=".$groupe['id'];
				$sql_liste_cat_query = mysql_query($sql_liste_cat) or die(mysql_error());
				
				while ($cat= mysql_fetch_assoc($sql_liste_cat_query)){
					if($cat['id_cat']==$id_cat){
						$temp->select	= 'ok';
					}
				}
			}
		
			$groupes[]	= $temp;
			$temp = NULL;
		}

		if($_id){
			$id ='cat_'.$_id;
		}else{
			$id = 'cat';	
		}

		return createCheckBox($groupes,'groupe_cat[]',$id);
	}
	

	
	/*
	@ récupération de la liste des catégories d'actualités sous forme de tableau associatif
	@
	@
	*/
	function get_liste_cat($idUserGroupes){
		$this->news_db->connect_db();

		$filter = $this->check_cat_actu_rights($idUserGroupes,true);

		$sql_liste_cat			= "SELECT C.id,C.libelle
									FROM actu_cat_tb AS C
									$filter
									ORDER BY C.libelle";
		$sql_liste_cat_query	= mysql_query($sql_liste_cat) or die(mysql_error());

		$liste_cat = array();
		
		$liste_cat[-1]	= 'Toutes les categories';

		while ($cat_actu = mysql_fetch_assoc($sql_liste_cat_query)){
			$liste_cat[$cat_actu['id']] = $cat_actu['libelle'];
		}

		return $liste_cat;
	}
	
	
	/*
	@ Vérifie les droits d'un utilisateur sur une rubrique d'actu
	@
	@
	*/
	function check_cat_actu_rights($idUserGroupes=NULL,$isWhere = false){
		
		$this->news_db->connect_db();
		
		$idGroups = implode(',',$idUserGroupes);
				
		$sql_get_template_id = "SELECT id_cat
								FROM rel_cat_actu_groupe_tb
								WHERE id_groupe IN ($idGroups)";
		$sql_get_template_id_query = 	mysql_query($sql_get_template_id) or die(mysql_error());
		$id_templates = array();
		while ($result = mysql_fetch_assoc($sql_get_template_id_query)){
			$id_templates[] = $result['id_cat'];
		}
		
		$condition = $isWhere ? 'WHERE':'AND';
		
		if(!empty($idUserGroupes) && intval($this->core->userLevel)>1){
			$groupesFILTER = $condition.' C.id IN ('.implode(',',$id_templates).')';	
		}else{
			$groupesFILTER = '';
		}
		
		if(implode(',',$id_templates) == NULL && $groupesFILTER != '') $groupesFILTER = $condition.' C.id IN (-1)';
		
		return $groupesFILTER;
	}
	

	/*
	@ récupération de la liste des actualités sous forme de tableau associatif
	@ en fonction d'un catégorie, d'une année et d'un mois
	@
	*/
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
	
	/*
	@ récupération de la liste des actualités (pour l'administration)
	@ en fonction d'un catégorie, d'une année et d'un mois
	@
	*/
	function get_actu_liste($_cat,$_annee=NULL,$_mois=NULL, $idUserGroupes=NULL ){
		$this->news_db->connect_db();
								
		if(empty($_cat)) 	$_cat = -1;
		if(empty($_annee))	$_annee = date('Y');
		if(empty($_mois))	$_mois = date('m');
		
		$idGroups = implode(',',$idUserGroupes);
		
		
		$sql_get_cat_id = "SELECT id_cat
								FROM rel_cat_actu_groupe_tb
								WHERE id_groupe IN ($idGroups)";
		$sql_get_template_id_query = 	mysql_query($sql_get_cat_id) or die(mysql_error());
		$id_categories = array();
		while ($result = mysql_fetch_assoc($sql_get_template_id_query)){
			$id_categories[] = $result['id_cat'];
		}
		
		if(!empty($idUserGroupes) && intval($this->core->userLevel)>1){
			$groupesFILTER = 'AND C.id IN ('.implode(',',$id_categories).')';	
		}else{
			$groupesFILTER = '';
		}
		
		if(implode(',',$id_categories) == NULL && $groupesFILTER != '') $groupesFILTER = 'AND C.id IN (-1)';
				
		$signe = '=';
		if($_cat == -1) $signe = '<>';
		if($_cat == -1) $_cat = 0;
		
		$_mois = strlen($_mois)==1? '0'.$_mois:$_mois;
		$_mois2= strlen($_mois+1)==1? '0'.($_mois+1):($_mois+1);

		$sql_liste_actu			= sprintf("SELECT DISTINCT A.id,A.titre,A.date,C.libelle
									FROM actu_item_tb AS A LEFT JOIN actu_cat_tb AS C ON A.categorie = C.id
									WHERE A.categorie $signe %s
									AND A.date >= %s
									AND A.date < %s
									$groupesFILTER
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
			
			include('../structure/actu-list-bloc.php');
			
			$i = ($i+1)%2;
			
		}
	}
	

	/*
	@ RETOURNE LA LISTE DES ELEMENTS D'UNE LISTE D'ACTUALITÉS DONNÉ AUX DATES DONNÉES
	@ pour la génération d'une newsletter
	@ drag & drop
	*/
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
	
	
	

	/*
	@ renvoie les valeurs d'une actualité
	@ sous forme de tableau associatif
	@ 
	*/
	function get_info($_id,$all_media = true){
		if(!empty($_id)){
			$this->news_db->connect_db();
			
			$sql_actu	= sprintf("SELECT a.id AS id,
									a.titre AS titre,
									a.date AS date,
									a.categorie AS categorie,
									a.soustitre AS soustitre,
									a.texte AS texte,
									a.image AS image,
									a.moreTXT AS moreTXT,
									a.URL AS URL,
									c.libelle AS libelle_cat,
									c.template AS template,
									c.google_analytics_id AS google_analytics_id,
									c.footer_id AS footer_id
									FROM actu_item_tb AS a
									LEFT JOIN actu_cat_tb AS c
									ON a.categorie = c.id
									WHERE a.id=%s",GetSQLValueString($_id,"int"));
			$sql_actu_query = mysql_query($sql_actu) or die(mysql_error());
			$actu_info	= mysql_fetch_assoc($sql_actu_query);
		
		
			$tab['id']					= $actu_info['id'];
			$tab['date']				= $actu_info['date'];
			$tab['titre']				= $actu_info['titre'];
			$tab['categorie']			= $actu_info['categorie'];
			$tab['soustitre']			= $actu_info['soustitre'];
			$tab['texte']				= $actu_info['texte'];
			$tab['image']				= $actu_info['image'];
			$tab['moreTXT']				= $actu_info['moreTXT'];
			$tab['URL']					= $actu_info['URL'];
			$tab['template']			= isset($actu_info['template'])?$actu_info['template']:'classique';
			$tab['google_analytics_id']	= $actu_info['google_analytics_id'];
			$tab['libelle_cat']			= $actu_info['libelle_cat'];
			$tab['footer_id']			= $actu_info['footer_id'];
			
			$tab['medialiste']			= $this->return_media_liste($_id,$all_media);
			
			return $tab;
		}
	}
	
	
	/*
	@ génération d'une actualité
	@ avec liaison vers le template d'actualité
	@
	*/
	function generate_actu(){
		
		if(isset($this->id)){
			
			$info = $this->get_info($this->id,false);
			
			$template				= $info['template'];
			//$templateFolder			= BASE_URL.TEMPLATE_ACTU_FOLDER.$info['template'];
			$templateFolder			= ABSOLUTE_URL.TEMPLATE_ACTU_FOLDER.$info['template'];
			//echo $templateFolder	;
			$ladate					= $info['date'];
			$GoogleAnalyticsCode	= $info['google_analytics_id'];
			
			ob_start();
			include_once('../structure/actu-generate.php');
			$contents = ob_get_contents();
			ob_end_clean();
			return $contents;	
		}
	}
	
	
	/*
	@ edition de destinataire
	@
	@
	*/
	function add_groupe_cat($_id_cat=NULL, $_array_groupe=NULL){
		
		
		if(!empty($_id_cat) && !empty($_array_groupe)){
			$this->clean_groupe($_id_cat);
			
			
			$this->news_db->connect_db();

			foreach($_array_groupe as $_id_groupe){
				$insertSQL 		= sprintf("INSERT INTO rel_cat_actu_groupe_tb (id_cat,id_groupe) VALUES (%s,%s)",
														GetSQLValueString($_id_cat, "int"),
														GetSQLValueString($_id_groupe, "int"));
				$insert_query	= mysql_query($insertSQL) or die(mysql_error());
			}
		}
	}
	
	/*
	@ edition de destinataire
	@
	@
	*/
	function clean_groupe($_id_cat=NULL){
		if(!empty($_id_cat)){
			$this->news_db->connect_db();

			$supprSQL		= sprintf("DELETE FROM rel_cat_actu_groupe_tb WHERE id_cat=%s", GetSQLValueString($_id_cat,'int'));
			$suppr_query	= mysql_query($supprSQL) or die(mysql_error());
		}
	}
	
	/*
	@ UPLOAD DES MEDIAS LIES A UNE ACTUALITE
	@
	@
	*/	
	function upload_media_liste($files=NULL,$id_actu=NULL){
		if($files && $id_actu){
			$uploaded = 0; 
			$message = array(); 
			
			$chemin = ACTU_MEDIA_FOLDER.$id_actu.'/';
			
			if(!is_dir(BASE_URL.$chemin)){
				mkdir(BASE_URL.$chemin, 0777, true);	
			}
			
			foreach ($files['name'] as $i => $name) { 
				
				if ($files['error'][$i] == 4) { 
					continue;  
				} 
				
				if ($files['error'][$i] == 0) { 
					
					 if ($files['size'][$i] > 99439443) { 
						$message[] = "$name dépasse la limite de poids."; 
						continue;   
					 } 
					 
					 file_put_contents( BASE_URL.$chemin.$files['name'][$i], file_get_contents($files['tmp_name'][$i]));
			
					$ext = substr(strrchr($files['name'][$i],'.'),1);
					
					$insertSQL 		= sprintf("INSERT INTO actu_media_tb (fichier,actu_id,type) VALUES (%s,%s,%s)",
																GetSQLValueString($files['name'][$i], "text"),
																GetSQLValueString($id_actu, "int"),
																GetSQLValueString($ext, "text"));
					$insert_query	= mysql_query($insertSQL) or die(mysql_error());				 
					 
					 $uploaded++; 
				} 
			} 
			
			$retour =  $uploaded . ' fichiers téléchargés.'; 
			
			foreach ($message as $error) { 
			  $retour .= $error; 
			} 	
			
			return $retour;
		}
	}
	
	
	
	/*
	@ RECUPERE LA LISTE DES FICHIERS ASSOCIES A UNE ACTU
	@
	@
	*/
	function get_media_liste($id_actu=NULL,$all = true){
		if($id_actu){
			
			if($all == false){
				$filtre = "AND cache = 0";	
			}else{
				$filtre = "";	
			}
			
			$sql_get_media = sprintf("SELECT *
								FROM actu_media_tb
								WHERE actu_id = %s
								$filtre
								ORDER BY type",GetSQLValueString($id_actu,"int"));
			$sql_get_media_query = 	mysql_query($sql_get_media) or die(mysql_error());

			$liste = array();
			$i = 0;

			while ($result = mysql_fetch_assoc($sql_get_media_query)){
				$liste[$i]['fichier'] = $result['fichier'];
				$liste[$i]['ext'] = $result['type'];
				$liste[$i]['id'] = $result['id'];
				$liste[$i]['cache'] = $result['cache'];
				
				$i++;
			}
			
			return $liste;

		}
	}
	
	/*
	@ RETOURNE LES FICHIERS LIÉS SOUS FORME DE LISTE UL
	@
	@
	*/
	function return_media_liste($id_actu=NULL,$all = true){
		if($id_actu){
			
			
			
			$fichiers = $this->get_media_liste($id_actu, $all);
			
			
			$retour = "<ul class='medialist'>\n";
			
			foreach($fichiers as $file){
				$icone = $file['cache'] == 1 ? 'eye_inv.png' : 'eye.png';
				
				$suppr = $this->core->isAdmin == true ? '<a href="javascript:" onclick="supprMedia('.$file['id'].')"><img src="../graphisme/trash.png" alt="supprimer" width="18" height="18"/></a> ':'';
				$show  = $this->core->isAdmin == true ? '<a href="javascript:" onclick="showMedia('.$file['id'].')"><img src="../graphisme/'.$icone.'" alt="afficher/masquer" width="18" height="18"/></a> ' : '';
				
				$retour.= "<li class='".$file['ext']."'>$suppr $show<a href='".ABSOLUTE_URL.ACTU_MEDIA_FOLDER.$id_actu.'/'.	$file['fichier']."' target='_blank'>".$file['fichier']."</a></li>\n";
			}
			
			$retour.= "</ul>\n";
			
			return $retour;
				
		}
	}
	
	/*
	@ edition de destinataire
	@
	@
	*/
	function suppr_media($_id_media=NULL){
		if(!empty($_id_media)){
			$this->news_db->connect_db();
			
			$sql_get_media = sprintf("SELECT *
								FROM actu_media_tb
								WHERE id = %s",GetSQLValueString($_id_media,"int"));
			$sql_get_media_query = 	mysql_query($sql_get_media) or die(mysql_error());
			$media_info	= mysql_fetch_assoc($sql_get_media_query);
			
			unlink(BASE_URL.ACTU_MEDIA_FOLDER.$media_info['actu_id'].'/'.$media_info['fichier']);
			

			$supprSQL		= sprintf("DELETE FROM actu_media_tb WHERE id=%s", GetSQLValueString($_id_media,'int'));
			$suppr_query	= mysql_query($supprSQL) or die(mysql_error());
		}
	}
	
	function update_visibility($_id=NULL){
		if(!empty($_id)){
			$sql_get_media = sprintf("SELECT cache,actu_id
								FROM actu_media_tb
								WHERE id = %s",GetSQLValueString($_id,"int"));
			$sql_get_media_query = 	mysql_query($sql_get_media) or die(mysql_error());
			$media_info	= mysql_fetch_assoc($sql_get_media_query);
			
			$cache = $media_info['cache'] == 1 ? 0 : 1;
			
			$updateSQL 		= sprintf("UPDATE actu_media_tb SET cache=%s WHERE id=%s",
													GetSQLValueString($cache, "int"),
													GetSQLValueString($_id, "int"));
			$update_query	= mysql_query($updateSQL) or die(mysql_error());
			
			return $this->return_media_liste($media_info['actu_id']);
		}
	}
	
}
	
	

?>