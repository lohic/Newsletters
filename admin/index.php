<?php


include_once('classe/classe_core.php');
include_once('classe/classe_newsletter.php');
include_once('classe/classe_actu.php');
include_once('classe/fonctions.php');
include_once('vars/statics_vars.php');

$core = new core();

$id_newsletter	= $_GET['id_newsletter'];
$id_actu		= $_GET['id_actu'];

$news = new newsletter($_GET['id_newsletter'],"gene");
$actu = new actu($_GET['id_actu']);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SciencesPo | Administration des newsletters</title>
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
<script type="text/javascript" src="../js/fonctions.js"></script>
<!--
<script type="text/javascript" src="../js/jquery-ui-1.8.4.custom/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.4.custom/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.4.custom/development-bundle/ui/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.4.custom/development-bundle/ui/jquery.ui.resizable.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.4.custom/development-bundle/ui/jquery.ui.sortable.js"></script>
-->

<script type="text/javascript">
    <!--
	//GESTION DE MENU
	$(document).ready( function () {
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


		// MASQUAGE DES MENUS
		animatedcollapse.addDiv('news_creation'		,'group=menu,hide=1,persist=1');
		animatedcollapse.addDiv('news_envoi'		,'group=menu,hide=1,persist=1');
		animatedcollapse.addDiv('news_creation'		,'group=menu,hide=1,persist=1');
		animatedcollapse.addDiv('news_destinataires','group=menu,hide=1,persist=1');
		animatedcollapse.addDiv('options'			,'group=menu,hide=1,persist=1');
		animatedcollapse.addDiv('actu_options'		,'group=menu,hide=1,persist=1');
		animatedcollapse.addDiv('news_select'		,'group=menu,hide=1,persist=1');

		animatedcollapse.addDiv('add_dest_form'		,'group=FORMoptions,hide=1,persist=1');
		animatedcollapse.addDiv('add_cat_form'		,'group=FORMoptions,hide=1,persist=1');
		animatedcollapse.addDiv('add_rss_form'		,'group=FORMoptions,hide=1,persist=1');
		animatedcollapse.addDiv('add_groupe_form'	,'group=FORMoptions,hide=1,persist=1');
		
		animatedcollapse.addDiv('actu'				,'group=panel,hide=1,persist=1');
		animatedcollapse.addDiv('content'			,'group=panel,hide=1,persist=1');

		animatedcollapse.addDiv('news_save'			,'hide=1,group=info');		
		
		animatedcollapse.init();

		<?php if(isset($_GET['id_actu'])){ ?>
		animatedcollapse.show('actu');
			<?php if(isset($_GET['categorie']) || isset($_GET['annee']) || isset($_GET['mois'])){ ?>
				animatedcollapse.show('actu_options');
			<?php }else{ ?>
				animatedcollapse.hide('actu_options');
			<?php } ?>
		<?php } ?>

		
		$("#news_create_btn>a").click( function () {
		  	animatedcollapse.show('news_creation');
		  	animatedcollapse.hide(['content','actu']);
		} ) ;
    	$("#news_select_btn>a").click( function () {
		  	animatedcollapse.show('news_select');
			animatedcollapse.show('content');
		} ) ;
    	$("#news_send_btn>a").click( function () {
		  	animatedcollapse.show('news_envoi');
			animatedcollapse.show('content');
		} ) ;
		$("#actu_create_btn>a").click( function () {
			animatedcollapse.hide('actu_options');
			animatedcollapse.show('actu');
		} ) ;
		$("#actu_modif_btn>a").click( function () {
		  	animatedcollapse.show('actu_options');
			animatedcollapse.show('actu');
		} ) ;
    	$("#admin_btn>a").click( function () {
		  	animatedcollapse.toggle('options');
		  	animatedcollapse.hide(['content','actu','news_save']);
		} ) ;	
		
		$("#groupe_list input").click( function (){
				$("#groupe_list input").each( function () {
					var laclasse = ($(this).attr('id'));
					var lavaleur= ($(this).is(':checked'));
					$("#dest_list ."+laclasse).each( function () {
						$(this).attr('checked', lavaleur);
					} )
			} ) ;					 
		} );

	} ) ;
	
    // -->
</script>

<script type="text/javascript">
//$(document).ready(function(){
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
<?php echo $_SERVER['REQUEST_URL']; //echo $_SERVER["SERVER_NAME"].str_replace('?'.$_SERVER['QUERY_STRING'],'',$_SERVER['REQUEST_URI']);?>
<div id="header" class="menu">
<h1>Administration des newsletters</h1></div>


<?php if(!$core->isAdmin){ ?>
<!-- LE MENU D'IDENTIFICATION -->
<div id="menulogin" class="menu admin">
	<div class="container">
        <form id="login_form" action="" method="post">
            <label for="login">identifiant : </label><input type="text" name="login" id="login" />
            <label for="password">mot de passe : </label><input type="password" name="password" id="password" />
            <input type="submit" name="login_btn" id="login_btn" value="S'identifier" />
        </form>
	</div>
</div>




<?php }else{ ?>
<div class="menu admin">
	<div class="container">
	<form id="logout_form" action="./" method="post">
    <!--<p><a href="index.php?logout=true">&gt; se déconnecter</a></p>-->
		<input name="logout" type="hidden" value="true" />
		<p>Bienvenue <?php echo $core->user_info->login ;?> <input type="submit" name="logout_btn" id="logout_btn" value="se déconnecter" /></p>
	</form>
	</div>
</div>
<div id="globalnav">
<ul>
	<li id="news_create_btn"><a href="#" class=""><span>Créer une newsletter</span></a></li>
    <li id="news_select_btn"><a href="#" class="select"><span>Sélectionner une newsletter</span></a></li>
    <li id="news_send_btn"><a href="#" class=""><span>Envoyer une newsletter</span></a></li>
    <li id="actu_create_btn"><a href="?id_actu=" class=""><span>Créer une actualité</span></a></li>
    <li id="actu_modif_btn"><a href="#" class=""><span>Modifier une actualité</span></a></li>
    <li id="admin_btn"><a href="#" class=""><span>Administration</span></a></li>
	<li id="end"></li>
</ul>
</div>
<hr class="reset" />
<!-- LE MENU GENERAL -->
<div class="menu admin">
	<div class="container">


    <div id="news_creation">
		<form id="news_creation_form" action="" method="post">
			<input type="hidden" name="edit" value="create" />
			<label for="id_template" >Template à utiliser :&nbsp;</label><?php echo createSelect($news->get_templates_liste(), 'id_template', $_GET['id_template'],NULL,false);?><br />
			<label for="nom_newsletter">Titre de la newsletter :&nbsp;</label><input type="text" name="nom" value="" id="nom_newsletter" /><br />
			<label for="objet_newsletter">Objet de la newsletter (visible lors de l'envoi du mail) :&nbsp;</label><input type="text" name="objet" value="" id="objet_newsletter" />
			<hr class="reset" />
			<label>&nbsp;</label><input type="submit" name="save_btn" id="news_creation_btn" value="Créer" />
        </form>
	</div>


	<div id="news_select">
		<form id="news_select_form" action="" method="get">
			<?php echo createSelect($news->get_templates_liste()						, 'id_template'		, $_GET['id_template']	, "onchange=\"$('#news_select_form').submit();\"");?>
			<?php echo createSelect($news->get_newsletters_liste($_GET['id_template'])	, 'id_newsletter'	, $id_newsletter		, "onchange=\"$('#news_select_form').submit();\"");?>
			<?php if(!empty($_GET['id_newsletter'])){ ?>
			<a href="show.php?id=<?php echo $id_newsletter; ?>" target="_blank" id="voir_btn" class="btn" title="voir la newsletter"><span>voir</span></a>
			<a href="javascript:animatedcollapse.toggle('news_save')" id="edit_btn" class="btn" title="modifier les informations de la newsletter"><span>modifier</span></a>
			<?php } ?>
        </form>
	</div>


    <div id="news_envoi">
		<form id="news_envoi_form" action="XMLrequest_send.php" method="post">
			<h2>Sélectionner les destinataires par groupe :</h2>
			<div id="groupe_list"><?php echo $news->get_groupes_selector(); ?></div>
			<hr class="reset" />
			<h2>Sélectionner les destinataires par adresse :</h2>
			<input name="id" type="hidden" value="<?php echo $id_newsletter; ?>" />
			<div id="dest_list"><?php echo $news->get_destinataire(); ?></div>
			<hr class="reset" />
			<p><label for="liste_destinataire">Liste des destinataires (séparer avec des virgules) :</label>
			<textarea name="liste_destinataire" id="liste_destinataire"></textarea></p>
			<hr class="reset" />
			<input type="submit" name="save_btn" id="save_btn" value="Envoyer" />
        </form>
		
		
	</div>
    
    <div id="actu_options">
		<form id="actu_select_form" action="" method="get">
    		<?php echo createSelect($actu->get_liste_cat(), 'categorie'	, $_GET['categorie'], "onchange=\"$('#actu_select_form').submit();\"",true);?>
			<?php echo createSelect($anneeListe, 'annee', isset($_GET['annee'])?$_GET['annee']:date('Y'), "onchange=\"$('#actu_select_form').submit();\"", false ); ?>
            <?php echo createSelect($moisListe, 'mois', isset($_GET['mois'])?$_GET['mois']:date('m'), "onchange=\"$('#actu_select_form').submit();\"", false ); ?>
			<?php echo createSelect($actu->get_select_actu($_GET['categorie'],$_GET['annee'],$_GET['mois']), 'id_actu'	, $id_actu, "onchange=\"$('#actu_select_form').submit();\"");?>
		</form>
    </div>

	<div id="options">
        
		<div id="retourdest"><?php include_once('XMLrequest_options.php') ?></div>
        
	</div>
    <div id="news_save">
		<?php $info = $news->get_newsletter_info(); ?>
		<form id="news_save_form" action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="edit" value="update_info" />
			<input name="id" type="hidden" value="<?php echo $id_newsletter; ?>" />
			<label for="nom_newsletter2">Titre de la newsletter :&nbsp;</label><input type="text" name="nom" value="<?php echo $info->nom;?>" id="nom_newsletter2" /><br />
			<label for="objet_newsletter2">Objet de la newsletter (visible lors de l'envoi du mail) :&nbsp;</label><input type="text" name="objet" value="<?php echo $info->objet;?>" id="objet_newsletter2" /><br /><br />
          <label for="date_newsletter2">Date :&nbsp;</label><input type="text" name="date_newsletter2" id="date_newsletter2" value="<?php echo $info->ladate;?>" />
			<hr class="reset" />
			<?php if(isset($id_newsletter)) { ?>
            <p><label for="picturefile">Image :&nbsp;</label><input type="file" name="picturefile" id="picturefile" /></p>
            <?php if(isset($info->image)){ ?>
			<label for="suppr_image">Supprimer l'image :&nbsp;</label><input type="checkbox" name="suppr_image" id="suppr_image" value="true" />
			<hr class="reset" />
            <label>&nbsp;</label><img src="../newsletter_images/<?php echo $info->id.'/'.$info->image;?>" />
			<input type="hidden" name="picture" id="picture" value="<?php echo $info->image;?>" />
            <?php } ?>
			<?php } ?>
			<hr class="reset" />
			<label>&nbsp;</label><input type="submit" name="save_btn" id="news_save_btn" value="Sauver" />
        </form>
	</div>
    <hr />
    <form id="refresh_form" action="XMLrequest_save.php" method="post">
    	<input name="save_value" type="hidden" id="save_value" value="" />
    	<input name="id" type="hidden" value="<?php echo $id_newsletter; ?>" />
		<div id="return_refresh">état : ok</div>
	</form>
	</div>
</div>
 

<div id="content" class="menu">

<?php include_once('structure/struc_news.php'); ?>
</div>

<div id="actu" class="menu admin">
<?php include_once('XMLrequest_actu.php'); ?>
</div>

<?php }?>


<div id="footer" class="menu">
	<div class="container">
	<p>© SciencesPo</p>
	</div>
</div>

</body>
</html>