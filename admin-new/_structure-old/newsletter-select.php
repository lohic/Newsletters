<div id="news_select" class="form_container">
    <form id="news_select_form" action="" method="get">
        <input type="hidden" name="page" value="news_select" />
        <?php //createSelect($array, $name='', $id = NULL, $additionnal=NULL, $isnull=true) ?>
        <?php echo createSelect($news->get_templates_liste()						, 'id_template'		, $_GET['id_template']	, "onchange=\"$('#news_select_form').submit();\"",false);?>
        <?php echo createSelect($anneeListe, 'annee', isset($_GET['annee'])?$_GET['annee']:date('Y'), "onchange=\"$('#news_select_form').submit();\"", false ); ?>
        <?php echo createSelect($moisListe, 'mois', isset($_GET['mois'])?$_GET['mois']:date('m'), "onchange=\"$('#news_select_form').submit();\"", false ); ?>
        <!--<?php echo createSelect($news->get_newsletters_array($_GET['id_template'])	, 'id_newsletter'	, $id_newsletter		, "onchange=\"$('#news_select_form').submit();\"");?>-->
    </form>
</div>



<div id="news_listing">
	<?php $news->get_newsletters_liste($_GET['id_template'],$_GET['annee'],$_GET['mois']); ?>
</div>