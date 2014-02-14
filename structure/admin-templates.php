<?php

if($core->isAdmin){
	
include_once('../classe/classe_template.php');

$gabarit = new template();


if(isset($_POST["suppr_template"])){
	$gabarit->suppr_template($_POST['id_suppr_template']);
}

if(isset($_POST['create_template'])){
	$val['nom']					= $_POST['nom'];
	$val['titre']				= $_POST['titre'];
	$val['reply_to']			= $_POST['reply_to'];
	$val['from']				= $_POST['from'];
	$val['google_analytics_id']	= $_POST['google_analytics_id'];
	$val['footer_id']			= $_POST['footer_id'];
	$val['template']			= $_POST['template'];
	
	$val['groupe_template']		= $_POST['groupe_template'];

	$gabarit->create_template($val);
}

if(isset($_POST['modif_template']) && $_POST['modif_template']=='ok' && !empty($_POST['id'])){
	$val['nom']					= $_POST['nom'];
	$val['titre']				= $_POST['titre'];
	$val['reply_to']			= $_POST['reply_to'];
	$val['from']				= $_POST['from'];
	$val['google_analytics_id']	= $_POST['google_analytics_id'];
	$val['footer_id']			= $_POST['footer_id'];
	$val['template']			= $_POST['template'];
	
	$val['groupe_template']		= $_POST['groupe_template'];
	
	$gabarit->create_template($val,$_POST['id']);
}

if(isset($_POST["suppr_template"])){
	$gabarit->suppr_template($_POST['id_suppr_template']);
}

?>
<div class="form_container">
	<!--<p class="intro_modif">Modification de :</p>
	<h3>Contacts</h3>-->

    <div class="options">
        <a href="#" id="add_template">
            <img src="../graphisme/round_plus.png" alt="ajouter"/>
        </a>
    </div>

	<div class="reset"></div>
    <form id="suppr_template_form" action="" method="post">
            <input type="hidden" name="suppr_template" id="suppr_template" value="ok" />
            <input type="hidden" name="id_suppr_template" id="id_suppr_template" value="" />
    </form>
    
    <form id="add_template_form" action="" method="post" >
        <fieldset>
        	<p class="legend">Ajouter un gabarit :</p>
            <input type="hidden" name="create_template" value="ok" />
            <!--<p><label for="template_nom">libellé : </label><input type="text" name="nom" id="template_nom" class="inputField" /></p>
            <p><label for="template_mail">mail : </label><input type="text" name="mail" id="template_mail" class="inputField" /></p>
            <p><label for="template_mail">ID google analytics : </label><input type="text" name="mail" id="template_mail" class="inputField" value="UA-20942014-1" /></p>
            <p><label for="template_mail">fichier ZIP : </label><input type="file" name="mail" id="template_mail" class="inputField" /></p>-->
            
            
            <p><label for="template_nom">libellé : </label>
            <input type="text" id="template_nom" name="nom" value="" class="inputField" /></p>
            
            <p><label for="template_titre">titre : </label>
            <input type="text" id="template_titre" name="titre" value="" class="inputField" /></p>
            
            <p><label for="template_reply_to">reply to : </label>
            <input type="text" id="template_reply_to" name="reply_to" value="no-reply@sciences-po.fr" class="inputField" /></p>
            
            <p><label for="template_from">from : </label>
            <input type="text" id="template_from" name="from" value="newsletter@sciences-po.fr" class="inputField" /></p>
        
            
            <p><label for="template_GAid">ID google analytics : </label>
            <input type="text" id="template_GAid" name="google_analytics_id" value="UA-20942014-1" class="inputField" /></p>
            
            <p><label for="template_footer_id">footer par défaut : </label>
            <?php echo createCombobox($gabarit->get_footer_liste(), 'footer_id', 'template_footer', NULL, '', false);?>
                        
            <p><label for="template_folder_id">dossier du gabarit : </label>
            <?php echo createFolderSelect('../template/','template','template_folder_id',NULL); ?>
            
        </fieldset>
        
        <fieldset>
        	<p class="legend">Gabarit visible pour les groupes :</p>
            <p><?php echo $gabarit->get_groupe();?></p>
        </fieldset>
        <input type="submit" name="add_template" class="buttonenregistrer" id="add_template" value="Ajouter" />
    </form>
    <div class="reset"></div>
</div>

<div id="template_listing">
	<?php $gabarit->get_template_edit_liste(); ?>
</div>

<form id="suppr_template_form" action="" method="post">
            <input type="hidden" name="suppr_template" id="suppr_template" value="ok" />
            <input type="hidden" name="id_suppr_template" id="id_suppr_template" value="" />
    </form>
    

<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$('#add_template_form').hide();

	$('#add_template').click(function(){
		$('#add_template_form').slideToggle();
		$('.edit').slideUp();
	});
	
	$('.edit').hide();
	
	$('.modif_template').click(function(){
		$('#add_template_form').slideUp();
		$('.edit').removeClass('open');
		$('#form-'+$(this).attr('id')).addClass('open');
		$('.edit').not('.open').slideUp();
		$('.open').slideToggle();
	});
});
	
	function supprTemplate(id, nom){
		if(confirm('Voulez vous supprimer le template '+nom+' ? Cette action est irréversible.')){
			$('#id_suppr_template').val(id);
			$('#suppr_template_form').submit();
		}
	}
</script>

<?php }else{ ?>
<p>Vous n'êtes pas administrateur</p>
<?php } ?>