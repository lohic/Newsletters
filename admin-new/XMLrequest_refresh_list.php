<?php
header('Content-type: text/html; charset=UTF-8');

include_once("../classe/classe_newsletter.php");
include_once("../classe/classe_actu.php");
include_once("../classe/classe_rss.php");



if(isset($_POST['id_newsletter'])){

	$id_newsletter	= $_POST['id_newsletter'];
	$actu			= new actu();
	$rss			= new rss();
	
	if(!isset($news)){
		$news = new newsletter($id_newsletter);
	}
	
	$temp		= explode('_',$_POST['origine']);
	$from		= $temp[0];
	$from_id	= isset($temp[1])?$temp[1]: -1;
	$lang		= isset($temp[2])?$temp[2]:'fr';
	
	if($from == 'event'){
		echo $news->get_liste_evenements($_POST["annee"],$_POST["mois"]);
	}else if($from == 'eventnew' && $lang =='fr'){
		echo $news->get_liste_evenements_new($_POST["annee"],$_POST["mois"],'fr',$from_id);
	}else if($from == 'eventnew' && $lang =='en'){
		echo $news->get_liste_evenements_new($_POST["annee"],$_POST["mois"],'en',$from_id);
	}else if ($from == 'actu'){
		echo $actu->get_liste_actu($from_id,$_POST["annee"],$_POST["mois"]);
	}else if ($from == 'rss'){
		echo $rss->get_liste_rss($from_id,$_POST["annee"],$_POST["mois"]);
	}else{
		echo '<li>Aucun élément</li>';
	}	
}
?> 