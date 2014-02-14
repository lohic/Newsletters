<?php

include_once('../vars/constantes_vars.php');

include_once('../vars/statics_vars.php');
include_once('../classe/classe_core.php');
include_once('../classe/classe_newsletter.php');
//include_once('../classe/classe_actu.php');
include_once('../classe/fonctions.php');
//include_once('../classe/classe_rss.php');
//include_once('../classe/classe_dest.php');

$core = new core();


$id_newsletter	= isset($_GET['id_newsletter'])?$_GET['id_newsletter']:-1;
$id_actu		= isset($_GET['id_actu'])?$_GET['id_actu']:-1;

$news = new newsletter($id_newsletter,"gene");
$news->set_core($core);
//$actu = new actu($id_actu);
//$actu->set_core($core);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sciences Po | Liste des archives des newsletters</title>

</head>





<body>

<div id="page">
    
    <?php
    
	//if(!$core->isAdmin){ 
	// SI ON N'EST PAS EN MODE ADMIN
    // LE MENU D'IDENTIFICATION
	
		//include_once('../structure/header.php'); 
		//include_once('../structure/login.php');    
    //}else{
	// SINON
	// LE MENU GENERAL 
		
	
		include_once('../structure/newsletter-archive-liste.php');
	
	//}
	?>


</div>

</body>
</html>