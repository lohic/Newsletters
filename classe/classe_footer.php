<?php

include_once('classe_connexion.php');
include_once('fonctions.php');
include_once('connexion_vars.php');


class Footer {
	
	var $news_db		= NULL;
	var $id				= NULL;
	
	/*
	@ GESTION DES FOOTER
	@
	@
	*/
	function footer($_id=NULL){
		global $news_cInfo;
		$this->news_db		= new connexion($news_cInfo['server'],$news_cInfo['user'],$news_cInfo['password'],$news_cInfo['db']);
	}
	
	/*
	@ creation ou modification de FOOTER
	@
	@
	*/
	function create_footer($_array_val,$_id=NULL){
		$this->news_db->connect_db();

		if(isset($_id)){
			//MODIFICATION
			$updateSQL 		= sprintf("UPDATE newsletter_footer_tb SET titre=%s, footer=%s WHERE id=%s",
													GetSQLValueString($_array_val['titre'],					"text"),
													GetSQLValueString($_array_val['footer'],				"text"),
													GetSQLValueString($_id,"int"));
																										
			$update_query	= mysql_query($updateSQL) or die(mysql_error());
		}else{
			//CREATION
			$insertSQL 		= sprintf("INSERT INTO newsletter_footer_tb (titre, footer) VALUES (%s,%s)",
													GetSQLValueString($_array_val['titre'],					"text"),
													GetSQLValueString($_array_val['footer'],				"text"));
			$insert_query	= mysql_query($insertSQL) or die(mysql_error());

			return mysql_insert_id();
		}	
	}
	
	
	/*
	@ RECUPERE LA LISTE DES FOOTERS
	@
	@
	*/
	function get_footer_edit_liste(){
		$this->news_db->connect_db();

		$sql_footer		= sprintf('SELECT * FROM newsletter_footer_tb ORDER BY titre');
		$sql_footer_query = mysql_query($sql_footer) or die(mysql_error());
		
		$i = 0;

		while ($footer_item = mysql_fetch_assoc($sql_footer_query)){
			//$liste_news[$news_item['id']]	= 'n°'.$news_item['id'].' : '.$news_item['nom'];
						
			$class				= 'listItemRubrique'.($i+1);
			$id					= $footer_item['id'];
			$titre				= $footer_item['titre'];
			$footer				= $footer_item['footer'];
			
			//$groupes			= $this->get_groupe($id,$id);
			
			include('../structure/admin-footers-list-bloc.php');
			
			$i = ($i+1)%2;
			
		}
	}
	
	/*
	@ SUPPRIME UN FOOTER
	@
	@
	*/
	function suppr_footer($_id = NULL){
		if(isset($_id)){
			$this->news_db->connect_db();

			$supprSQL		= sprintf("DELETE FROM newsletter_footer_tb WHERE id=%s", GetSQLValueString($_id,'int'));
			$suppr_query	= mysql_query($supprSQL) or die(mysql_error());

			return 'les éléments ont bien été supprimés';
		}
		return 'il n\'y a aucun élément à supprimer';
	}
	
	/*
	@ RETOURNE LA LISTE DES FOOTERS EN COMBOBOX
	@
	@
	*/
	function get_footer_liste(){
		$this->news_db->connect_db();

		$sql_footer		= sprintf('SELECT * FROM newsletter_footer_tb ORDER BY titre');
		$sql_footer_query = mysql_query($sql_footer) or die(mysql_error());
	

		while ($footer_item = mysql_fetch_assoc($sql_footer_query)){
			//$liste_news[$news_item['id']]	= 'n°'.$news_item['id'].' : '.$news_item['nom'];
			
			$footer_list[$footer_item['id']] = $footer_item['titre'];
			
		}
		
		return $footer_list;
	}
	
}
	
	

?>