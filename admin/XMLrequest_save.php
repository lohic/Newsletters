<?php
header('Content-type: text/html; charset=UTF-8');

include_once("classe/classe_newsletter.php");



echo 'état : ';

$reponse = '';


if(isset($_POST['id'])){
	
	$id_newsletter = $_POST['id'];

	if(!isset($news)){
		$news = new newsletter($id_newsletter);
	}
	
	$reponse = $news->delete_newsletter_items();
	
	
	$listes = explode('|',$_POST['save_value']);

	//echo $_POST['id']."<br/>valeur : ";
	$i = 0;
	foreach($listes as $liste){
		if(!empty($liste)){
			$elem = explode(':',$liste);
			
			$liste_name	= "#".$elem[0];
			$origine	= $temp[0];
			$id_origine = $temp[1];
			
			$ordre=0;
			$items = explode(',',$elem[1]);
						
			if(count($items)>0){
				foreach($items as $item){
					$temp = explode('@',$item);	
					$origine	= $temp[0];
					$id_origine = $temp[1];	
					$ordre++;
					
					if(!empty($id_origine)){
						//echo "<br/>liste : ".$liste_name.' origine : '.$origine.' id : '.$id_origine.' ordre : '.$ordre;
						
						$news->add_newsletter_item($origine,$id_origine,$ordre,$liste_name);
					}
				}
			}
		
			//echo "<br/> #".$elem[0].' ::: '.$elem[1];
			//$i++;
		}
	}

	/*$id_newsletter = $_POST['id'];

	if(!isset($news)){
		$news = new newsletter($id_newsletter);
	}

	$reponse = $news->delete_newsletter_items();
	$ordre = 0;
	$item_list = explode('|',$_POST['save_value']);

	foreach($item_list as $ordre=>$item){
		
		$temp = explode('@',$item);


		// !!!!!!!!!!!!!! ATTENTION PAS PROPRE
		$liste_name	= "#evenements_list";
		$origine	= $temp[0];
		$id_origine = $temp[1];
		//$ordre++;
		
		$news->add_newsletter_item($origine,$id_origine,$ordre,$liste_name);
		
	}

	echo "ok";*/
	
	echo 'La newsletter a bien été sauvegardée.';

}

?>