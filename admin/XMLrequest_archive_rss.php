<?php
header('Content-type: text/html; charset=UTF-8');

include_once('classe/classe_rss.php');
include_once('classe/fonctions.php');
include_once('vars/statics_vars.php');
include_once('classe/classe_simplepie.php');

$flux_rss = new rss();
$rss_liste = $flux_rss->get_flux_url();

foreach($rss_liste as $rss_info){
		
	$feed = new SimplePie($rss_info->URL);
	$feed->handle_content_type();

	foreach($feed->get_items() as $item){
	
		$temp		= $flux_rss->trouverimage($item->get_content());
		$letexte	= $temp->txt;
		$image		= $temp->img;
		
		$data_array 				= array();
		$data_array['id_flux']		= $rss_info->id;
		$data_array['titre']		= $item->get_title(); 
		$data_array['description'] 	= $item->get_description();
		$data_array['texte']		= $letexte;
		$data_array['date']			= $item->get_date('Y-m-d G:i:s');;
		$data_array['URL']			= $item->get_permalink();
		$data_array['image']		= $image;	
	
		$flux_rss->archive_rss($data_array);
	
	}

}

echo "Les flux RSS ont bien été archivés."

?>