<?php
header('Content-type: text/html; charset=UTF-8');

include_once("../classe/classe_newsletter.php");


//$temp ='';

$reponse = '';

foreach($_POST as $key => $value){
	//$temp.= $key.' = '.$value."\n";
	
	static $id_newsletter = NULL;
	$item_list = array();

	if($key == 'id_news'){
		$id_newsletter = $value;

		if(!isset($news)){
			$news = new newsletter($id_newsletter);
		}

		$reponse = $news->delete_newsletter_items();
	}

	if(isset($id_newsletter)){
		if($ordre = 0){
			$reponse = 'Les données suivantes ont bien été sauvegardées : ';
		}
			
		if($key == 'liste_id'){		
			$item_list = explode('|',$value);
			
			$ordre = 0;
			foreach($item_list as $ordre=>$item){
				
				$temp = explode('@',$item);

				$liste_name	= "#undefined";
				$origine	= $temp[0];
				$id_origine = $temp[1];
				$ordre++;
				
				$news->add_newsletter_item($origine,$id_origine,$ordre,$liste_name);
				
			}
		}
	}
	
}




/*
if(count($_POST) > 0) {
	echo "Données reçues en POST:";
	foreach($_POST as $v){
		echo ($v).":";
	}
}else if(count($_POST) == 0 ){
	echo 'Aucune donnée n\'a été reçue par "'.basename($_SERVER["PHP_SELF"]).'"...';
}
*/
?>