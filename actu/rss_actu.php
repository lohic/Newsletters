<?php

include('../classe/classe_core.php');

$core = new core();


if($_GET['lang']=='en'){
	$lang = '_en';
	$lang_link = 'en';
}else{
	$lang='';
	$lang_link = 'fr';	
}


if(isset($_GET['cat']) && $_GET['cat']!=''){
	//echo 'ok ok ok '.$_GET['cat'];
	$cat = "AND rubrique_id=".$_GET['cat'];
}else{
	$cat = "";
}

$rss	='';
$rss	.= '<?xml version="1.0" encoding="UTF-8"?>'."\n";
$rss	.= '<rss version="2.0">'."\n";


$sql = "SELECT * FROM sp_evenements, sp_rubriques WHERE evenement_statut=3 AND evenement_rubrique=rubrique_id ".$cat." ORDER BY evenement_date";

//echo $sql;

$res = mysql_query($sql)or die(mysql_error());



$rss	.= '	<channel>'."\n";
$rss	.= '		<title>'.('Science Po - Actualités').'</title>'."\n";
$rss	.= '		<description>'.('Flux RSS 2.0 des actualités de Sciences Po').'</description>'."\n";
//$rss	.= '		<lastBuildDate>Sat, 07 Sep 2002 00:00:01 GMT</lastBuildDate>'."\n";
$rss	.= '		<link>http://www.sciencespo.fr/newsletter/actu/</link>'."\n";




while($row = mysql_fetch_array($res)){
	$sqlsessions ="SELECT * FROM sp_sessions WHERE evenement_id='".$row['evenement_id']."'";
	$ressessions = mysql_query($sqlsessions) or die(mysql_error());
	$finEvenement=0;
	while($rowsession = mysql_fetch_array($ressessions)){
		if($rowsession['session_fin']>$finEvenement){
			$finEvenement = $rowsession['session_fin'];
		}
	}
	
	//$sqlSession ="SELECT * FROM sp_sessions WHERE evenement_id = '".$row['evenement_id']."'";
	//$resSession = mysql_query($sqlSession) or die(mysql_error());
	//$rowSession = mysql_fetch_array($resSession);
	
	if($finEvenement>time()){
						//$moisDebut = date("F", $row['evenement_date']);

		$rss	.= '		<item>'."\n";
		$rss	.= '			<title>'.($row['evenement_titre'.$lang]).'</title>'."\n";
		if($row['evenement_image']!=""){
		$rss	.= '			<description>'.($row['evenement_texte'.$lang]).'<p><img src="../admin/upload/photos/evenement_'.$row['evenement_id'].'/grande-'.$row['evenement_image'].'?cache='.time().'" alt="'.$row['evenement_texte_image'].'" width="480" height="270"/></p></description>'."\n";
		}else{
		$rss	.= '			<description>'.($row['evenement_texte'.$lang]).'</description>'."\n";
		}
		$rss	.= '			<pubDate>'.date("r", $row['evenement_date']).'</pubDate>'."\n";
		//$rss	.= '			<pubDate>'.date("r", time()).'</pubDate>'."\n";
		$rss	.= '			<link>http://www.sciencespo.fr/evenements/?lang='.$lang_link.'&amp;id='.$row['evenement_id'].'</link>'."\n";
		//$rss	.= '			<guid>http://www.sciencespo.fr/evenements/?lang='.$lang_link.'&amp;id='.$row['evenement_id'].'</guid>'."\n";
		//$rss	.= '			<category>'.($row['rubrique_titre']).'</category>'."\n";
		$rss	.= '		</item>'."\n";
	
	}

}

	

$rss	.= '	</channel>'."\n";
$rss	.= '</rss>'."\n";

echo $rss;
?>

							
			
