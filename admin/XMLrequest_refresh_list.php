<?php
header('Content-type: text/html; charset=UTF-8');

include_once("classe/classe_newsletter.php");
include_once("classe/classe_actu.php");
include_once("classe/classe_rss.php");



if(isset($_POST['id_newsletter'])){

	$id_newsletter	= $_POST['id_newsletter'];
	$actu			= new actu();
	$rss			= new rss();
	
	if(!isset($news)){
		$news = new newsletter($id_newsletter);
	}
	
	$temp		= split('_',$_POST['origine']);
	$from		= $temp[0];
	$from_id	= $temp[1];
	
	if($from == 'event'){
		echo $news->get_liste_evenements($_POST["annee"],$_POST["mois"]);
	}else if($from == 'eventnew'){
		echo $news->get_liste_evenements_new($_POST["annee"],$_POST["mois"]);
	}else if ($from == 'actu'){
		echo $actu->get_liste_actu($from_id,$_POST["annee"],$_POST["mois"]);
	}else if ($from == 'rss'){
		echo $rss->get_liste_rss($from_id,$_POST["annee"],$_POST["mois"]);
	}else{
		echo '<li>Aucun élément</li>';
	}	
}
?> 