<div id="actu_options" class="form_container">
    <form id="actu_select_form" action="" method="get">
    	<input type="hidden" name="page" value="actu_select" />
        <?php echo createSelect($actu->get_liste_cat(), 'categorie'	, $_GET['categorie'], "onchange=\"$('#actu_select_form').submit();\"",false);?>
        <?php echo createSelect($anneeListe, 'annee', isset($_GET['annee'])?$_GET['annee']:date('Y'), "onchange=\"$('#actu_select_form').submit();\"", false ); ?>
        <?php echo createSelect($moisListe, 'mois', isset($_GET['mois'])?$_GET['mois']:date('m'), "onchange=\"$('#actu_select_form').submit();\"", false ); ?>
        <!--<?php echo createSelect($actu->get_select_actu($_GET['categorie'],$_GET['annee'],$_GET['mois']), 'id_actu'	, $id_actu, "onchange=\"$('#actu_select_form').submit();\"");?>-->
    </form>
</div>

<div id="actu_listing">
	<?php $actu->get_actu_liste($_GET['categorie'],$_GET['annee'],$_GET['mois']); ?>
</div>