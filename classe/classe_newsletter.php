<?php

/***************************************
@ 
@ CLASSE NEWSLETTER
@ Author : Loïc Horellou
@ http://www.syclo.fr
@ loic@syclo.fr
@
***************************************/

//include_once('../vars/constantes_vars.php');
include_once('classe_connexion.php');
include_once('fonctions.php');
include_once('connexion_vars.php');

class Newsletter {
	
	var $evenement_db		= NULL;
	var $evenement_new_db	= NULL;
	var $news_db			= NULL;
	var $id_newsletter		= NULL;
	var $id_unique			= NULL;
	var $core				= NULL;
	var $mode				= "gene";
	
	/*
	@ PREPARATION DU CONTENU DE LA PAGE
	@
	@
	*/
	function newsletter($_id_newsletter = NULL,$_mode = NULL,$_unique = NULL){
		
		
		date_default_timezone_set('UTC');

		global $evenement_cInfo;
		global $evenement_new_cInfo;
		global $news_cInfo;

		$this->evenement_db		= new connexion($evenement_cInfo['server'],
												$evenement_cInfo['user'],
												$evenement_cInfo['password'],
												$evenement_cInfo['db']);
		$this->evenement_new_db = new connexion($evenement_new_cInfo['server'],
												$evenement_new_cInfo['user'],
												$evenement_new_cInfo['password'],
												$evenement_new_cInfo['db']);
		$this->news_db			= new connexion($news_cInfo['server'],
												$news_cInfo['user'],
												$news_cInfo['password'],
												$news_cInfo['db']);

		if(empty($_unique)){
			$this->id_newsletter= intval($_id_newsletter);
		}else{
			$this->id_newsletter= $this->set_unique($_unique);
		}
		$this->id_unique = $this->unique_id();
	
		if(isset($_mode)) $this->mode = $_mode;

		if(isset($_POST['edit'])){
			if($_POST['edit'] == 'create'){
				$id = $this->newsletter_create();
				
				header("Location: index.php?id_newsletter=$id");
				exit;
			}else if($_POST['edit'] == 'update_info'){
				$this->set_newsletter_info();
			}
		}
		
		/*
		!!!!!!!! A ENLEVER APRES 
		*/
		//$this->create_archive();
	}
	
	function set_core($coreRef){
		$this->core = $coreRef;
	}
	
	/*
	@ recupération d'un ID en fonction du UNIQUE_ID
	@ UTILISÉ DANS LE CONSTRUCTEUR
	@
	*/
	function set_unique($unique=NULL){
		if(!empty($unique)){
			$this->news_db->connect_db();
			
			$sql_info	= sprintf("SELECT id FROM newsletter_tb WHERE unique_id=%s ORDER BY id DESC",GetSQLValueString($unique, "text"));
			$sql_info_query = mysql_query($sql_info) or die(mysql_error());
			$info = mysql_fetch_assoc($sql_info_query);
			
			return $info['id'];
		}
	}
	
	/*
	@ recupération d'un ID en fonction du UNIQUE_ID
	@ NE SERT A RIEN !!!!!!!!!
	@
	*/
	function get_unique($unique=NULL){
		if(!empty($unique)){
			$this->news_db->connect_db();
			
			$sql_info	= sprintf("SELECT id FROM newsletter_tb WHERE unique_id=%s ORDER BY id DESC",GetSQLValueString($unique, "text"));
			$sql_info_query = mysql_query($sql_info) or die(mysql_error());
			$info = mysql_fetch_assoc($sql_info_query);
			
			return $info['id'];
		}
	}
	
	/*
	@ recupération du UNIQUE_ID en fonction d'un ID
	@
	@
	*/
	function unique_id(){
		$this->news_db->connect_db();

		$sql_info	= sprintf("SELECT unique_id FROM newsletter_tb WHERE id=%s",GetSQLValueString($this->id_newsletter, "int"));
		$sql_info_query = mysql_query($sql_info) or die(mysql_error());
		$info = mysql_fetch_assoc($sql_info_query);
	

		return $info['unique_id'];
	}

	/*
	@ RECUPERE LA LISTE DES ELEMENTS DANS LA DB DU SITE EVENEMENTS
	@
	@
	*/
	function get_liste_evenements($year,$month){
		$this->evenement_db->connect_db();
		
		$sql_liste_events		= sprintf('SELECT DISTINCT albums.event_id AS id,
											albums.title AS titre,
											albums.dateFrom AS date1,
											albums.dateTo AS date2
									FROM albums
									LEFT JOIN images
									ON images.event_id = albums.event_id
									WHERE albums.status = 1 
									AND albums.dateFromFormat>=%s
									AND albums.dateFromFormat<=%s
									ORDER BY dateFromFormat DESC',GetSQLValueString($year.$month.'01', "text"),GetSQLValueString($year.$month.'31', "text"));
		
		//AND albums.displayHome = 1
		$sql_liste_events_query	= mysql_query($sql_liste_events) or die(mysql_error());
		$liste_events			= '';

		while ($event = mysql_fetch_assoc($sql_liste_events_query)){
			$liste_events 	.= '<li id="evenement_db@'.$event['id'].'" class="item item_sort" title="'.htmlentities($event['titre']).'"><span class="handler"></span>'.substr($event['date1'],0,2).' : '.substr($event['titre'],0,40).'... <a href="http://capricorne.sciences-po.fr/evenements/?eventId='.$event['id'].'" target="_blank">voir</a></li>'."\n";
		}

		mysql_free_result($sql_liste_events_query);

		if($liste_events == ''){
			$liste_events = '<li>Aucun élément</li>';
		}	

		return $liste_events;
		
	}
	
	/* 
	@ RECUPERE LA LISTE DES ELEMENTS DANS LA DB DU NOUVEAU SITE EVENEMENTS
	@
	@
	*/
	function get_liste_evenements_new($year,$month,$lang='fr',$id_organisme=1){
		$this->evenement_new_db->connect_db();
		
		$timestamp_start = mktime(0,0,0,$month,0,$year);
		$timestamp_end	 = mktime(0,0,0,$month+1,0,$year);
		
		$add = $lang != 'fr' ? '_'.$lang:'';
		
		$sql_liste_events		= sprintf('SELECT E.evenement_id AS id,
											E.evenement_titre'.$add.' AS titre,
											E.evenement_date AS date1 
											FROM sp_evenements AS E, sp_organismes AS O, sp_groupes AS G
											WHERE E.evenement_statut=3
											AND E.evenement_date >= %s
											AND E.evenement_date < %s
											AND E.evenement_groupe_id = G. groupe_id
											AND G.groupe_organisme_id = O.organisme_id
											AND O.organisme_id = %s
											ORDER BY E.evenement_date DESC',	GetSQLValueString($timestamp_start, "int"),
																			GetSQLValueString($timestamp_end, "int"),
																			GetSQLValueString($id_organisme,"int"));
		
		$sql_liste_events_query	= mysql_query($sql_liste_events) or die(mysql_error());
		$liste_events			= '';

		while ($event = mysql_fetch_assoc($sql_liste_events_query)){
			$ladate = date('d',$event['date1']);
			
			$liste_events 	.= '<li id="evenement_new'.$add.'_db@'.$event['id'].'" class="item item_sort" title="'.htmlentities($event['titre']).'"><span class="handler"></span>'.$ladate.' : '.substr($event['titre'],0,40).'... <a href="http://www.sciencespo.fr/evenements/event.php?id='.$event['id'].'" target="_blank">voir</a></li>'."\n";
		}

		mysql_free_result($sql_liste_events_query);

		if($liste_events == ''){
			$liste_events = '<li>Aucun élément</li>';
		}	

		return $liste_events;
	}
	

	/*
	@ RECUPERE LA LISTE DES ELEMENTS EXISTANTS DANS UNE NEWSLETTER DONNEE
	@
	@
	*/
	function get_newsletter_items($valeur=NULL,$bloc=NULL,$max_bloc=NULL,$titre_suite=NULL,$inline_css=NULL){
		if(isset($this->id_newsletter)){
			$this->news_db->connect_db();

			$sql_liste_item_news	= sprintf('SELECT 	*
												FROM newsletter_tb
												LEFT JOIN newsletter_item_tb
												ON newsletter_item_tb.id_newsletter = newsletter_tb.id
												WHERE newsletter_tb.id = %s
												AND newsletter_item_tb.liste_name = %s
												AND newsletter_item_tb.id <> \'NULL\'
												ORDER BY ordre',GetSQLValueString($this->id_newsletter, "int"),GetSQLValueString('#'.$valeur, "text"));
			$sql_liste_item_news_query	= mysql_query($sql_liste_item_news) or die(mysql_error());
			$num_item_news				= mysql_num_rows($sql_liste_item_news_query);

			$liste_items				= '';
			$isMaxBlocDefined			= isset($max_bloc)?true:false;

			if($num_item_news>0){

				if($this->mode == 'gene'){
					while ($item = mysql_fetch_assoc($sql_liste_item_news_query)){
						$lien ='';
						if($item['origine']=='evenement_db'){
							$lien	= 'http://capricorne.sciences-po.fr/evenements/?eventId='.$item['id_origine'];
						}else if($item['origine']=='rss'){
							$lien	= $item['URL'];
						}else if($item['origine']=='actu'){
							$lien	= '?page=actu_modif&id_actu='.$item['id_origine'];
						}else if($item['origine']=='evenement_new_db'){
							//$lien	= 'http://www.sciencespo.fr/evenements/event.php?id='.$item['id_origine'];
							$lien	= $item['URL_front'].'event.php?id='.$item['id_origine'];
						}else if($item['origine']=='evenement_new_en_db'){
							//$lien	= 'http://www.sciencespo.fr/evenements/event.php?id='.$item['id_origine'].'&lang=en';
							$lien	= $item['URL_front'].'event.php?id='.$item['id_origine'].'&lang=en';
						}
				
						$liste_items 	.= '<li id="'.$item['origine'].'@'.$item['id_origine'].'" class="item item_sort"><span class="handler"></span><span class="trash"></span>'.$item['date1'].' : '.$item['titre'].' <a href="'.$lien.'" target="_blank">voir</a></li>'."\n";
					}



				}else if($this->mode=='show'){
					$template = $this->get_template($this->id_newsletter);
					
					// DETECTION D'UN STYLE CSS INLINE POUR LES UL ET LI
					$inline_ul = !empty($inline_css['ul'])?$inline_css['ul']:'';
					$inline_li = !empty($inline_css['li'])?$inline_css['li']:'';
					
					$compteur_var = 1;
					if(isset($max_bloc)){
						$more_list = isset($titre_suite)?'<h2 style="clear:both;">'.$titre_suite.'</h2>'."\n".'<ul id="more_'.$valeur.'" style="'.$inline_ul.'">':'<ul id="more_'.$valeur.'" style="'.$inline_ul.'">';
					}
					
					if(!isset($max_bloc)){
						$max_bloc = mysql_num_rows($sql_liste_item_news_query);	
					}
					
					while ($item = mysql_fetch_assoc($sql_liste_item_news_query)){
						
						if($compteur_var <= $max_bloc){			
							$date			= ucfirst(dateNewsletter($item['date1'],$GLOBALS['moisListe'],$GLOBALS['jourListe']));
							$horaire		= horaireNewsletter($item['horaire']);
							$titre			= $item['titre'];
							$soustitre		= $item['soustitre'];
							$texte			= $item['texte'];
							$lieu			= $item['lieu'];
							$info			= $item['info'];
							$id				= $item['id'];
							$moreTXT		= $item['moreTXT'];
							$URL			= $item['URL'];
							$URL_front		= $item['URL_front'];
							$id_event		= $item['id_origine'];
							$news_id		= $this->id_unique;
							$origine		= $item['origine'];
							$isInscription	= $item['is_inscription'];
							$couleur		= $item['couleur'];
							
							$linkToActu		= false;
							
							if(isset($item['image'])){
								$image = $item['image'];
							}else{
								$image = NULL;
							}
							
							if($origine == "evenement_db"){
								$itemURL	= 'http://capricorne.sciences-po.fr/evenements/?eventId='.$id_event;
							}else if($origine == "evenement_new_db"){
								//$itemURL	= 'http://www.sciencespo.fr/evenements/event.php?id='.$id_event;
								$itemURL	= $URL_front.'event.php?id='.$id_event;
							}else if($origine == "evenement_new_en_db"){
								//$itemURL	= 'http://www.sciencespo.fr/evenements/event.php?id='.$id_event.'&lang=en';
								$itemURL	= $URL_front.'event.php?id='.$id_event.'&lang=en';
								
								setlocale(LC_ALL, 'en_EN');
								$timestamp_tab = explode('-',$item['date1']);
								$timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
								
								$date		= utf8_encode(strftime('%B %e, %Y',$timestamp));
							}else if($origine == "actu"){
								$itemURL	= ABSOLUTE_URL.'actu/?id='.$id_event;
							}else{
								$itemURL	= NULL;
							}
							
							if(!empty($soustitre) && $origine == "actu"){
								$linkToActu	= true;
							}
							
							if($origine == "evenement_new_en_db") {$origine = "evenement_new_db" ;}
															
							include('../template/'.$this->get_template($this->id_newsletter,true).'/'.$bloc);
						}else{
							if(isset($max_bloc)){
								$origine	= $item['origine'];
								$URL_front		= $item['URL_front'];
								
								if($origine == "evenement_db"){
									$id_event	= $item['id_origine'];
									$URL = 'http://capricorne.sciences-po.fr/evenements/?eventId='.$id_event;
								}else if($origine == "evenement_new_db"){
									$id_event	= $item['id_origine'];
									//$URL = 'http://www.sciencespo.fr/evenements/event.php?id='.$id_event;
									$URL = $URL_front.'event.php?id='.$id_event;
								}else if($origine == "evenement_new_en_db"){
									$id_event	= $item['id_origine'];
									//$URL = 'http://www.sciencespo.fr/evenements/event.php?id='.$id_event.'&lang=en';
									$URL = $URL_front.'event.php?id='.$id_event.'&lang=en';
								}else if($origine == "actu"){									
									$id_event	= $item['id_origine'];
									//$URL = 'http://www.sciencespo.fr/newsletter/actu/?id='.$id_event;
									$URL = ABSOLUTE_URL.'actu/?id='.$id_event;
								}else{
									$URL = $item['URL'];
								}
								
								if($origine == "evenement_new_en_db") {$origine = "evenement_new_db" ;}
								
								$more_list .= '<li style="'.$inline_li.'"><a name="item-'.$item['id'].'" id="item-'.$item['id'].'"></a><a href="'.$URL.'" target="_blank">'.$item['titre'].'</a></li>'."\n";
							}
						}
											
						$compteur_var ++;
					}	
					if(isset($max_bloc) && $isMaxBlocDefined){
						echo $more_list.'</ul>';
					}
				}
			}
	
			mysql_free_result($sql_liste_item_news_query);
	
			return $liste_items;
		}
	}

	/*
	@ RECUPERE LE CONTENU D'UNE NEWSLETTER
	@
	@
	*/
	function generate_newsletter($id=NULL){
		$id_newsletter = NULL;
		
		//header("Location: ../newsletter_archive/2011/09/12/newsletter_bak.html");
		//include("../newsletter_archive/2011/09/12/newsletter_bak.html");
		
		
		if(isset($id)){
			$id_newsletter = $id;
		}else if(isset($this->id_newsletter)){
			$id_newsletter = $this->id_newsletter;	
		}
		
		
		if(isset($id_newsletter)){
			
			$sql_info = "SELECT date, unique_id, is_archive FROM newsletter_tb WHERE id = ".$id_newsletter;
			$sql_info_query = mysql_query($sql_info) or die(mysql_error());
			$info = mysql_fetch_assoc($sql_info_query);

			$tabDate = explode('-',$info['date']);
			
			$annee		= $tabDate[0];
			$mois		= $tabDate[1];
			$uniqueID	= $info['unique_id'];
			
			if($info['is_archive']==1){
				ob_start();
				include_once(LOCAL_PATH.ARCHIVE_FOLDER.$annee.'/'.$mois.'/'.$id_newsletter.'/'.$uniqueID.'.html') ;
				$contents .= ob_get_contents();
				ob_end_clean();
				
				return $contents;
				
			}else{
			
				ob_start();
				//include_once('../admin-new/newsletter_generate.php');
				include_once('../structure/newsletter-generate.php');
				$contents = ob_get_contents();
				ob_end_clean();
				return encodeAccentHTML($contents);
				
				//return $contents;
			}
		}
	}
	
	/*
	@ ENVOI D'UNE NEWSLETTER
	@
	@
	*/
	function send_newsletter($from=NULL,$mail_liste=NULL,$id=NULL){
		if(isset($from) && isset($mail_liste) && isset($id)){
			
			$mail_header = $this->get_mail_header($id);
		
			$headers  	= 'MIME-Version: 1.0'."\r\n";
			$headers	.= 'Content-type: text/html; charset=UTF-8'."\r\n";
			$headers	.= "From:".$mail_header->from."\r\n";
			$headers	.= "Reply-To:".$mail_header->reply_to."\r\n";
		
			$message 	= $this->generate_newsletter($id);
			$objet		= $this->get_objet($id);
		
			foreach($mail_liste as $destinataire){
				$sentOk = mail($destinataire,$objet,$message,$headers);
			}
		}
	}
	
	/*
	@ RECUPERE L'OBJET d'une newsletter
	@
	@
	*/
	function get_mail_header($id){
		$this->news_db->connect_db();
		$sql_info			= sprintf('SELECT T.from as `from`, T.reply_to as reply_to
										FROM template_tb as T, newsletter_tb as N
										WHERE N.template = T.id 
										AND N.id =%s',GetSQLValueString($id, "int"));
		$sql_info_query		= mysql_query($sql_info) or die(mysql_error());
		$info				= mysql_fetch_assoc($sql_info_query);

		$retour->from		= $info['from'];
		$retour->reply_to	= $info['reply_to'];
		return $retour;
	}
	
	/*
	@ RECUPERE L'OBJET d'une newsletter
	@
	@
	*/
	function get_objet($id){
		$this->news_db->connect_db();
		$sql_info		= sprintf('SELECT objet	FROM newsletter_tb WHERE newsletter_tb.id=%s',GetSQLValueString($id, "int"));
		$sql_info_query	= mysql_query($sql_info) or die(mysql_error());
		$info			= mysql_fetch_assoc($sql_info_query);

		$retour = $info['objet'];
		return $retour;
	}
	
	/*
	@ RECUPERE LES INFOS DU HEADER d'une newsletter
	@
	@
	*/
	function get_header_info($id){
		$this->news_db->connect_db();
		$sql_info		= sprintf('SELECT objet	FROM newsletter_tb WHERE newsletter_tb.id=%s',GetSQLValueString($id, "int"));
		$sql_info_query	= mysql_query($sql_info) or die(mysql_error());
		$info			= mysql_fetch_assoc($sql_info_query);

		$retour = $info['objet'];
		return $retour;
	}
	
	/*
	@ RECUPERE LE TEMPLATE
	@
	@
	*/
	function get_template($id, $short=false ){
		if($id){
			$this->news_db->connect_db();

			$sql_template		= sprintf('SELECT template_tb.template AS template
												FROM template_tb, newsletter_tb
												WHERE newsletter_tb.template = template_tb.id AND newsletter_tb.id=%s',GetSQLValueString($this->id_newsletter, "int"));
			$sql_template_query = mysql_query($sql_template) or die(mysql_error());
			$template_folder	= mysql_fetch_assoc($sql_template_query);
			
			/*
			if($short){
				$adresse = $template_folder['template'];
			}else if($_SERVER["SERVER_NAME"] == 'localhost'){
				$adresse = 'http://localhost:8888/Site_SCIENCESPO_NEWSLETTER/template/'.$template_folder['template'].'/';
				//$adresse = 'http://localhost:8888/Site_SCIENCESPO_NEWSLETTER/admin/template/'.$template_folder['template'].'/';
				
				$adresse = SYSTEM_URL.TEMPLATE_FOLDER.$template_folder['template'].'/';
			}else{
				$adresse = 'http://'.$_SERVER["SERVER_NAME"].'/newsletter/template/'.$template_folder['template'].'/';
				//$adresse = 'http://'.$_SERVER["SERVER_NAME"].'/newsletter/admin/template/'.$template_folder['template'].'/';
				
				$adresse = SYSTEM_URL.TEMPLATE_FOLDER.$template_folder['template'].'/';
			}*/
			
			if($short){
				$adresse = $template_folder['template'];
			}else{				
				$adresse = SYSTEM_URL.TEMPLATE_FOLDER.$template_folder['template'].'/';
			}
			
			return $adresse;
		}
	}
	
	
	
	/*
	@ récupère la date d'une newsletter
	@
	@
	*/
	function get_date($id){
		$sql_date_news	= sprintf('SELECT date	FROM newsletter_tb WHERE newsletter_tb.id = %s',GetSQLValueString($this->id_newsletter, "int"));
		$sql_date_news_query = mysql_query($sql_date_news) or die(mysql_error());
		$date_info = mysql_fetch_assoc($sql_date_news_query);

		return $date_info['date'];
	}
	
	/*
	@ récupère l'image d'entête
	@
	@
	*/
	function get_header($fichier = NULL){
		$sql_header_news	= sprintf('SELECT id,image	FROM newsletter_tb WHERE newsletter_tb.id = %s',GetSQLValueString($this->id_newsletter, "int"));
		$sql_header_news_query = mysql_query($sql_header_news) or die(mysql_error());
		$header_info = mysql_fetch_assoc($sql_header_news_query);

		if(isset($header_info['image'])){
			/*if($_SERVER["SERVER_NAME"] == 'localhost'){
				$header_image = 'http://localhost:8888/Site_SCIENCESPO_NEWSLETTER/newsletter_images/'.$header_info['id'].'/'.$header_info['image'];
			}else{
				$header_image = 'http://'.$_SERVER["SERVER_NAME"].'/newsletter/newsletter_images/'.$header_info['id'].'/'.$header_info['image'];
			}*/
			
			$header_image = SYSTEM_URL.IMG_NEWSLETTER.$header_info['id'].'/'.$header_info['image'];
		}else{
			if(!$fichier){
				$header_image =  $this->get_template($this->id_newsletter).'images/header.jpg';
			}else{
				$header_image =  $this->get_template($this->id_newsletter).'images/'.$fichier;
			}
		}
		$temp = new stdClass();

		$temp->image	= $header_image;
		$dim			= getimagesize($header_image);
		$temp->w		= $dim[0];
		$temp->h		= $dim[1];

		return $temp;
	}

	/*
	@ RECUPERE LE SOMMAIRE
	@
	@
	*/
	function get_sommaire_items($valeur=NULL,$isdate=false,$style=NULL,$limit=NULL){
		if(isset($this->id_newsletter)){
			$this->news_db->connect_db();

			if(isset($valeur)){
				if($isdate){
					$sql_liste_item_news	= sprintf('SELECT 	*
												FROM newsletter_tb
												LEFT JOIN newsletter_item_tb
												ON newsletter_item_tb.id_newsletter = newsletter_tb.id
												WHERE newsletter_tb.id = %s
												AND newsletter_item_tb.liste_name = %s
												ORDER BY date1,ordre',GetSQLValueString($this->id_newsletter, "int"),GetSQLValueString('#'.$valeur, "text"));
				}else{
					$sql_liste_item_news	= sprintf('SELECT 	*
												FROM newsletter_tb
												LEFT JOIN newsletter_item_tb
												ON newsletter_item_tb.id_newsletter = newsletter_tb.id
												WHERE newsletter_tb.id = %s
												AND newsletter_item_tb.liste_name = %s
												ORDER BY ordre',GetSQLValueString($this->id_newsletter, "int"),GetSQLValueString('#'.$valeur, "text"));
				}
			}else{
				if($isdate){
					$sql_liste_item_news	= sprintf('SELECT 	*
												FROM newsletter_tb
												LEFT JOIN newsletter_item_tb
												ON newsletter_item_tb.id_newsletter = newsletter_tb.id
												WHERE newsletter_tb.id = %s
												ORDER BY date1,ordre',GetSQLValueString($this->id_newsletter, "int"));
				}else{
					$sql_liste_item_news	= sprintf('SELECT 	*
												FROM newsletter_tb
												LEFT JOIN newsletter_item_tb
												ON newsletter_item_tb.id_newsletter = newsletter_tb.id
												WHERE newsletter_tb.id = %s
												ORDER BY ordre',GetSQLValueString($this->id_newsletter, "int"));	
				}
			}
			
			
			$sql_liste_item_news_query = mysql_query($sql_liste_item_news) or die(mysql_error());
			$liste_items	= '';
			$date			= '';
			$oldDate		= '';
			
			$first			= true;
			if($isdate){
				$ligneDate		= 'border-top:solid 1px #000;';
			}else{
				$ligneDate		= '';
			}
						
			
			if(!isset($style)){
				$styleDate	= 'width:130px;font-weight:bold;display:inline-block;';
				$styleLi	= 'padding:8px 0px 8px 10px;';
			}else{
				$styleDate	= $style['date'];
				$styleLi	= $style['li'];
			}
			
			while ($item = mysql_fetch_assoc($sql_liste_item_news_query)){
				$date = ucfirst(dateNewsletter($item['date1'],$GLOBALS['moisListe'],$GLOBALS['jourListe']));
				
				if(!isset($limit)){
					$titre = $item['titre'];
				}else{
					$titre = '';
					$temp = explode(" ",$item['titre']);
					for($i=0;$i<=$limit;$i++){
						if(isset($temp[$i])){
							$titre.= $temp[$i].' ';	
						}
					}
					
					//echo count($temp).'/'.$limit.' ';
					
					if(count($temp)>($limit+1)){
						$titre.='...';
					}
				}
				
				if($date != $oldDate){
					if($isdate){
						$dateBLoc = '<span style="'.$styleDate.'">'.$date.' :</span>';
					}else{
						$dateBLoc ='';
					}
					$liste_items 	.= '<li style="'.$styleLi.(!$first ?$ligneDate:'').'">'.$dateBLoc.'<a href="#item-'.$item['id'].'">'.$titre.'</a></li>'."\n";
				}else{
					if($isdate){
						$dateBLoc = '<span style="'.$styleDate.'"></span>';
					}else{
						$dateBLoc ='';
					}
					$liste_items 	.= '<li style="'.$styleLi.'">'.$dateBLoc.'<a href="#item-'.$item['id'].'">'.$titre.'</a></li>'."\n";
				}
				
				
				$oldDate = $date;
				$first = false;
			}
			
	
			mysql_free_result($sql_liste_item_news_query);
	
			return $liste_items;
		}
	}
	
	/*
	@ PREPARE LE SOMMAIRE POUR LE MODE AFFICHAE
	@
	@
	*/
	function set_sommaire($valeur=NULL,$isdate=true,$style=NULL,$limit=NULL){
		if($this->mode=='show'){
			
			$id_sommaire = isset($valeur)?'sommaire-'.$valeur:'sommaire';
						
			if(!isset($style)){
				$style_sommaire = 'list-style:none;margin:0;padding:0;';	
			}else{
				$style_sommaire = $style['ul'];	
			}
						
			echo '<ul id="'.$id_sommaire.'" style="'.$style_sommaire.'">';
			echo $this->get_sommaire_items($valeur,$isdate,$style,$limit);
			echo '</ul>';
		}
	}


	/*
	@ PREPARE LE CONTENU D'UNE NEWSLETTER SUIVANT QU'ON EST EN MODE GENRATION OU AFFICHAGE
	@
	@
	*/
	function set_contenu($valeur=NULL,$bloc=NULL,$max_bloc=NULL,$titre_suite=NULL,$inline_css=NULL){
		if($this->mode == 'gene'){
			static $java_var=array();
		
			if($valeur){
				$java_var[] = 'ul#'.$valeur;
				echo '<ul id="'.$valeur.'" class="sort_list news_list" title="">';
				echo $this->get_newsletter_items($valeur);
				echo '</ul>';
			}
		
			return $java_var;

		}else if($this->mode=='show'){
			echo $this->get_newsletter_items($valeur,$bloc,$max_bloc,$titre_suite,$inline_css);
		}
	}
	
	
	
	/*
	@ SUPPRIME UNE NEWSLETTER ET SON ARCHIVE
	@
	@
	*/
	function suppr_newsletter($id_newsletter=NULL){
		
		if(isset($id_newsletter)){
			$this->news_db->connect_db();
			
			$sql_info = "SELECT date, unique_id FROM newsletter_tb WHERE id = ".$id_newsletter;
			$sql_info_query = mysql_query($sql_info) or die(mysql_error());
			$info = mysql_fetch_assoc($sql_info_query);

			$tabDate = explode('-',$info['date']);
			
			$annee		= $tabDate[0];
			$mois		= $tabDate[1];
			$uniqueID	= $info['unique_id'];
			
			$cheminArchive	= BASE_URL.ARCHIVE_FOLDER.$annee.'/'.$mois.'/'.$id_newsletter.'/';
			$cheminImages	= BASE_URL.IMG_NEWSLETTER.$id_newsletter.'/';
			
			$this->delete_newsletter_items($id_newsletter);

			$suppr_news_req 	= sprintf("DELETE FROM newsletter_tb WHERE id=%s", GetSQLValueString($id_newsletter,'int'));
			$query_suppr_news	= mysql_query($suppr_news_req) or die(mysql_error());
			
			//echo $cheminArchive.' '.$cheminImages;
			
			sup_repertoire($cheminArchive);
			sup_repertoire($cheminImages);

			return 'La newsletter bien été supprimés';
		}
		return 'il n\'y a aucun élément à supprimer';
	}
	
	
	/*
	@ SUPPRIME TOUS LES ELEMENTS D'UNE NEWSLETTER
	@
	@
	*/
	function delete_newsletter_items($id_newsletter=NULL){
		if(!empty($id_newsletter)){
			$id  = $id_newsletter	;
		}else if(isset($this->id_newsletter)){
			$id = $this->id_newsletter;
		}
		
		if(isset($id)){
			$this->news_db->connect_db();

			$suppr_items_req 	= sprintf("DELETE FROM newsletter_item_tb WHERE id_newsletter=%s", GetSQLValueString($id,'int'));
			$query_suppr_items	= mysql_query($suppr_items_req) or die(mysql_error());

			return 'les éléments ont bien été supprimés';
		}
		return 'il n\'y a aucun élément à supprimer';
	}

	/*
	@ AJOUTE DES ELEMENTS A UNE NEWSLETTER
	@
	@
	*/
	function add_newsletter_item($_origine,$_id_origine,$_ordre,$_liste_name){
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
			$URL_front		= '';
			$couleur		= '';

			if($origine == "evenement_db"){
				$this->evenement_db->connect_db();

				
				$sql_event_info			= sprintf("SELECT 	albums.event_id AS id,
															albums.title AS titre,
															albums.chapo AS texte,
															albums.location AS lieu,
															albums.dateFromFormat AS date1,
															albums.dateToFormat AS date2,
															albums.dateHourFrom AS hour1,
															albums.dateHourTo AS hour2,
															albums.acces AS acces,
															albums.inscriptionStatut AS inscription,
															albums.organisateur AS organisateur,
															albums.link AS lien,
															albums.linkText AS lientxt,
															images.id AS file,
															images.ext AS ext
													FROM albums
													LEFT JOIN images
													ON images.event_id = albums.event_id
													WHERE albums.event_id=%s",GetSQLValueString($id_origine, "int"));
				$sql_event_info_query	= mysql_query($sql_event_info) or die(mysql_error());
				$event_info				= mysql_fetch_assoc($sql_event_info_query);
				
				$date	= date("Y-m-d",strtotime($event_info['date1']));
				$lieu	= $event_info['lieu'];
				$titre	= $event_info['titre'];
				$texte	= $event_info['texte'];

				$hTemp	= explode("H",$event_info['hour1']);
				$horaire= $hTemp[0].':'.$hTemp[1].':'.$hTemp[2];
				
				$event_info['inscription']==1? $obli = true : $obli = false;
				
				$info 	= '';
				$info	.= '<br/>Organisateur : '.$event_info['organisateur'];
				$info	.= '<br/>En savoir plus : <a href="http://'.$event_info['lien'].'">'.$event_info['lientxt'].'</a>';				
				$info	.= '<br/>'.($obli?'<a href="http://www.sciences-po.fr/2010/checkUser.php?eventId='.$event_info['id'].'&tp=0" target="_blank">':'').$event_info['acces'].($obli? '</a>':'');
				
				if(isset($event_info['file'])){
					$image	= 'http://capricorne.sciences-po.fr/evenements/cms/album_images/'.$event_info['file'].$event_info['ext'];
				}
				
				
			}else if($origine == "evenement_new_db" || $origine == "evenement_new_en_db"){
				$this->evenement_new_db->connect_db();

				$add	= $origine == "evenement_new_en_db" ? '_en' : '';
				$addURL	= $origine == "evenement_new_en_db" ? '&lang=en' : '';		
				 
				/*$sql_event_info			= sprintf("	SELECT 	E.evenement_id AS id,
															COUNT(S.session_id) AS nbrsession,
															E.evenement_titre".$add." AS titre,			
															E.evenement_texte".$add." AS texte,
															E.evenement_resume".$add." AS resume,
															E.evenement_date AS date1,
															E.evenement_date AS date2,
															E.evenement_organisateur".$add." AS organisateur,
															E.evenement_image AS file,
															R.rubrique_couleur AS couleur,
															O.organisme_url_front AS url_front
													FROM sp_evenements AS E, sp_sessions AS S, sp_rubriques AS R, sp_organismes AS O, sp_groupes AS G
													WHERE E.evenement_id=%s
													AND S.evenement_id = E.evenement_id
													AND S.session_statut_inscription = 1
													AND E.evenement_rubrique = R.rubrique_id
													AND E.evenement_groupe_id = G.groupe_id
													AND G.groupe_organisme_id = O.organisme_id",GetSQLValueString($id_origine, "int"));*/
				
				// @modif : 2012-05-31									
				// REQUETE TENANT COMPTE DE L'ETAT DE L'INSCRIPTION (si obligatoire par la plateforme nbrsession > 0)
				$sql_event_info			= sprintf("	SELECT 	E.evenement_id AS id,
															COUNT(S.session_id) AS nbrsession,
															E.evenement_titre".$add." AS titre,			
															E.evenement_texte".$add." AS texte,
															E.evenement_resume".$add." AS resume,
															E.evenement_date AS date1,
															E.evenement_date AS date2,
															E.evenement_organisateur AS organisateur,
															E.evenement_image AS file,
															R.rubrique_couleur AS couleur,
															O.organisme_url_front AS url_front
													FROM sp_evenements AS E, sp_rubriques AS R, sp_organismes AS O, sp_groupes AS G
													INNER JOIN sp_sessions AS S
															ON S.session_type_inscription = 2
													WHERE E.evenement_id= %s 
															AND S.session_statut_inscription = 1
															AND E.evenement_rubrique = R.rubrique_id
															AND E.evenement_groupe_id = G.groupe_id
															AND G.groupe_organisme_id = O.organisme_id
															AND S.evenement_id = E.evenement_id",GetSQLValueString($id_origine, "int"));
													
													
				
				
				$sql_event_info_query	= mysql_query($sql_event_info) or die(mysql_error());
				$event_info				= mysql_fetch_assoc($sql_event_info_query);
				
				$date	= date("Y-m-d",$event_info['date1']);
				$lieu	= isset($event_info['lieu'])?$event_info['lieu']:'';
				$titre	= $event_info['titre'];
				$URL	= 'http://www.sciencespo.fr/evenements/event.php?id='.$event_info['id'].$addURL;
				$URL_front = $event_info['url_front'];
				$couleur= $event_info['couleur'];
				
				if($event_info['nbrsession']>0){
					$isInscription	= true;
				}
				
				if(isset($event_info['resume']) && $event_info['resume']!=''){
					$texte	= $event_info['resume'];
				}else{
					$resume	= $event_info['texte'];
					$resume_tab = explode(' ',strip_tags($resume,'<p>,<ul>,<li>,<br>,<a>'));
					//$resume_tab = explode(' ',$resume);
					$texte = '';
					
					
					for($i=0; $i<40; $i++){
						$texte.= $resume_tab[$i].' ';
						if($i>=count($resume_tab)-1){
							break;	
						}
					}
					if(count($resume_tab)>40){
						$texte.='...';
					}
					
					
					$texte = close_dangling_tags($texte);
				}
				date_default_timezone_set('Europe/Paris');
				$horaire = date("H:i:s",$event_info['date1']);
				
				//$event_info['inscription']==1? $obli = true : $obli = false;
				
				//$info 	= '';
				//$info	.= '<br/>Organisateur : '.$event_info['organisateur'];
				//$info	.= '<br/>En savoir plus : <a href="http://'.$event_info['lien'].'">'.$event_info['lientxt'].'</a>';				
				//$info	.= '<br/>'.($obli?'<a href="http://www.sciences-po.fr/2010/checkUser.php?eventId='.$event_info['id'].'&tp=0" target="_blank">':'').$event_info['acces'].($obli? '</a>':'');
				
				if(isset($event_info['file']) && $event_info['file']!=''){
					$image	= 'http://www.sciencespo.fr/evenements/admin/upload/photos/evenement_'.$event_info['id'].'/'.$event_info['file'];
				}
				
				
			}else if($origine == "rss"){
				////// FORMATAGE DES ELEMENTS RSS
				$this->news_db->connect_db();
				$sql_rss_info			= sprintf("SELECT 	*
													FROM rss_item_tb
													WHERE id=%s",GetSQLValueString($id_origine, "int"));
				$sql_rss_info_query		= mysql_query($sql_rss_info) or die(mysql_error());
				$rss_info				= mysql_fetch_assoc($sql_rss_info_query);
				
				$titre		= $rss_info['titre'];
				$soustitre	= $rss_info['soustitre'];
				$texte		= $rss_info['texte'];
				$date		= date("Y-m-d",strtotime($rss_info['date']));
				$moreTXT	= 'en savoir plus';
				$URL		= $rss_info['URL'];
				
				$size = getimagesize($rss_info['image']);
				if($size[0]>10 && $size[1]>10){
					$image		= $rss_info['image'];
				}else{
					$image		= '';
				}

			}else if($origine == "actu"){
				////// FORMATAGE DES ELEMENTS ACTU
				$this->news_db->connect_db();
				$sql_actu_info			= sprintf("SELECT 	*
													FROM actu_item_tb
													WHERE id=%s",GetSQLValueString($id_origine, "int"));
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
						$image	= 'http://localhost:8888/Site_SCIENCESPO_NEWSLETTER/actu_images/'.$actu_info['id'].'/'.$actu_info['image'];
					}else{
						$image	= 'http://'.$_SERVER["SERVER_NAME"].'/newsletter/actu_images/'.$actu_info['id'].'/'.$actu_info['image'];
					}
					
					$image = SYSTEM_URL.IMG_ACTU.$actu_info['id'].'/'.$actu_info['image'];
				}
				
			}

			$this->news_db->connect_db();

			$insertSQL 		= sprintf("INSERT INTO newsletter_item_tb (origine,id_origine,ordre,id_newsletter,liste_name,date1,horaire,lieu,titre,soustitre,texte,info,image,moreTXT,URL,is_inscription,URL_front,couleur) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
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
									   				GetSQLValueString($isInscription, "int"),
									   				GetSQLValueString($URL_front, "text"),
									   				GetSQLValueString($couleur, "text"));
			
			$insert_query	= mysql_query($insertSQL) or die(mysql_error());
		
			return mysql_insert_id();	
	}

	/*
	@ RETOURNE LA LISTE DES DESTINATAIRES
	@
	@
	*/
	function get_destinataire(){
		$sql_liste_dest	= 'SELECT * FROM destinataires_tb ORDER BY groupe,nom';
		$sql_liste_dest_query = mysql_query($sql_liste_dest) or die(mysql_error());
		$liste_items	= '';
		$date			= '';
		$oldDate			= '';

		$destinaire = array();

		while ($dest = mysql_fetch_assoc($sql_liste_dest_query)){
			$temp->label	= $dest['nom'];
			$temp->select	= '';
			$temp->value	= $dest['mail'];
			$temp->classe	= 'group-'.$dest['groupe'];
		
			$destinaire[]	= $temp;
			$temp = NULL;
		}

		return createCheckBox($destinaire,'dest[]','dest');
	}
	
	/*
	@ récupère la liste des groupes de destinataires
	@ INUTILE ????
	@
	*/
	/*
	function get_groupes_selector(){
		$sql_liste_groupe	= 'SELECT * FROM destinataire_groupes_tb ORDER BY libelle';
		$sql_liste_groupe_query = mysql_query($sql_liste_groupe) or die(mysql_error());

		$liste_items	= '';
		while ($groupe = mysql_fetch_assoc($sql_liste_groupe_query)){
			$liste_items	.= '<span><input name="group[]" type="checkbox" value="group-'.$groupe['id'].'" id="group-'.$groupe['id'].'" /><label for="group-'.$groupe['id'].'">'.$groupe['libelle'].'</label></span>	';
		}

		return $liste_items;
	}
	*/

	/*
	@ RETOURNE LA LISTE DES NEWSLETTER
	@
	@
	*/
	function get_newsletters_array($id_template){
		$sql_liste_news	= sprintf("SELECT id,nom FROM newsletter_tb WHERE template=%s ORDER BY id DESC", GetSQLValueString($id_template, "int"));
		$sql_liste_news_query = mysql_query($sql_liste_news) or die(mysql_error());

		$liste_news = array();

		while ($news_item = mysql_fetch_assoc($sql_liste_news_query)){
			$liste_news[$news_item['id']]	= 'n°'.$news_item['id'].' : '.$news_item['nom'];
		}

		return $liste_news;
	}
	
	/*
	@ RETOURNE LA LISTE DES NEWSLETTER
	@
	@
	*/
	function get_newsletters_liste($id_template=NULL, $_annee=NULL, $_mois=NULL, $idUserGroupes=NULL ){
		if(empty($id_template)) $id_template = -1;
		if(empty($_annee))	$_annee = date('Y');
		if(empty($_mois))	$_mois = date('m');
		
		/*$idGroups = implode(',',$idUserGroupes);
		
		$sql_get_template_id = "SELECT id_template
								FROM rel_template_groupe_tb
								WHERE id_groupe IN ($idGroups)";
		$sql_get_template_id_query = 	mysql_query($sql_get_template_id) or die(mysql_error());
		$id_templates = array();
		while ($result = mysql_fetch_assoc($sql_get_template_id_query)){
			$id_templates[] = $result['id_template'];
		}
		
		if(!empty($idUserGroupes) && !$this->core->isSuperAdmin){
			$groupesFILTER = 'AND T.id IN ('.implode(',',$id_templates).')';	
		}else{
			$groupesFILTER = '';
		}*/
		
		$filter =  $this->check_newsletter_rights($idUserGroupes);
				
		$signe = '=';
		if($id_template == -1) $signe = '<>';
		
		$_mois = strlen($_mois)==1? '0'.$_mois:$_mois;
		$_mois2= strlen($_mois+1)==1? '0'.($_mois+1):($_mois+1);
				
		$sql_liste_news	= sprintf("SELECT N.id,N.nom,N.date,T.nom as titre, N.is_archive as is_archive
									FROM newsletter_tb AS N, template_tb AS T
									WHERE N.template $signe %s
									AND N.date >= %s
									AND N.date < %s
									AND N.template = T.id
									$filter
									ORDER BY N.date DESC, N.id DESC", 
									GetSQLValueString($id_template, "int"),
									GetSQLValueString($_annee.'-'.$_mois, "date"),
									GetSQLValueString($_annee.'-'.($_mois2), "date"));
											
		$sql_liste_news_query = mysql_query($sql_liste_news) or die(mysql_error());
		
		$i = 0;

		while ($news_item = mysql_fetch_assoc($sql_liste_news_query)){
			//$liste_news[$news_item['id']]	= 'n°'.$news_item['id'].' : '.$news_item['nom'];
			
			$class  = 'listItemRubrique'.($i+1);
			$id = $news_item['id'];
			$titre = $news_item['nom'];
			$date = $news_item['date'];
			$template = $news_item['titre'];
			$is_archive = $news_item['is_archive'];
			
			include('../structure/newsletter-list-bloc.php');
			
			$i = ($i+1)%2;
			
		}
		

		//return $liste_news;
	}

	/*
	@ RETOURNE LA LISTE DES TEMPLATES
	@
	@
	*/
	function get_templates_liste($idUserGroupes,$isAll = true){
		
		$filter =  $this->check_newsletter_rights($idUserGroupes,true);
				
		$sql_liste_template	= "SELECT T.id,T.nom
								FROM template_tb AS T
								$filter
								ORDER BY T.nom";
		$sql_liste_template_query = mysql_query($sql_liste_template) or die(mysql_error());

		$liste_template = array();

		if($isAll) $liste_template[-1]	= 'Tous les gabarits';

		while ($template_item = mysql_fetch_assoc($sql_liste_template_query)){
			$liste_template[$template_item['id']]	= $template_item['nom'];
		}

		return $liste_template;
	}
	
	
	/**
	* genere un id unique au moment de la création de la naewsletter
	* cet id est constitué du timestamp UNIX + id newsletter hasshé en md5
	* @param $_id id de la newsletetter
	* @return une chaine ed caractère
	*/
	function unique_generator($_id = 0){
			
		return md5 (time() . $_id);
	}

	/*
	@ CREE UNE NOUVELLE NEWSLETTER
	@
	@
	*/
	function newsletter_create(){
		$this->news_db->connect_db();
		
		$ladate = date('Y-m-d');

		$insertSQL 		= sprintf("INSERT INTO newsletter_tb (nom,objet,date,template,groupe) VALUES (%s,%s,%s,%s,%s)",
												GetSQLValueString($_POST['nom'], "text"),
												GetSQLValueString($_POST['objet'], "text"),
												GetSQLValueString($ladate, "text"),
												GetSQLValueString($_POST['id_template'], "int"),
												GetSQLValueString($_SESSION['id_actual_group'], "int"));
		$insert_query	= mysql_query($insertSQL) or die(mysql_error());
	

		!is_dir('../newsletter_images/'.mysql_insert_id() )?mkdir('../newsletter_images/'.mysql_insert_id() ):"";
		
		$new_id = mysql_insert_id();
		
		$updateSQL 		= sprintf("UPDATE newsletter_tb SET unique_id=%s WHERE id=%s",
												GetSQLValueString($this->unique_generator($new_id), "text"),
												GetSQLValueString($new_id,"int"));
		$update_query	= mysql_query($updateSQL) or die(mysql_error());
		

		return $new_id;
	}
	
	/*
	@ RETOURNE LES INFORMATIONS D'UNE NEWSLETTER
	@
	@
	*/
	function get_newsletter_info(){
		$this->news_db->connect_db();

		$sql_info	= sprintf("SELECT * FROM newsletter_tb WHERE id=%s",GetSQLValueString($this->id_newsletter, "int"));
		$sql_info_query = mysql_query($sql_info) or die(mysql_error());
		$info = mysql_fetch_assoc($sql_info_query);
	
		$retour = new stdClass();

		$retour->id			= $info['id'];
		$retour->nom		= $info['nom'];
		$retour->objet		= $info['objet'];
		$retour->ladate		= $info['date'];
		$retour->groupe		= $info['groupe'];
		$retour->image		= $info['image'];
		$retour->is_archive	= $info['is_archive'];

		return $retour;
	}

	/*
	@ MODIFIE LES INFORMATIONS D'UNE NEWSLETTER
	@
	@
	*/
	function set_newsletter_info(){
		$this->news_db->connect_db();

		!is_dir('../newsletter_images/'.$_POST['id'] )?mkdir('../newsletter_images/'.$_POST['id'] ):"";

		$fileName= isset($_POST['picture'])?$_POST['picture']:NULL;

		if($_FILES['picturefile']['type'] == "image/jpeg" || $_FILES['picturefile']['type'] == "image/jpg"){

			$fileName = upload($_FILES['picturefile'], '../newsletter_images/'.$_POST['id'].'/');
	
			//echo "########################## TYPE DE DOCUMENT ".$_FILES['picture']['type'];
			
			if($_FILES['picturefile']['type'] == "image/jpeg" || $_FILES['picturefile']['type'] == "image/jpg"){
				resize($fileName,'../newsletter_images/'.$_POST['id'].'/', 800, 800);
			}
		}
		
		if(isset($_POST['suppr_image']) && GetSQLValueString($_POST['suppr_image'],'boolean')==1){
			$fileName = NULL;
		}

		$updateSQL 		= sprintf("UPDATE newsletter_tb SET nom=%s, image=%s, objet=%s, date=%s WHERE id=".GetSQLValueString($_POST['id'],"int"),
												GetSQLValueString($_POST['nom'], "text"),
												GetSQLValueString($fileName, "text"),
												GetSQLValueString($_POST['objet'], "text"),
												GetSQLValueString($_POST['date_newsletter2'], "text"));
		$update_query	= mysql_query($updateSQL) or die(mysql_error());	
	}

	/*
	@ RETOURNE LA LISTE DES DIFFÉRENTES SOURCES POUR CRÉER UNE NEWSLETTER
	@
	@
	*/
	function get_source_news($idUserGroupes=NULL){

		$list['separateur_0'] = 'ÉVÉNEMENTS';
		$this->evenement_new_db->connect_db();
		
		
		//$list['event'] = 'Événements ANCIEN';
		
		$sql_event	=  "SELECT organisme_id, organisme_nom, organisme_url_front
						FROM sp_organismes";
		$sql_event_query = mysql_query($sql_event) or die(mysql_error());
		
		while ($organisme = mysql_fetch_assoc($sql_event_query)){
			$list['eventnew_'.$organisme['organisme_id'].'_fr'] = 'Événements '.$organisme['organisme_nom'].'';
			$list['eventnew_'.$organisme['organisme_id'].'_en'] = 'Événements '.$organisme['organisme_nom'].' Anglais';
		}
		/*
		$list['eventnew_1_fr'] = 'Événements Direction de la Communication ';
		$list['eventnew_1_en'] = 'Événements Direction de la Communication Anglais';
		
		$list['eventnew_2_fr'] = 'CERI';
		$list['eventnew_2_en'] = 'CERI Anglais';
		
		$list['eventnew_6_fr'] = 'Picasso';
		$list['eventnew_6_en'] = 'Picasso Anglais';
		*/
		//$list['eventnew'] = 'Événements';
		//$list['eventnewenglish'] = 'Événements Anglais';

		$list['separateur_1'] = 'ACTUALITÉS';
		
		
		$this->news_db->connect_db();
		$filter = $this->check_cat_actu_rights($idUserGroupes,true);
		
		$sql_info	= "SELECT *
						FROM actu_cat_tb AS C
						$filter
						ORDER BY C.libelle";
		$sql_info_query = mysql_query($sql_info) or die(mysql_error());
		$list['actu_'.'-1']	= 'Sans Catégorie'; 	
		while ($actu = mysql_fetch_assoc($sql_info_query)){
			$list['actu_'.$actu['id']]	= $actu['libelle'];
		}

		$list['separateur_2'] = 'FLUX RSS';
		$sql_info	= "SELECT * FROM rss_flux_tb WHERE cache=0 ORDER BY nom";
		$sql_info_query = mysql_query($sql_info) or die(mysql_error());

		while ($rss = mysql_fetch_assoc($sql_info_query)){
			$list['rss_'.$rss['id']]	= $rss['nom'];
		}

		return $list;
	}
	
	/*
	@ RETOURNE LE CODE GOOGLE ANALYTICS 
	@
	@
	*/
	function get_google_analytics_code($id_newsletter=NULL){
		$js='';
		
		if(isset($id_newsletter)){
			$this->news_db->connect_db();
			
			$sql_info = "SELECT google_analytics_id AS code FROM template_tb as T, newsletter_tb AS N WHERE N.template = T.id AND N.id = ".$id_newsletter;
			$sql_info_query = mysql_query($sql_info) or die(mysql_error());
			$info = mysql_fetch_assoc($sql_info_query);

			$code = $info['code'];
			
			$js ="<script type=\"text/javascript\">
 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '".$code."']);
  _gaq.push(['_trackPageview']);
 
  (function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 
</script>

";
		}
		
		
		return $js;
	}

	/*
	@ DEVEROUILLE UNE ARCHIVE DE NEWSLETTER
	@ 
	@ 
	*/
	function unarchive($id_newsletter=NULL){
		if(isset($id_newsletter)){
			$updateSQL 		= sprintf("UPDATE newsletter_tb SET is_archive=%s WHERE id=".GetSQLValueString($id_newsletter,"int"),
												GetSQLValueString(0, "int"));
			$update_query	= mysql_query($updateSQL) or die(mysql_error());
			
		}
	}

	/*
	@ CREE UNE ARCHIVE DE NEWSLETTER
	@ CHANGE LES LIENS IMAGES APRES AVOIR COPIÉ TOUS LES FICHIERS
	@ newsletter_archive/annee/mois/id/uniqueID.html
	*/
	function create_archive($id_newsletter=NULL){
				
		if(isset($id_newsletter)){
			
			
			$sql_info = "SELECT date, unique_id FROM newsletter_tb WHERE id = ".$id_newsletter;
			$sql_info_query = mysql_query($sql_info) or die(mysql_error());
			$info = mysql_fetch_assoc($sql_info_query);

			$tabDate = explode('-',$info['date']);
			
			$annee		= $tabDate[0];
			$mois		= $tabDate[1];
			$uniqueID	= $info['unique_id'];
		
			$newsletterHtml = $this->generate_newsletter($id_newsletter);
			
			$chemin = ARCHIVE_FOLDER.$annee.'/'.$mois.'/'.$id_newsletter.'/';
			
			if(!is_dir(BASE_URL.$chemin.'img')){
				mkdir(BASE_URL.$chemin.'img', 0777, true);	
			}
					
			$imageTab = $this->getImagesArray($newsletterHtml);
			$newImageTab = array();
			
			$i = 0;
			
			foreach($imageTab as $img){
				$imgFileNameTab = explode('/',$img);
				$imgFileName = $imgFileNameTab[count($imgFileNameTab)-1];

				file_put_contents( BASE_URL.$chemin.'img/'.$i.'-'.$imgFileName, file_get_contents($img));
				
				$newImageTab[] = SYSTEM_URL.$chemin.'img/'.$i.'-'.$imgFileName;
				
				$i++;
			}
			
			$newsletterHtml = str_replace($imageTab, $newImageTab, $newsletterHtml);
						
			$filename = BASE_URL.$chemin.$uniqueID.'.html';
			
			$alerte = file_put_contents($filename, $newsletterHtml);
			
			$updateSQL 		= sprintf("UPDATE newsletter_tb SET is_archive=%s WHERE id=".GetSQLValueString($id_newsletter,"int"),
												GetSQLValueString(1, "int"));
			$update_query	= mysql_query($updateSQL) or die(mysql_error());
			
		}
		
		return $alerte;
	}
	
	/*
	@ LISTE TOUTES LES IMAGES (img,src,background) D'UN CONTENU DONNÉ
	@
	@
	*/
	function getImagesArray($data) {
		$images = array();
		$media = array();
		
		$regex_1 = '/(img|src|background)=("|\')[^"\'>]+/i';	
		preg_match_all($regex_1, $data, $media);
		
		unset($data);
		
		$regex_2 = '/(img|src|background)("|\'|="|=\')(.*)/i';
		$data = preg_replace($regex_2,"$3",$media[0]);
		
		foreach($data as $url) {
			$info = pathinfo($url);
		
			if (isset($info['extension'])) {
		
				if (($info['extension'] == 'jpg') || ($info['extension'] == 'jpeg') || ($info['extension'] == 'gif') || ($info['extension'] == 'png')){
					if(!in_array($url,$images)){
						array_push($images, $url);
					}
				}
		
			}
		
		}
		
		return $images;
		
	}
	
	
		
	/*
	@ Vérifie les droits d'un utilisateur sur une rubrique de newsletter
	@
	@
	*/
	function check_newsletter_rights($idUserGroupes=NULL,$isWhere = false){
		
		$this->news_db->connect_db();
		
		$idGroups = implode(',',$idUserGroupes);
				
		$sql_get_template_id = "SELECT id_template
								FROM rel_template_groupe_tb
								WHERE id_groupe IN ($idGroups)";
		$sql_get_template_id_query = 	mysql_query($sql_get_template_id) or die(mysql_error());
		$id_templates = array();
		while ($result = mysql_fetch_assoc($sql_get_template_id_query)){
			$id_templates[] = $result['id_template'];
		}
		
		$condition = $isWhere ? 'WHERE':'AND';
		
		if(!empty($idUserGroupes) &&intval($this->core->userLevel)>1){
			$groupesFILTER = $condition.' T.id IN ('.implode(',',$id_templates).')';	
		}else{
			$groupesFILTER = '';
		}
		
		return $groupesFILTER;
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
		
		if(implode(',',$id_templates) == NULL && $groupesFILTER!='') $groupesFILTER = $condition.' C.id IN (-1)';
				
		return $groupesFILTER;
	}
	
	/*
	@ PERMET L'AFFICHAGE OU LA MODIFICATION DU FOOTER
	@
	@
	*/
	function set_footer(){
		if($this->mode == 'gene'){
			echo $this->select_footer();
		}else if($this->mode=='show'){
			echo $this->get_footer();
		}
	}
	
	/*
	@ RECUPERE LE FOOTER
	@ SOIT CELUI DU TEMPLATE
	@ SOIT CELUI DE LA NEWSLETTER QUAND IL EST DEFINI
	*/
	function get_footer(){
		if(isset($this->id_newsletter)){
			$this->news_db->connect_db();
			$sql_info		= sprintf('SELECT F.footer AS footer
										FROM newsletter_footer_tb AS F, newsletter_tb AS N, template_tb AS T
										WHERE F.id = (SELECT IFNULL(N.footer_id,T.footer_id))
										AND T.id = N.template
										AND N.id = %s',GetSQLValueString($this->id_newsletter, "int"));
			$sql_info_query	= mysql_query($sql_info) or die(mysql_error());
			$info			= mysql_fetch_assoc($sql_info_query);
	
			$retour = strip_tags($info['footer'],'<br><a><strong><em><p>');
			return $retour;
		}
	}
	
	/*
	@ MET A JOUR LE FOOTER
	@
	@
	*/
	function update_footer($id_footer=NULL){
		if(isset($this->id_newsletter) && isset($id_footer)){
			$this->news_db->connect_db();
			$updateSQL 		= sprintf("UPDATE newsletter_tb SET footer_id=%s WHERE id=%s",GetSQLValueString($id_footer,"int"),
																						GetSQLValueString($this->id_newsletter, "int"));
			$update_query	= mysql_query($updateSQL) or die(mysql_error());
		}
	}
	
	/*
	@ CREE LE FORMULAIRE DE MISE A JOUR DU FOOTER
	@
	@
	*/
	function select_footer(){
		if(isset($this->id_newsletter)){
			
			
			$this->news_db->connect_db();

			$sql_footer		= sprintf('SELECT * FROM newsletter_footer_tb ORDER BY titre');
			$sql_footer_query = mysql_query($sql_footer) or die(mysql_error());
	
			$tab[NULL] = 'Footer par defaut du template';
	
			while ($footer_item = mysql_fetch_assoc($sql_footer_query)){
							
				$id					= $footer_item['id'];
				$titre				= $footer_item['titre'];
				//$footer				= $footer_item['footer'];
				
				$tab[$id] = $titre;
				
			}
			
			
			$sql_info		= sprintf('SELECT F.id AS id
										FROM newsletter_footer_tb AS F, newsletter_tb AS N, template_tb AS T
										WHERE F.id = N.footer_id
										AND T.id = N.template
										AND N.id = %s',GetSQLValueString($this->id_newsletter, "int"));
			$sql_info_query	= mysql_query($sql_info) or die(mysql_error());
			$info			= mysql_fetch_assoc($sql_info_query);
			
			$form = '<form id="update_footer_form" action="XMLrequest_update_footer.php" method="post" >'."\n";
			$form.= '<input type="hidden" name="id" value="'.$this->id_newsletter.'" />';
			$form.= createCombobox($tab, 'footer_id', 'footer_id', $info['id'], "onchange=\"$('#update_footer_form').submit();\"", false)."\n";
			$form.= '</form>'."\n";
			
			return $form;
		}
	}
	
	

}


?>