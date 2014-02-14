<?php


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

<div class="form_container">

<div class="options">
        <a href="#" id="add_cat">
            <img src="../graphisme/round_plus.png" alt="ajouter"/>
        </a>
    </div>

	<div class="reset"></div>
    <form id="suppr_cat_form" action="" method="post">
            <input type="hidden" name="suppr_cat" id="suppr_cat" value="ok" />
            <input type="hidden" name="id_suppr_cat" id="id_suppr_cat" value="" />
    </form>
    <form id="suppr_rss_form" action="" method="post">
            <input type="hidden" name="suppr_rss" id="suppr_rss" value="ok" />
            <input type="hidden" name="id_suppr_rss" id="id_suppr_rss" value="" />
    </form>
    
    <form id="add_cat_form" action="" method="post" >
        <fieldset>
        	<p class="legend">Ajouter une catégorie :</p>
        	<input type="hidden" name="add_actu_cat" value="ok" />
   			<label for="cat_libelle">titre : </label><input type="text" name="libelle" id="cat_libelle" />
        </fieldset>
        <input type="submit" name="add_cat" class="buttonenregistrer" id="add_cat" value="Ajouter" />
    </form>

    <div class="reset"></div>

<h3>Liste des catégories d'actualités</h3>
<form id="add_cat_form" action="admin-options.php" method="post" >
    <input type="hidden" name="add_actu_cat" value="ok" />
    <label for="cat_libelle">titre : </label><input type="text" name="libelle" id="cat_libelle" />
    <input type="submit" name="add_cat" id="add_cat" value="OK" />
</form>
<?php echo $actu->get_cat(); ?>
 
<h3>Liste des flux RSS</h3>
<form id="add_rss_form" action="admin-options.php" method="post" >
    <input type="hidden" name="create_rss" value="ok" />
    <label for="rss_nom">titre : </label><input type="text" name="rss" id="rss_nom" />
    <label for="rss_url">url : </label><input type="text" name="URL" id="rss_url" />
    <input type="submit" name="add_rss" id="add_rss" value="OK" />
</form>
<?php echo $rss->get_flux(); ?>
</div>



<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$('#add_cat_form').hide();

	$('#add_cat').click(function(){
		$('#add_cat_form').slideToggle();
		$('.edit').slideUp();
	});
	
	$('#add_rss_form').hide();

	$('#add_rss').click(function(){
		$('#add_rss_form').slideToggle();
		$('.edit').slideUp();
	});
	
	$('.edit').hide();
	
	$('.modif_cat').click(function(){
		$('#add_cat_form').slideUp();
		$('.edit').removeClass('open');
		$('#form-'+$(this).attr('id')).addClass('open');
		$('.edit').not('.open').slideUp();
		$('.open').slideToggle();
	});
	
	
	$('.modif_rss').click(function(){
		$('#add_rss_form').slideUp();
		$('.edit').removeClass('open');
		$('#form-'+$(this).attr('id')).addClass('open');
		$('.edit').not('.open').slideUp();
		$('.open').slideToggle();
	});
});
	
	function supprCat(id, nom){
		if(confirm('Voulez vous supprimer la catégorie'+nom+' ? Cette action est irréversible.')){
			$('#id_suppr_cat').val(id);
			$('#suppr_cat_form').submit();
		}
	}
</script>


<?php }else{ ?>
<p>Vous n'êtes pas administrateur</p>
<?php } ?>

