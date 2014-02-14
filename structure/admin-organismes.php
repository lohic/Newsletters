<?php

if($core->isAdmin){
	
include_once('../classe/classe_organisme.php');
include_once('../vars/statics_vars.php');

global $typeTab;

$organisme = new organisme();


if(isset($_POST['suppr_organisme']) && $_POST['suppr_organisme'] == 'ok'){
	
	$organisme->suppr_organisme($_POST['id_suppr_organisme']);	
}

if(isset($_POST['create_organisme']) && $_POST['create_organisme'] == 'ok'){
	$val['nom']					= $_POST['nom'];
	//$val['type']				= $_POST['type'];
	$val['google_analytics_id']	= $_POST['google_analytics_id'];
	

	$organisme->create_organisme($val);	
}


if(isset($_POST['modif_organisme']) && $_POST['modif_organisme'] == 'ok'){
	$val['id']					= $_POST['id'];
	$val['nom']					= $_POST['nom'];
	//$val['type']				= $_POST['type'];
	$val['google_analytics_id']	= $_POST['google_analytics_id'];
	

	$organisme->create_organisme($val,$val['id']);	
}


?>

<div class="form_container">
<div id="options">
	<p class="intro_modif">Gestion des organismes</p>

	<div class="options">
        <a href="#" id="add_organisme">
            <img src="../graphisme/round_plus.png" alt="ajouter"/>
        </a>
    </div>

	<div class="reset"></div>
    <form action="" method="post" id="add_organisme_form">
        <fieldset>
        <p class="legend">Création d'un organisme :</p>
        	<input type="hidden" name="create_organisme" value="ok" />
            <input type="hidden" name="id" value="" />
    
            
            <p><label for="organisme_nom">nom : </label>
            <input type="text" id="organisme_nom" name="nom" value="" class="inputField" /></p>
            
            <p><label for="organisme_GA-<?php echo $id; ?>">ID google analytics : </label>
            <input type="text" id="organisme_GA" name="google_analytics_id" value="" class="inputField" /></p>
            
            <!--<p><label for="organisme_type">type : </label>
            <?php //echo createCombobox($typeTab, 'type', 'organisme_type'	, $type, '', false);?></p>-->
           
            
        </fieldset>
        <input type="submit" name="edit_organisme" class="buttonenregistrer" id="edit_organisme" value="Créer" />
	</form>
 
</div>


<?php if($core->isAdmin && $core->userLevel<=1){ ?>
<h3>Liste des Organismes</h3>

<div id="organisme-list">
<?php echo $organisme->get_organisme_edit_liste(); ?>
</div>

<?php } ?>



<form id="suppr_organisme_form" action="" method="post">
        <input type="hidden" name="suppr_organisme" id="suppr_organisme" value="ok" />
        <input type="hidden" name="id_suppr_organisme" id="id_suppr_organisme" value="" />
</form>



</div>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$('#add_organisme_form').hide();
	

	$('#add_organisme').click(function(){
		$('#add_organisme_form').slideToggle();
		$('.edit').slideUp();
	});
	
	$('.edit').hide();
	
	$('.modif_organisme').click(function(){		
		$('#add_organisme_form').slideUp();
		$('.edit').removeClass('open');
		$('#form-'+$(this).attr('id')).addClass('open');
		$('.edit').not('.open').slideUp();
		$('.open').slideToggle();
	});
	
	
});
	
function supprOrganisme(id, nom){
	if(confirm('Voulez vous supprimer l\'organisme '+nom+' ? Cette action est irréversible et supprimera tous les groupes et leurs liaisons associés.')){
		$('#id_suppr_organisme').val(id);
		$('#suppr_organisme_form').submit();
	}
}


</script>

<?php }else{ ?>
<p>Vous n'êtes pas administrateur</p>
<?php } ?>
