<?php

$dest	= new dest();



if($core->isAdmin){

if(isset($_POST['create_groupe']) && !empty($_POST['libelle'])){
	$val['libelle'] = $_POST['libelle'];

	$dest->create_groupe($val);
}

if(isset($_POST['create_dest']) && !empty($_POST['mail']) && !empty($_POST['nom'])){
	$val['nom'] = $_POST['nom'];
	$val['mail'] = $_POST['mail'];
	
	$val['groupe_dest'] = $_POST['groupe_dest'];

	$dest->create_dest($val);
}

if(isset($_POST['modif_dest']) && !empty($_POST['mail']) && !empty($_POST['nom']) && !empty($_POST['id']) ){
	$val['nom'] = $_POST['nom'];
	$val['mail'] = $_POST['mail'];
	$val['id'] = $_POST['id'];
	
	$val['groupe_dest'] = $_POST['groupe_dest'];

	$dest->modif_dest($val);
}

if(isset($_POST["suppr_dest"])){
	$dest->suppr_dest($_POST['id_suppr_dest']);
}

?>
<div class="form_container">
	<!--<p class="intro_modif">Modification de :</p>
	<h3>Contacts</h3>-->

    <div class="options">
        <a href="#" id="add_contact">
            <img src="../graphisme/round_plus.png" alt="ajouter"/>
        </a>
    </div>

	<div class="reset"></div>
    <form id="suppr_dest_form" action="" method="post">
            <input type="hidden" name="suppr_dest" id="suppr_dest" value="ok" />
            <input type="hidden" name="id_suppr_dest" id="id_suppr_dest" value="" />
    </form>
    
    <form id="add_dest_form" action="" method="post" >
        <fieldset>
        	<p class="legend">Ajouter un contact :</p>
            <input type="hidden" name="create_dest" value="ok" />
            <p><label for="dest_nom">libellé : </label><input type="text" name="nom" id="dest_nom" /></p>
            <p><label for="dest_mail">mail : </label><input type="text" name="mail" id="dest_mail" /></p>
            <!--<p><label for="dest_groupe">groupe : </label><?php echo createSelect($dest->get_liste_group(), 'dest_groupe');?></p>-->
        </fieldset>
        <fieldset>
        	<p class="legend">Contact relié aux groupes :</p>
            <p><?php echo $dest->get_groupe();?></p>
        </fieldset>
        <input type="submit" name="add_dest" class="buttonenregistrer" id="add_dest" value="Ajouter" />
    </form>
    <div class="reset"></div>
    <div id="dest-list">
	<?php echo $dest->get_dest_list(); ?>
    </div>
</div>

<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$('#add_dest_form').hide();

	$('#add_contact').click(function(){
		$('#add_dest_form').slideToggle();
		$('.edit').slideUp();
	});
	
	$('.edit').hide();
	
	$('.modif_contact').click(function(){
		$('#add_dest_form').slideUp();
		$('.edit').removeClass('open');
		$('#form-'+$(this).attr('id')).addClass('open');
		$('.edit').not('.open').slideUp();
		$('.open').slideToggle();
	});
});
	
	function supprContact(id, nom){
		if(confirm('Voulez vous supprimer le contact '+nom+' ? Cette action est irréversible.')){
			$('#id_suppr_dest').val(id);
			$('#suppr_dest_form').submit();
		}
	}
</script>

<?php }else{ ?>
<p>Vous n'êtes pas administrateur</p>
<?php } ?>