<?php

//include_once('../vars/constantes_vars.php');

include_once('../vars/statics_vars.php');
include_once('../classe/classe_core.php');
include_once('../classe/classe_newsletter.php');
include_once('../classe/classe_actu.php');
include_once('../classe/fonctions.php');
//include_once('../classe/classe_rss.php');
//include_once('../classe/classe_dest.php');

$core = new core();


$id_newsletter	= isset($_GET['id_newsletter'])?$_GET['id_newsletter']:-1;
$id_actu		= isset($_GET['id_actu'])?$_GET['id_actu']:-1;

$news = new newsletter($id_newsletter,"gene");
$news->set_core($core);
$actu = new actu($id_actu);
$actu->set_core($core);

if(isset($_POST['duplicate']) && $_POST['duplicate']=='actu'){
	echo $actu->duplicate_actu($_POST['id']); 
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sciences Po | Administration des newsletters</title>
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="../js/jquery-ui-1.8.4.custom/development-bundle/themes/base/jquery.ui.all.css" rel="stylesheet" />

<script type="text/javascript" src="../js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.4.custom.min.js"></script>
<script type="text/javascript" src="../js/jquery.dragsort-0.3.10.js"></script>
<script type='text/javascript' src='../js/jquery.form.js'></script>
<script type="text/javascript" src="../js/splitter.js"></script>
<script type="text/javascript" src="../js/jquery.cookie.js"></script>
<script type='text/javascript' src='../js/animatedcollapse.js'></script>
<script type="text/javascript" src="../js/jquery.iframe-post-form.js"></script>
<script type="text/javascript" src="../js/fonctions.js"></script>

<script type="text/javascript">
    <!--
	//GESTION DE MENU
	$(document).ready( function () {
		
		$('ul#menuDown > li').mouseover(function(){ $(this).children('a').addClass('menuDown-hover').siblings('ul').show(); });
		$('ul#menuDown > li').mouseout(function(){ $(this).children('a').removeClass('menuDown-hover').siblings('ul').hide(); });
		
		// GESTION DU MENU PRINCIPAL
		$("#globalnav>ul>li>a").each( function () {	
			$(this).attr("class","");
		} ) ;
		
		$("#globalnav>ul>li>a").click( function () {
			$("#globalnav>ul>li>a").each( function () {
				$(this).attr("class","");
			} ) ;
			$(this).attr("class","select");	
		} ) ;

		$("li span.trash").each( function () {	
			$(this).click( function () {
				$(this).parent().remove();
				var order = '';
				$('.news_list').each( function () {
					order += $(this).attr('id') +':'+ $(this).sortable('toArray')+'|';
				});
				//alert(order);
				var valeur = document.getElementById("save_value");
				valeur.value = order;
				
				$('#return_refresh').text('état : Sauvegarde en cours !');
				$('#refresh_form').submit();
			} ) ;
		} ) ;

	} ) ;
	

	$(function() {
		$("#date_newsletter2").datepicker({
			dateFormat: 'yy-mm-dd',
			firstDay: 1,
			dayNamesMin : ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
			monthNames : ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre']
		});
	});
</script>

</head>





<body>

<div id="page">

	<?php if(!isset($_GET['page']) || empty($_GET['page'])){ $_GET['page']= 'news_select' ; } ?>
    
    <?php
    
	if(!$core->isAdmin){ 
	// SI ON N'EST PAS EN MODE ADMIN
    // LE MENU D'IDENTIFICATION
	
		include_once('../structure/header.php'); 
		include_once('../structure/login.php');    
    }else{
	// SINON
	// LE MENU GENERAL 
		include_once('../structure/header.php');
    	include_once('../structure/menu.php');
		
		switch($_GET['page']){
			case 'news_select' :
				include_once('../structure/newsletter-select.php');
			break;
			case 'news_send' :
				include_once('../structure/newsletter-send.php');
			break;
			case 'news_create' :
				include_once('../structure/newsletter-create.php');
			break;
			case 'news_modif' :
				include_once('../structure/newsletter-modif.php');
			break;
			case 'actu_select' :
				include_once('../structure/actu-list.php');
			break;
			case 'actu_create' :
				include_once('../structure/actu-modif.php');
			break;
			case 'actu_modif' :
				include_once('../structure/actu-modif.php');
			break ;
			case 'contact' :
				include_once('../structure/admin-contacts.php');
			break;	
			case 'groupes' :
				include_once('../structure/admin-groupes.php');
			break;
			case 'groupe_modif' :
				include_once('../structure/admin-groupes-modif.php');
			break;
			case 'template_select' :
				include_once('../structure/admin-templates.php');
			break;
			case 'archive_liste' :
				include_once('../structure/newsletter-archive-liste.php');
			break;
			case 'footer_admin' :
				include_once('../structure/admin-footers.php');
			break;
			case 'admin' :
				include_once('../structure/admin-options.php');
			break;
			case 'comptes' :
				include_once('../structure/admin-comptes.php');
			break;
			case 'groupes_admin' :
				include_once('../structure/admin-groupes-admin.php');
			break;
			case 'organismes' :
				include_once('../structure/admin-organismes.php');
			break;
			default :
				include_once('../structure/newsletter-select.php');
			break;
		}
			
		?>
        
    <div class="reset" ></div>
    <div class="bottom-div"></div>
    <?php }?>

</div>

</body>
</html>