<?php
header('Content-type: text/html; charset=UTF-8');

include_once("classe/classe_newsletter.php");
include_once('vars/statics_vars.php');



echo 'état : ';

$reponse = '';



if(!empty($_POST['id'])){
	
	$id_newsletter = $_POST['id'];

	if(!isset($news)){
		$news = new newsletter($id_newsletter);
	}
	if(empty($_POST['liste_destinataire']) && empty($_POST['dest'])){
		echo 'aucun destinataire n\'a été selectionné';
	}else{
		$temp_liste = !empty($_POST['liste_destinataire'])?explode(',',str_replace(' ','',$_POST['liste_destinataire'])):array();
		$temp_sql	= !empty($_POST['dest'])?$_POST['dest']:array();
	
		$mail_liste = array_merge($temp_liste,$temp_sql);

		$news->send_newsletter('newsletter@sciences-po.fr',$mail_liste,$id_newsletter);

		
	
		echo 'la newsletter a bien été envoyée à : '.implode(', ',$mail_liste);;
	}
}else{
	echo 'aucune newsletter sélectionnée';
}

?>