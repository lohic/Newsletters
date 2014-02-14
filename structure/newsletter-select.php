<?php

if(isset($_POST['suppr_newsletter']) && !empty($_POST['id_suppr_newsletter'])){
	$news->suppr_newsletter($_POST['id_suppr_newsletter']);
}


$id_template	= isset($_GET['id_template'])?$_GET['id_template']:NULL;
$annee			= isset($_GET['annee'])?$_GET['annee']:date('Y');
$mois			= isset($_GET['mois'])?$_GET['mois']:date('m');

?>


<div id="news_select" class="form_container">
    <form id="news_select_form" action="" method="get">
        <input type="hidden" name="page" value="news_select" />
        <?php //createSelect($array, $name='', $id = NULL, $additionnal=NULL, $isnull=true) ?>
        <?php echo createSelect($news->get_templates_liste($core->groups_id)	, 'id_template'		, $id_template, "onchange=\"$('#news_select_form').submit();\"",false);?>
        <?php echo createSelect($anneeListe, 'annee', $annee, "onchange=\"$('#news_select_form').submit();\"", false ); ?>
        <?php echo createSelect($moisListe, 'mois', $mois, "onchange=\"$('#news_select_form').submit();\"", false ); ?>
        <!--<?php echo createSelect($news->get_newsletters_array($_GET['id_template'])	, 'id_newsletter'	, $id_newsletter		, "onchange=\"$('#news_select_form').submit();\"");?>-->
    </form>
</div>



<div id="news_listing">
	<?php $news->get_newsletters_liste($id_template,$annee,$mois,$core->groups_id); ?>
</div>


<form id="suppr_newsletter_form" method="post">
    <input type="hidden" name="id_suppr_newsletter" id="id_suppr_newsletter" value="" />
    <input type="hidden" name="suppr_newsletter" id="suppr_newsletter" value="ok" />
</form>

<script language="javascript" type="text/javascript">

$(document).ready(function(){
	
	$('.archive_newsletter').click(function(){
		var $lien = $(this);
		$.post('XMLrequest_archive_newsletter.php',{id:$(this).attr('id_archive'),is_archive:$(this).attr('is_archive')}, function(data) {
		  	 $lien.html(data);
			 if( $lien.attr('is_archive') == 0){
			 	$lien.attr('is_archive',1);
			 }else{
				 $lien.attr('is_archive',0); 
			 }
		});
	});
	
});

function supprNewsletter(id,name){
	if(confirm('Voulez vous supprimer la newsletter '+name+' ? Cette action est irréversible, l\'archive sera également supprimée.')){
		$('#id_suppr_newsletter').val(id);
		$('#suppr_newsletter_form').submit();
	}
}

</script>