<?php
header('Content-type: text/html; charset=UTF-8');

include_once("../classe/classe_newsletter.php");



echo 'état : ';

$reponse = '';


if(isset($_POST['id'])){
	
	$id_newsletter = $_POST['id'];

	if(!isset($news)){
		$news = new newsletter($id_newsletter);
	}
	
	$reponse = $news->delete_newsletter_items();
	
	//echo $_POST['save_value'];
	
	$listes = explode('|',$_POST['save_value']);	
	$supprime_dernier_item_vide = array_pop($listes);
	

	$i = 0;
	foreach($listes as $liste){
		if(!empty($liste)){
			$elem = explode(':',$liste);
			
			$liste_name	= "#".$elem[0];
			//$origine	= $temp[0];
			//$id_origine = $temp[1];
			
			$items = explode(',',$elem[1]);
						
			if(count($items)>0){
				$ordre=0;
				
				foreach($items as $item){
					if($item != ''){
						$temp = explode('@',$item);	
						$origine	= $temp[0];
						$id_origine = $temp[1];	
						$ordre++;
						
						if(!empty($id_origine)){
							//echo "<br/>liste : ".$liste_name.' origine : '.$origine.' id : '.$id_origine.' ordre : '.$ordre;
							
							/*echo "$liste_name : ";
							echo "$origine : ";
							echo "$id_origine, ";*/
							
							$news->add_newsletter_item($origine,$id_origine,$ordre,$liste_name);
							//break;
						}
					}
				}
			}
		}
	}
	echo 'La newsletter a bien été sauvegardée.';

}

?>