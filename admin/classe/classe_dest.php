<?php
include_once('classe_connexion.php');
include_once('fonctions.php');
include_once('connexion_vars.php');

class Dest {
	
	var $news_db		= NULL;
	
	/* GESTION DES NEWS*/
	function dest(){
		global $news_cInfo;
		$this->news_db		= new connexion($news_cInfo['server'],$news_cInfo['user'],$news_cInfo['password'],$news_cInfo['db']);
	}
	
	function create_dest($_array_val=NULL){
		if(!empty($_array_val)){
			$this->news_db->connect_db();

			$insertSQL 		= sprintf("INSERT INTO destinataires_tb (nom,mail,groupe) VALUES (%s,%s,%s)",
													GetSQLValueString($_array_val['nom'], "text"),
									   				GetSQLValueString($_array_val['mail'], "text"),
									   				GetSQLValueString($_array_val['groupe'], "int"));
			$insert_query	= mysql_query($insertSQL) or die(mysql_error());
		
			return mysql_insert_id();
		}
	}
	
	function edit_dest($_id=NULL,$_array_val=NULL){
		if(!empty($_id) && !empty($_array_val)){
			
		}
	}
	
	function delete_dest($_id=NULL){
		if(isset($_id)){
			$this->news_db->connect_db();

			$supprSQL		= sprintf("DELETE FROM destinataires_tb WHERE id=%s", GetSQLValueString($_id,'int'));
			$suppr_query	= mysql_query($supprSQL) or die(mysql_error());

			return 'les éléments ont bien été supprimés';
		}
		return 'il n\'y a aucun élément à supprimer';
	}
	
	function get_dest(){
		$sql_liste_dest	= 'SELECT * FROM destinataires_tb ORDER BY groupe, nom';
		$sql_liste_dest_query = mysql_query($sql_liste_dest) or die(mysql_error());

		$destinaire = array();

		while ($dest = mysql_fetch_assoc($sql_liste_dest_query)){
			$temp->label	= $dest['nom'] . ' (' . $dest['mail'] . ')';
			$temp->select	= '';
			$temp->value	= $dest['mail'];
		
			$destinaire[]	= $temp;
			$temp = NULL;
		}

		return createCheckBox($destinaire,'dest[]','dest');
	}

	function create_groupe($_array_val=NULL){
		if(!empty($_array_val)){
			$this->news_db->connect_db();

			$insertSQL 		= sprintf("INSERT INTO destinataire_groupes_tb (libelle) VALUES (%s)",
													GetSQLValueString($_array_val['libelle'], "text"));
			$insert_query	= mysql_query($insertSQL) or die(mysql_error());
		
			return mysql_insert_id();
		}
	}
	
	function get_groupe(){
		$sql_liste_dest	= 'SELECT * FROM destinataire_groupes_tb ORDER BY libelle';
		$sql_liste_dest_query = mysql_query($sql_liste_dest) or die(mysql_error());

		$groupes = array();

		while ($dest = mysql_fetch_assoc($sql_liste_dest_query)){
			$temp->label	= $dest['libelle'];
			$temp->select	= '';
			$temp->value	= $dest['id'];
		
			$groupes[]	= $temp;
			$temp = NULL;
		}

		return createCheckBox($groupes,'dest[]','dest');
	}

	function get_liste_group(){
		$sql_liste_dest	= 'SELECT * FROM destinataire_groupes_tb ORDER BY libelle';
		$sql_liste_dest_query = mysql_query($sql_liste_dest) or die(mysql_error());

		$groupes = array();

		while ($dest = mysql_fetch_assoc($sql_liste_dest_query)){
			$groupes[$dest['id']] = $dest['libelle'];
			/*$temp->label	= $dest['libelle'];
			$temp->select	= '';
			$temp->value	= $dest['id'];
		
			$groupes[]	= $temp;
			$temp = NULL;*/
		}

		return $groupes;


		/*
		$liste_template = array();

		while ($template_item = mysql_fetch_assoc($sql_liste_template_query)){
			$liste_template[$template_item['id']]	= $template_item['nom'];
		}

		return $liste_template;*/
	}
	
}

?>