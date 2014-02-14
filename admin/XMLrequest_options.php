<?php
header('Content-type: text/html; charset=UTF-8');


include_once('classe/classe_core.php');
include_once('classe/fonctions.php');
include_once('vars/statics_vars.php');
//include_once('classe/classe_newsletter.php');
include_once('classe/classe_rss.php');
include_once('classe/classe_user.php');
include_once('classe/classe_dest.php');
include_once('classe/classe_actu.php');


$core	= new core();
$dest	= new dest();
$rss	= new rss();
$actu	= new actu();

if($core->isAdmin){

if(isset($_POST['create_groupe']) && !empty($_POST['libelle'])){
	$val['libelle'] = $_POST['libelle'];

	$dest->create_groupe($val);
}

if(isset($_POST['create_dest']) && !empty($_POST['mail']) && !empty($_POST['nom'])){
	$val['nom'] = $_POST['nom'];
	$val['mail'] = $_POST['mail'];
	$val['groupe'] = $_POST['dest_groupe'];

	$dest->create_dest($val);
}

if(isset($_POST["suppr_dest"])){
	
}

if(isset($_POST["add_rss"]) && !empty($_POST['rss']) && !empty($_POST['URL'])){
	$val['nom'] = $_POST['rss'];
	$val['URL'] = $_POST['URL'];

	$rss->add_flux($val);	
}

if(isset($_POST["suppr_rss"])){
	
}

if(isset($_POST["add_actu_cat"]) && !empty($_POST['libelle'])){
	$val['libelle'] = $_POST['libelle'];

	$actu->create_cat($val);
}

if(isset($_POST["suppr_actu_cat"])){
	
}
?>
<h1>Options générales du système</h1>

<div class="col">
<p><a href="javascript:animatedcollapse.toggle('add_dest_form')">+</a> Liste des mails d'envoi</p>
<p><form id="add_dest_form" action="XMLrequest_options.php" method="post" >
    <input type="hidden" name="create_dest" value="ok" />
    <label for="dest_nom">libellé : </label><input type="text" name="nom" id="dest_nom" />
    <label for="dest_mail">mail : </label><input type="text" name="mail" id="dest_mail" />
	<label for="dest_groupe">groupe : </label><?php echo createSelect($dest->get_liste_group(), 'dest_groupe');?>
    <input type="submit" name="add_dest" id="add_dest" value="OK" />
</form></p>
<?php echo $dest->get_dest(); ?>

<p><a href="javascript:animatedcollapse.toggle('add_groupe_form')">+</a> Liste des groupes de destinataires</p>
<p><form id="add_groupe_form" action="XMLrequest_options.php" method="post" >
    <input type="hidden" name="create_groupe" value="ok" />
    <label for="groupe_libelle">libellé : </label><input type="text" name="libelle" id="groupe_libelle" />
    <input type="submit" name="add_rss" id="add_rss" value="OK" />
</form></p>
<?php echo $dest->get_groupe(); ?>
</div>

<div class="col">
<p><a href="javascript:animatedcollapse.toggle('add_cat_form')">+</a> Liste des catégories d'actualités</p>
<p><form id="add_cat_form" action="XMLrequest_options.php" method="post" >
    <input type="hidden" name="add_actu_cat" value="ok" />
    <label for="cat_libelle">titre : </label><input type="text" name="libelle" id="cat_libelle" />
    <input type="submit" name="add_cat" id="add_cat" value="OK" />
</form></p>
<?php echo $actu->get_cat(); ?>
 
<p><a href="javascript:animatedcollapse.toggle('add_rss_form')">+</a> Liste des flux RSS</p>
<p><form id="add_rss_form" action="XMLrequest_options.php" method="post" >
    <input type="hidden" name="create_rss" value="ok" />
    <label for="rss_nom">titre : </label><input type="text" name="rss" id="rss_nom" />
    <label for="rss_url">url : </label><input type="text" name="URL" id="rss_url" />
    <input type="submit" name="add_rss" id="add_rss" value="OK" />
</form></p>
<?php echo $rss->get_flux(); ?>
</div>

<hr class="reset" />
<!--
<div class="col">
<p>login</p>
<p>password </p>
</div>


<hr class="reset" />-->
<script type="text/javascript">
    <!--
	//GESTION DE MENU
	$(document).ready( function () {
		// CREATION DE NOUVEAUX DESTINATAIRES
		$('#add_dest_form').ajaxForm({ 
			target: '#retourdest',
			success: function() { 
				$('#retourdest').fadeIn('slow');
			}
		});

		$('#add_cat_form').ajaxForm({ 
			target: '#retourdest',
			success: function() { 
				$('#retourdest').fadeIn('slow');
			}
		});

		$('#add_rss_form').ajaxForm({ 
			target: '#retourdest',
			success: function() { 
				$('#retourdest').fadeIn('slow');
			}
		});

		$('#add_groupe_form').ajaxForm({ 
			target: '#retourdest',
			success: function() { 
				$('#retourdest').fadeIn('slow');
			}
		});

	} ) ;
	
    // -->
</script>

<?php }else{ ?>
<p>Vous n'êtes pas administrateur</p>
<?php } ?>