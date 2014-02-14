<?php
header('Content-type: text/html; charset=UTF-8');


include_once('../vars/constantes_vars.php');

include_once('../vars/statics_vars.php');
include_once('../classe/classe_core.php');
include_once("../classe/classe_actu.php");
$core = new core();
$actu	= new actu();
$actu->set_core($core);

if(!empty($_POST['id_media'])){
	
	echo $actu->update_visibility($_POST['id_media']);
	
}

?>