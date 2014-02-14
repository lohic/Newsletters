<?php
include_once('classe_connexion.php');
include_once('fonctions.php');
include_once('connexion_vars.php');

/*
SELECT DISTINCT d.mail
FROM destinataires_tb AS d, destinataire_groupes_tb AS g, rel_dest_groupe_tb AS r
WHERE d.id = r.id_dest
AND g.id = r.id_groupe
AND r.id_groupe IN (1,2)
OR d.id IN (3,4)
ORDER BY d.mail
*/

class Dest {
	
	var $news_db		= NULL;
	
	/*
	@ GESTION DES DESTINATAIRES
	@
	@
	*/
	function dest(){
		global $news_cInfo;
		$this->news_db		= new connexion($news_cInfo['server'],$news_cInfo['user'],$news_cInfo['password'],$news_cInfo['db']);
	}
	
	
	/*
	@ creation de destinataire
	@
	@
	*/
	function create_dest($_array_val=NULL){
		if(!empty($_array_val)){
			$this->news_db->connect_db();

			$insertSQL 		= sprintf("INSERT INTO destinataires_tb (nom,mail) VALUES (%s,%s)",
													GetSQLValueString($_array_val['nom'], "text"),
									   				GetSQLValueString($_array_val['mail'], "text"));
			$insert_query	= mysql_query($insertSQL) or die(mysql_error());
		
			$id_dest = mysql_insert_id();
			
			$this->add_groupe_dest($id_dest,$_array_val['groupe_dest']);
			
			return $id_dest;
		}
	}
	
	/*
	@ modification de destinataire
	@
	@
	*/
	function modif_dest($_array_val=NULL){
		if(!empty($_array_val)){
			$this->news_db->connect_db();

			$insertSQL 		= sprintf("UPDATE destinataires_tb SET nom=%s,mail=%s WHERE id=%s",
													GetSQLValueString($_array_val['nom'], "text"),
									   				GetSQLValueString($_array_val['mail'], "text"),
									   				GetSQLValueString($_array_val['id'], "int"));
			$insert_query	= mysql_query($insertSQL) or die(mysql_error());
		
			
			/*//MODIFICATION
			$updateSQL 		= sprintf("UPDATE actu_item_tb SET date=%s, titre=%s, categorie=%s, soustitre=%s, texte=%s, image=%s, moreTXT=%s, URL=%s WHERE id=".GetSQLValueString($_id,"int"),
													GetSQLValueString($_array_val['date'],		"date"),
													GetSQLValueString($_array_val['titre'],		"text"),
													GetSQLValueString($_array_val['categorie'], "int"),
													GetSQLValueString($_array_val['soustitre'], "text"),
													GetSQLValueString($_array_val['texte'],		"text"),
													GetSQLValueString($_array_val['image'],		"text"),
													GetSQLValueString($_array_val['moreTXT'],		"text"),
													GetSQLValueString($_array_val[*/
			
			
			$this->add_groupe_dest($_array_val['id'],$_array_val['groupe_dest']);
			
			return $id_dest;
		}
	}
	
	
	/*
	@ edition de destinataire
	@
	@
	*/
	function add_groupe_dest($_id_dest=NULL, $_array_groupe=NULL){
		if(!empty($_id_dest) && !empty($_array_groupe)){
			$this->clean_groupe($_id_dest);
			
			
			$this->news_db->connect_db();

			foreach($_array_groupe as $_id_groupe){
				$insertSQL 		= sprintf("INSERT INTO rel_dest_groupe_tb (id_dest,id_groupe) VALUES (%s,%s)",
														GetSQLValueString($_id_dest, "int"),
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
	function clean_groupe($_id_dest=NULL){
		if(!empty($_id_dest)){
			$this->news_db->connect_db();

			$supprSQL		= sprintf("DELETE FROM rel_dest_groupe_tb WHERE id_dest=%s", GetSQLValueString($_id_dest,'int'));
			$suppr_query	= mysql_query($supprSQL) or die(mysql_error());
		}
	}
	
	/*
	@ edition de destinataire
	@
	@
	*/
	function edit_dest($_id=NULL,$_array_val=NULL){
		if(!empty($_id) && !empty($_array_val)){
			
		}
	}
	
	/*
	@ supression de destinataire
	@
	@
	*/
	function suppr_dest($_id=NULL){
		if(isset($_id)){
			$this->news_db->connect_db();

			$supprSQL		= sprintf("DELETE FROM destinataires_tb WHERE id=%s", GetSQLValueString($_id,'int'));
			$suppr_query	= mysql_query($supprSQL) or die(mysql_error());
			
			$supprSQL		= sprintf("DELETE FROM rel_dest_groupe_tb WHERE id_dest=%s", GetSQLValueString($_id,'int'));
			$suppr_query	= mysql_query($supprSQL) or die(mysql_error());

			return 'les éléments ont bien été supprimés';
		}
		return 'il n\'y a aucun élément à supprimer';
	}
	
	/*
	@ liste des destinataire sous forme de cases à cocher
	@
	@
	*/
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
	
	/*
	@ liste des destinaires
	@
	@
	*/
	function get_dest_list(){
		$sql_liste_dest	= 'SELECT * FROM destinataires_tb ORDER BY nom';
		$sql_liste_dest_query = mysql_query($sql_liste_dest) or die(mysql_error());

		$destinaire = array();
		
		$i = 0;

		while ($dest = mysql_fetch_assoc($sql_liste_dest_query)){
			
			$class  = 'listItemRubrique'.($i+1);
			$id		= $dest['id'];
			$nom	= $dest['nom'];
			$mail	= $dest['mail'];
			$groupes= $this->get_groupe($id,$id);
			
			include('structure/admin-contacts-list-bloc.php');
			
			$i = ($i+1)%2;
		}
	}
	
	/*
	@ creation de groupe
	@
	@
	*/
	function create_groupe($_array_val=NULL){
		if(!empty($_array_val)){
			$this->news_db->connect_db();

			$insertSQL 		= sprintf("INSERT INTO destinataire_groupes_tb (libelle) VALUES (%s)",
													GetSQLValueString($_array_val['libelle'], "text"));
			$insert_query	= mysql_query($insertSQL) or die(mysql_error());
		
			return mysql_insert_id();
		}
	}
	
	/*
	@ modification de groupe
	@
	@
	*/
	function modif_groupe($_array_val=NULL){
		if(!empty($_array_val)){
			$this->news_db->connect_db();

			$updateSQL 		= sprintf("UPDATE destinataire_groupes_tb SET libelle=%s WHERE id=%s",
													GetSQLValueString($_array_val['libelle'], "text"),
													GetSQLValueString($_array_val['id'], "int"));
			$update_query	= mysql_query($updateSQL) or die(mysql_error());
		}
	}
	/*
	@ supression de groupe
	@
	@
	*/
	function suppr_groupe($_id=NULL){
		if(!empty($_id)){
			$this->news_db->connect_db();

			$supprSQL		= sprintf("DELETE FROM destinataire_groupes_tb WHERE id=%s", GetSQLValueString($_id,'int'));
			$suppr_query	= mysql_query($supprSQL) or die(mysql_error());

			$supprSQL		= sprintf("DELETE FROM rel_dest_groupe_tb WHERE id_groupe=%s", GetSQLValueString($_id,'int'));
			$suppr_query	= mysql_query($supprSQL) or die(mysql_error());
		}
	}
	
	
	
	function get_groupe($_id=NULL,$id_dest=NULL){
		$sql_liste_groupe	= 'SELECT * FROM destinataire_groupes_tb ORDER BY libelle';
		$sql_liste_groupe_query = mysql_query($sql_liste_groupe) or die(mysql_error());
		
	
			
		

		while ($groupe = mysql_fetch_assoc($sql_liste_groupe_query)){
			$temp->label	= $groupe['libelle'];
			$temp->select	= '';
			$temp->value	= $groupe['id'];
			$temp->classe	= 'inline';
			
			if(isset($id_dest)){
				$sql_liste_dest	= "SELECT * FROM rel_dest_groupe_tb WHERE id_groupe=".$groupe['id'];
				$sql_liste_dest_query = mysql_query($sql_liste_dest) or die(mysql_error());
				
				while ($dest = mysql_fetch_assoc($sql_liste_dest_query)){
					if($dest['id_dest']==$id_dest){
						$temp->select	= 'ok';
					}
				}
			}
		
			$groupes[]	= $temp;
			$temp = NULL;
		}

		if($_id){
			$id ='dest_'.$_id;
		}else{
			$id = 'dest';	
		}

		return createCheckBox($groupes,'groupe_dest[]',$id);
	}
	
	function get_groupe_list(){
		$sql_liste_dest	= 'SELECT * FROM destinataire_groupes_tb ORDER BY libelle';
		$sql_liste_dest_query = mysql_query($sql_liste_dest) or die(mysql_error());

		
		$i = 0;

		while ($groupe = mysql_fetch_assoc($sql_liste_dest_query)){
			
			$class  = 'listItemRubrique'.($i+1);
			$id 	= $groupe['id'];
			$nom	= $groupe['libelle'];
			
			include('structure/admin-groupes-list-bloc.php');
			
			$i = ($i+1)%2;
		}

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

	}
	
	
	/*
	@ liste des groupes sous forme de cases à cocher
	@ utilisé dans structure/newsletter-send.php
	@
	*/
	function get_groupes_selector(){
		$sql_liste_groupe	= 'SELECT * FROM destinataire_groupes_tb ORDER BY libelle';
		$sql_liste_groupe_query = mysql_query($sql_liste_groupe) or die(mysql_error());

		$liste_items	= '';
		while ($groupe = mysql_fetch_assoc($sql_liste_groupe_query)){
			$liste_items	.= '<span><input name="group[]" type="checkbox" value="'.$groupe['id'].'" id="group-'.$groupe['id'].'" /><label class="contact_label" for="group-'.$groupe['id'].'">'.$groupe['libelle'].'</label></span>	';
		}

		return $liste_items;
	}
	
	
	/*
	@ liste des destinataire sous forme de cases à cocher
	@ utilisé dans structure/newsletter-send.php
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
			$temp->value	= $dest['id'];
			$temp->classe	= 'group-'.$dest['groupe'];
		
			$destinaire[]	= $temp;
			$temp = NULL;
		}
		
		foreach($destinaire as $key => $value){
			// $array->select	|	$array->value	|	$array->label	| $array->classe
			$classe = isset($value->classe)?' class="'.$value->classe.'" ':'';
			echo '<span><input type="checkbox" name="dest[]" value="'.$value->value.'" id="dest-'.$key.'" '.$classe.' /><label class="contact_label" for="'.$id.'-'.$key.'">'.$value->label.'</label></span>'."\n";
		}
	}
	
	
	/*
	@ liste unique des destinataires selectionnés
	@
	@
	*/
	function unify_dest($array_dest=NULL,$array_groupe=NULL,$liste_dest=NULL,$dest_from_file=NULL){
		$id_dest = '-1';
		if(!empty($_POST['dest'])){
			$id_dest = 	implode(',',$array_dest);
		}
		$id_group = '-1';
		if(!empty($_POST['group'])){
			$id_group = implode(',',$array_groupe);
		}
		
		//echo $id_dest.' '.$id_group;
		
		$sql_liste_dest	= 'SELECT DISTINCT d.mail AS mail
							FROM destinataires_tb AS d, destinataire_groupes_tb AS g, rel_dest_groupe_tb AS r
							WHERE d.id = r.id_dest
							AND g.id = r.id_groupe
							AND r.id_groupe IN ('.$id_group.')
							OR d.id IN ('.$id_dest.')
							ORDER BY d.mail';
		$sql_liste_dest_query = mysql_query($sql_liste_dest) or die(mysql_error());
		
		
		while ($dest = mysql_fetch_assoc($sql_liste_dest_query)){
			$liste[] =  $dest['mail'];
		}
	
		$mail_liste = array_unique(arraytolower(array_merge($liste,$liste_dest)));
		
		return $mail_liste;
	}
}

?>