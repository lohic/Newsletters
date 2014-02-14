<?php

if(isset($_POST['suppr_actu']) && !empty($_POST['id_suppr_actu'])){
	$actu->suppr_actu($_POST['id_suppr_actu']);
}

$id_categorie	= isset($_GET['categorie'])?$_GET['categorie']:NULL;
$annee			= isset($_GET['annee'])?$_GET['annee']:date('Y');
$mois			= isset($_GET['mois'])?$_GET['mois']:date('m');

?>



<div id="actu_options" class="form_container">
    <form id="actu_select_form" action="" method="get">
    	<input type="hidden" name="page" value="actu_select" />
        <?php echo createSelect($actu->get_liste_cat($core->groups_id), 'categorie'	, $id_categorie, "onchange=\"$('#actu_select_form').submit();\"",false);?>
        <?php echo createSelect($anneeListe, 'annee', $annee, "onchange=\"$('#actu_select_form').submit();\"", false ); ?>
        <?php echo createSelect($moisListe, 'mois', $mois, "onchange=\"$('#actu_select_form').submit();\"", false ); ?>
    </form>
</div>

<div id="actu_listing">
	<?php $actu->get_actu_liste($id_categorie,$annee,$mois,$core->groups_id); ?>
</div>

<form id="suppr_actu_form" method="post">
    <input type="hidden" name="id_suppr_actu" id="id_suppr_actu" value="" />
    <input type="hidden" name="suppr_actu" id="suppr_actu" value="ok" />
</form>

<script language="javascript" type="text/javascript">

function supprActu(id,name){
	if(confirm('Voulez vous supprimer l\'actualité '+name+' ? Cette action est irréversible, les newsletters contenant cette actualité seront automatiquement archivées pour empecher des modifications ultérieures.')){
		$('#id_suppr_actu').val(id);
		$('#suppr_actu_form').submit();
	}
}

</script>