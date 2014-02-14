<?php

if($core->isAdmin){

include_once('../classe/classe_actu.php');
include_once('../classe/classe_rss.php');
//include_once('../classe/classe_dest.php');

//$dest	= new dest();
$rss	= new rss();
//$actu	= new actu();

$google_analytics_id = isset($google_analytics_id)?$google_analytics_id:'UA-20942014-1';



if(isset($_POST["add_actu_cat"]) && !empty($_POST['libelle'])){
	$val['libelle']				= $_POST['libelle'];
	$val['template']			= $_POST['template'];
	$val['google_analytics_id'] = $_POST['google_analytics_id'];
	
	$val['groupe_cat'] 			= $_POST['groupe_cat'];

	$actu->create_cat($val);
}


if(isset($_POST['modif_cat']) && $_POST['modif_cat']=='ok'){
	$val['libelle']				= $_POST['libelle'];
	$val['template']			= $_POST['template'];
	$val['google_analytics_id'] = $_POST['google_analytics_id'];

	$val['groupe_cat'] 			= $_POST['groupe_cat'];

	$val['id'] = $_POST['id'];
	
	$actu->modif_cat($val);
}
if(isset($_POST["suppr_cat"]) && $_POST["suppr_cat"]='ok'){
	$actu->delete_cat($_POST['id_suppr_cat']);
}


if($core->isAdmin && $core->userLevel<=1){
	if(isset($_POST['modif_rss']) && $_POST['modif_rss']=='ok'){
		$val['nom'] = $_POST['nom'];
		$val['URL'] = $_POST['URL'];
		$val['id'] = $_POST['id'];
		
		$rss->modif_flux($val);
	
	}
	if(isset($_POST["add_rss"]) && !empty($_POST['rss']) && !empty($_POST['URL'])){
		$val['nom'] = $_POST['rss'];
		$val['URL'] = $_POST['URL'];
	
		$rss->add_flux($val);	
	}
	
	if(isset($_POST["suppr_rss"]) && $_POST["suppr_rss"]='ok'){
		$rss->delete_flux($_POST['id_suppr_rss']);
		
	}

}


?>

<div class="form_container">

<div class="options">
        <a href="#" id="add_cat_rss">
            <img src="../graphisme/round_plus.png" alt="ajouter une catégorie ou un flux RSS" title="ajouter une catégorie ou un flux RSS"/>
        </a>
    </div>

	<div class="reset"></div>
    <form id="suppr_cat_form" action="" method="post">
            <input type="hidden" name="suppr_cat" id="suppr_cat" value="ok" />
            <input type="hidden" name="id_suppr_cat" id="id_suppr_cat" value="" />
    </form>
    <?php if($core->isAdmin && $core->userLevel<=1){ ?>
    <form id="suppr_rss_form" action="" method="post">
            <input type="hidden" name="suppr_rss" id="suppr_rss" value="ok" />
            <input type="hidden" name="id_suppr_rss" id="id_suppr_rss" value="" />
    </form>
    <?php } ?>
    <form id="add_cat_form" action="" method="post" >
        <fieldset>
        	<p class="legend">Ajouter une catégorie :</p>
        	<input type="hidden" name="add_actu_cat" value="ok" />
   			<p><label for="cat_libelle">titre : </label><input type="text" name="libelle" id="cat_libelle" /></p>
            
            
            <p><label for="cat_idGA-<?php echo $id; ?>">code Google Analytics : </label>
            <input type="text" id="cat_idGA-<?php echo $id; ?>" name="google_analytics_id" value="<?php echo $google_analytics_id; ?>" /></p>
            
            <p><label for="cat_template-<?php echo $id; ?>">dossier du gabarit : </label>
            <?php echo createFolderSelect('../template_actu/','template','cat_template-create'); ?></p>
        </fieldset>
        
        <input type="hidden" name="groupe_cat[]" value="<?php echo $_SESSION['id_actual_group']; ?>" id="id-groupe-creator"  class="inline"  />

        <input type="submit" name="add_cat" class="buttonenregistrer" id="add_cat" value="Ajouter une catégorie" />
    </form>
	<div class="reset"></div>
    <?php if($core->isAdmin && $core->userLevel<=1){ ?>
	<form id="add_rss_form" action="" method="post" >
    	<fieldset>
        	<p class="legend">Ajouter un flux RSS :</p>
        	<input type="hidden" name="create_rss" value="ok" />
        	<p><label for="rss_nom">titre : </label><input type="text" name="rss" id="rss_nom" /></p>
        	<p><label for="rss_url">url : </label><input type="text" name="URL" id="rss_url" class="inputField" /></p>
        </fieldset>
        <input type="submit" name="add_rss" class="buttonenregistrer"  id="add_rss" value="Ajouter un flux" />
    </form>
    <div class="reset"></div>
    <?php } ?>

    <h3>Liste des catégories d'actualités</h3>
    <div id="cat-list">
    <?php echo $actu->get_cat($core->groups_id); ?>
    </div>
    
    <?php if($core->isAdmin && $core->userLevel<=1){ ?>
    <h3>Liste des flux RSS</h3>
    
    <div id="flux-list">
    <?php echo $rss->get_flux(); ?>
    </div>
    <?php } ?>
</div>



<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$('#add_cat_form').hide();
	$('#add_rss_form').hide();

	$('#add_cat_rss').click(function(){
		$('#add_cat_form').slideToggle();
		$('#add_rss_form').slideToggle();
		$('.edit').slideUp();
	});
	
	

	
	$('.edit').hide();
	
	$('.modif_cat').click(function(){
		$('#add_cat_form').slideUp();
		$('#add_rss_form').slideUp();
		$('.edit').removeClass('open');
		$('#form-'+$(this).attr('id')).addClass('open');
		$('.edit').not('.open').slideUp();
		$('.open').slideToggle();
	});
	
	
	$('.modif_rss').click(function(){
		$('#add_cat_form').slideUp();
		$('#add_rss_form').slideUp();
		$('.edit').removeClass('open');
		$('#form-'+$(this).attr('id')).addClass('open');
		$('.edit').not('.open').slideUp();
		$('.open').slideToggle();
	});
});
	
	function supprCat(id, nom){
		if(confirm('Voulez vous supprimer la catégorie \''+nom+'\' ? Cette action est irréversible.')){
			$('#id_suppr_cat').val(id);
			$('#suppr_cat_form').submit();
		}
	}
	
	function supprRSS(id, nom){
		if(confirm('Voulez vous supprimer le flux \''+nom+'\' ? Cette action est irréversible.')){
			$('#id_suppr_rss').val(id);
			$('#suppr_rss_form').submit();
		}
	}
</script>


<?php }else{ ?>
<p>Vous n'êtes pas administrateur</p>
<?php } ?>

