<?php

$dest	= new dest();
$rss	= new rss();
$actu	= new actu();


if($core->isAdmin){



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
<div id="options" class="form_container">
<div id="retourdest">
<h1>Gestion des comptes d'accès</h1>


<div class="col">
<p>Liste des catégories d'actualités</p>
<p><form id="add_cat_form" action="admin-options.php" method="post" >
    <input type="hidden" name="add_actu_cat" value="ok" />
    <label for="cat_libelle">titre : </label><input type="text" name="libelle" id="cat_libelle" />
    <input type="submit" name="add_cat" id="add_cat" value="OK" />
</form></p>
<?php echo $actu->get_cat(); ?>
 
<p>Liste des flux RSS</p>
<p><form id="add_rss_form" action="admin-options.php" method="post" >
    <input type="hidden" name="create_rss" value="ok" />
    <label for="rss_nom">titre : </label><input type="text" name="rss" id="rss_nom" />
    <label for="rss_url">url : </label><input type="text" name="URL" id="rss_url" />
    <input type="submit" name="add_rss" id="add_rss" value="OK" />
</form></p>
<?php echo $rss->get_flux(); ?>
</div>

<hr class="reset" />


<?php }else{ ?>
<p>Vous n'êtes pas administrateur</p>
<?php } ?>
</div>
</div>