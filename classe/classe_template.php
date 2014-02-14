<?php

include_once('classe_connexion.php');
include_once('fonctions.php');
include_once('connexion_vars.php');
include_once('classe_footer.php');


class Template extends Footer {
	
	var $news_db		= NULL;
	var $id				= NULL;
	
	/*
	@ GESTION DES TEMPLATE
	@
	@
	*/
	function template($_id=NULL){
		global $news_cInfo;
		
		if(!empty($_id)){
			$this->id= $_id;	
		}
		
		$this->news_db		= new connexion($news_cInfo['server'],$news_cInfo['user'],$news_cInfo['password'],$news_cInfo['db']);
	}
	
	/*
	@ creation ou modification de template
	@
	@
	*/
	function create_template($_array_val,$_id=NULL){
		$this->news_db->connect_db();

		if(isset($_id)){
			//MODIFICATION
			$updateSQL 		= sprintf("UPDATE template_tb SET nom=%s, titre=%s, template=%s, google_analytics_id=%s, footer_id=%s, reply_to=%s, `from`=%s WHERE id=%s",
													GetSQLValueString($_array_val['nom'],					"text"),
													GetSQLValueString($_array_val['titre'],					"text"),
													GetSQLValueString($_array_val['template'],				"text"),
													GetSQLValueString($_array_val['google_analytics_id'],	"text"),
													GetSQLValueString($_array_val['footer_id'],				"int"),
													GetSQLValueString($_array_val['reply_to'],				"text"),
													GetSQLValueString($_array_val['from'],					"text"),
													GetSQLValueString($_id,"int"));
																										
			$update_query	= mysql_query($updateSQL) or die(mysql_error());
			
			$this->add_groupe_template($_id,$_array_val['groupe_template']);
			
		}else{
			//CREATION
			$insertSQL 		= sprintf("INSERT INTO template_tb (nom, titre, template, google_analytics_id, footer_id, reply_to, `from`) VALUES (%s,%s,%s,%s,%s,%s,%s)",
													GetSQLValueString($_array_val['nom'],					"text"),
													GetSQLValueString($_array_val['titre'],					"text"),
													GetSQLValueString($_array_val['template'],				"text"),	
													GetSQLValueString($_array_val['google_analytics_id'], 	"text"),
													GetSQLValueString($_array_val['footer_id'],				"int"),
													GetSQLValueString($_array_val['reply_to'],				"text"),
													GetSQLValueString($_array_val['from'],					"text"));
			$insert_query	= mysql_query($insertSQL) or die(mysql_error());
			
			$_id = mysql_insert_id();
			
			$this->add_groupe_template($_id,$_array_val['groupe_template']);

			return $_id;
		}	
	}
	
	/*
	@ RECUPERE LES INFORMATIONS D'UN TEMPLATE
	@
	@
	*/
	function get_template_info($_id){
		if(!empty($_id)){
			$this->news_db->connect_db();
	
			$sql_template		= sprintf("SELECT * FROM template_tb WHERE id=%s",GetSQLValueString($_id,"int"));
			$sql_template_query = mysql_query($sql_template) or die(mysql_error());
			$template_item 		= mysql_fetch_assoc($sql_template_query);
		
			return $template_item;
					
		}
	}
	
	/*
	@ RECUPERE LA LISTE DES TEMPLATES
	@
	@
	*/
	function get_template_edit_liste(){
		$this->news_db->connect_db();

		$sql_template		= sprintf('SELECT * FROM template_tb');
		$sql_template_query = mysql_query($sql_template) or die(mysql_error());
		
		$i = 0;

		while ($template_item = mysql_fetch_assoc($sql_template_query)){
			//$liste_news[$news_item['id']]	= 'n°'.$news_item['id'].' : '.$news_item['nom'];
						
			$class				= 'listItemRubrique'.($i+1);
			$id					= $template_item['id'];
			$nom				= $template_item['nom'];
			$titre				= $template_item['titre'];
			$template			= $template_item['template'];
			$google_analytics_id= $template_item['google_analytics_id'];
			$footer_id			= $template_item['footer_id'];
			$reply_to			= $template_item['reply_to'];	
			$from				= $template_item['from'];	
			$id_groupe			= $template_item['id_groupe'];	
			
			$groupes			= $this->get_groupe($id,$id);
			
			$footers			= $this->get_footer_liste();
			
			include('../structure/admin-templates-list-bloc.php');
			
			$i = ($i+1)%2;
			
		}
	}
	
	/*
	@ SUPPRIME UN TEMPLATE
	@
	@
	*/
	function suppr_template($id=NULL){
		if(isset($id)){
			$this->news_db->connect_db();

			$supprSQL		= sprintf("DELETE FROM template_tb WHERE id=%s", GetSQLValueString($id,'int'));
			$suppr_query	= mysql_query($supprSQL) or die(mysql_error());
			
			$supprSQL		= sprintf("DELETE FROM rel_template_groupe_tb WHERE id_template=%s", GetSQLValueString($id,'int'));
			$suppr_query	= mysql_query($supprSQL) or die(mysql_error());
		}
	}
	
	/*
	@ GESTION DE LA VISIBILITE DES TEMPLATES SUIVANT LES GROUPES D'UTILISATEURS
	@
	@
	*/
	function get_groupe($_id=NULL,$id_template=NULL){
		$sql_liste_groupe	= 'SELECT * FROM user_groupes_tb ORDER BY libelle';
		$sql_liste_groupe_query = mysql_query($sql_liste_groupe) or die(mysql_error());
		
	
			
		

		while ($groupe = mysql_fetch_assoc($sql_liste_groupe_query)){
			$temp = new stdClass();

			$temp->label	= $groupe['libelle'];
			$temp->select	= '';
			$temp->value	= $groupe['id'];
			$temp->classe	= 'inline';
			
			if(isset($id_template)){
				$sql_liste_dest	= "SELECT * FROM rel_template_groupe_tb WHERE id_groupe=".$groupe['id'];
				$sql_liste_dest_query = mysql_query($sql_liste_dest) or die(mysql_error());
				
				while ($dest = mysql_fetch_assoc($sql_liste_dest_query)){
					if($dest['id_template']==$id_template){
						$temp->select	= 'ok';
					}
				}
			}
		
			$groupes[]	= $temp;
			$temp = NULL;
		}

		if($_id){
			$id ='template_'.$_id;
		}else{
			$id = 'template';	
		}

		return createCheckBox($groupes,'groupe_template[]',$id);
	}
	
	/*
	@ edition de destinataire
	@
	@
	*/
	function add_groupe_template($_id_template=NULL, $_array_groupe=NULL){
				
		if(!empty($_id_template) && !empty($_array_groupe)){
			$this->clean_groupe($_id_template);
			
			
			$this->news_db->connect_db();

			foreach($_array_groupe as $_id_groupe){
				$insertSQL 		= sprintf("INSERT INTO rel_template_groupe_tb (id_template,id_groupe) VALUES (%s,%s)",
														GetSQLValueString($_id_template, "int"),
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
	function clean_groupe($_id_template=NULL){
		if(!empty($_id_template)){
			$this->news_db->connect_db();

			$supprSQL		= sprintf("DELETE FROM rel_template_groupe_tb WHERE id_template=%s", GetSQLValueString($_id_template,'int'));
			$suppr_query	= mysql_query($supprSQL) or die(mysql_error());
		}
	}
	
	/*
	@
	@
	@
	*/
	function get_archives_liste($_id){
		if(!empty($this->id)){
			$selecSQL = sprintf("SELECT N.unique_id, N.nom, N.objet, N.date
								FROM newsletter_tb AS N, template_tb AS T
								WHERE N.template = T.id
								AND T.id = %s
								AND N.is_archive = 1
								ORDER BY date DESC",GetSQLValueString($this->id, "int"));
		}else if(!empty($_id)){
			$selecSQL = sprintf("SELECT N.unique_id, N.nom, N.objet, N.date
								FROM newsletter_tb AS N, template_tb AS T
								WHERE N.template = T.id
								AND T.id = %s
								AND N.is_archive = 1
								ORDER BY date DESC",GetSQLValueString($_id, "int"));
		}
		
		$selectQuery = mysql_query($selecSQL) or die(mysql_error());
		
		$i = 0;

		$retour = "<ul class='archive_liste'>\n";
		$annee  = 0;

		while ($archive_item = mysql_fetch_assoc($selectQuery)){
			//$liste_news[$news_item['id']]	= 'n°'.$news_item['id'].' : '.$news_item['nom'];
									
			$class				= 'listItemRubrique'.($i+1);
			$unique_id			= $archive_item['unique_id'];
			$nom				= $archive_item['nom'];
			$objet				= $archive_item['objet'];
			$date				= $archive_item['date'];
			
			$date_tab			= explode('-',$date);
			$date2				= $date_tab['1'];
			
			
			if($annee != $date_tab['0']){
				$retour.= "<li class='annee'>".$date_tab['0']."</li>\n";
			}
			
			
			$retour.= "<li><a href='".ABSOLUTE_URL."archive-$unique_id.html' target='_blank'>$nom</a></li>\n";
			
			$annee				= $date_tab['0'];
			
			$i = ($i+1)%2;
			
		}
		
		$retour.= "</ul>\n";
		
		return $retour;
	}

}
	
	

?>