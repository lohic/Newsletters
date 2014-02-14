<?php


if($core->isAdmin){
	
include_once('../classe/classe_footer.php');

$footer = new footer();


if(isset($_POST['create_footer'])){
	$val['titre']				= $_POST['titre'];
	$val['footer']				= $_POST['footer'];

	$footer->create_footer($val);
}

if(isset($_POST['modif_footer']) && $_POST['modif_footer']=='ok' && !empty($_POST['id'])){
	$val['titre']				= $_POST['titre'];
	$val['footer']				= $_POST['footer'];
	
	$footer->create_footer($val,$_POST['id']);
}

if(isset($_POST["suppr_footer"])){
	$footer->suppr_footer($_POST['id_suppr_footer']);
}

?>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		//elements : "texte_actu",
		theme : "advanced",
		//editor_selector : "tinymce",
		entity_encoding : "raw",
		convert_urls : false,
		plugins : "safari,pagebreak,style,advlink,iespell,inlinepopups,preview,media,contextmenu,paste,fullscreen,noneditable,nonbreaking",	
		theme_advanced_buttons1 : "bold,italic,underline,|,formatselect,|,link,unlink,cleanup,code,removeformat,|,fullscreen",
		theme_advanced_buttons2 : "",
		theme_advanced_blockformats : "p,h3",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,
		//content_css : "css/tinymce.css",
	});
</script>


<div class="form_container">
	<!--<p class="intro_modif">Modification de :</p>
	<h3>Contacts</h3>-->

    <div class="options">
        <a href="#" id="add_footer">
            <img src="../graphisme/round_plus.png" alt="ajouter"/>
        </a>
    </div>

	<div class="reset"></div>
    <form id="suppr_footer_form" action="" method="post">
            <input type="hidden" name="suppr_footer" id="suppr_footer" value="ok" />
            <input type="hidden" name="id_suppr_footer" id="id_suppr_footer" value="" />
    </form>
    
    <form id="add_footer_form" action="" method="post" >
        <fieldset>
        	<p class="legend">Ajouter un footer :</p>
            <input type="hidden" name="create_footer" value="ok" />
            <p><label for="footer_titre">libellé : </label>
            <input type="text" name="titre" id="footer_titre" class="inputField" /></p>
            
            <p><label for="footer_footer">texte du footer : </label>
            <textarea type="text" id="footer_footer" name="footer"  class="tinymce textareaFieldWide" ></textarea></p>
            
        </fieldset>
        <input type="submit" name="add_footer" class="buttonenregistrer" id="add_footer" value="Ajouter" />
    </form>
    <div class="reset"></div>
</div>

<div id="footer_listing">
	<?php $footer->get_footer_edit_liste(); ?>
</div>

<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$('#add_footer_form').hide();

	$('#add_footer').click(function(){
		$('#add_footer_form').slideToggle(function(){
			$('.mceLayout').width(600);
		});
		$('.edit').slideUp();
	});
	
	$('.edit').hide();
	
	$('.modif_footer').click(function(){
		$('#add_footer_form').slideUp();
		$('.edit').removeClass('open');
		$('#form-'+$(this).attr('id')).addClass('open');
		$('.edit').not('.open').slideUp();
		$('.open').slideToggle(function(){
			$('.mceLayout').width(600);
		});
	});
	
	
});
	
	function supprFooter(id, nom){
		if(confirm('Voulez vous supprimer le footer '+nom+' ? Cette action est irréversible.')){
			$('#id_suppr_footer').val(id);
			$('#suppr_footer_form').submit();
		}
	}
</script>

<?php }else{ ?>
<p>Vous n'êtes pas administrateur</p>
<?php } ?>