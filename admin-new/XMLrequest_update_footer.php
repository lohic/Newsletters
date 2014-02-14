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
	
	$reponse = $news->update_footer($_POST['footer_id']);

	echo 'Le footer a bien été modifié.';

}

?>