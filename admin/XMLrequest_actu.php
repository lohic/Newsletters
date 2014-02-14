<?php
header('Content-type: text/html; charset=UTF-8');

include_once('classe/classe_actu.php');
include_once('classe/fonctions.php');
include_once('vars/statics_vars.php');

$actu = new actu();

if(isset($_POST['update']) && $_POST['update']=='actu'){
	$tab_actu				= array();

	$tab_actu['date']		= $_POST['date'];
	$tab_actu['titre']		= $_POST['titre'];
	$tab_actu['categorie']	= $_POST['categorie'];
	$tab_actu['soustitre']	= $_POST['soustitre'];
	$tab_actu['texte']		= $_POST['texte'];
	$tab_actu['image']		= $_POST['picture'];
	$tab_actu['URL']		= $_POST['URL'];
	$tab_actu['moreTXT']	= $_POST['moreTXT'];
		
	if(isset($_POST['supprfile'])){ $tab_actu['image']		= NULL; }
	
	if(!empty($_POST['id'])){
		//echo 'UPDATE';

		if(isset($_FILES['picturefile']) && !empty($_FILES['picturefile']['name']) && $_FILES['picturefile']['name']!=''){
			$fileName = upload($_FILES['picturefile'], '../actu_images/'.$_POST['id'].'/');
	
	
			//echo "########################## TYPE DE DOCUMENT ".$_FILES['picture']['type'];
			
			if($_FILES['picturefile']['type'] == "image/jpeg" || $_FILES['picturefile']['type'] == "image/jpg"){
				resize($fileName,'../actu_images/'.$_POST['id'].'/', 512, 1024);
			}
			if($fileName){
				$tab_actu['image']		= $fileName;
			}else{
				$tab_actu['image']		= NULL;
			}
		}

		$actu->create_actu($tab_actu,$_POST['id']);
		$id_actu = $_POST['id'];
	}else{
		//echo 'CREATION';
		
		$id_actu = $actu->create_actu($tab_actu);

		!is_dir('../actu_images/'.$id_actu )?mkdir('../actu_images/'.$id_actu ):"";
	}
}

if(isset($id_actu)){
	$info_actu = $actu->get_info($id_actu);
}else{
	$info_actu = $actu->get_info($_GET['id_actu']);
}

?>
<script type="text/javascript">
	tinyMCE.init({
		mode : "exact",
		elements : "texte_actu",
		theme : "advanced",
		editor_selector : "tinymce",
		entity_encoding : "raw",
		convert_urls : false,
		plugins : "safari,pagebreak,style,advhr,advimage,advlink,iespell,inlinepopups,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking",	//"safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,formatselect,|,forecolor",
		theme_advanced_buttons2 : "pastetext,|,link,unlink,anchor,cleanup,code,removeformat,|,fullscreen",
		theme_advanced_buttons3 : "",
		theme_advanced_blockformats : "p,h1,h2,h3",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,
		//content_css : "css/tinymce.css",
	});
</script>
<script type="text/javascript">
//$(document).ready(function(){
$(function() {
	$("#date").datepicker({
		dateFormat: 'yy-mm-dd',
		firstDay: 1,
		dayNamesMin : ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
		monthNames : ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre']
	});
});
</script>
<div class="container">
    <h1>Gestion des actualités</h1>
    <form action="" method="post" enctype="multipart/form-data" id="actu_form">
        <p><label for="date" class="">Date :&nbsp;</label><input type="text" class="date" name="date" id="date" maxlength="10" readonly="readonly" value="<?php echo $info_actu['date'];?>" /></p>
        <p><label for="titre">Titre :&nbsp;</label><input type="text" class="large" name="titre" id="titre" value="<?php echo $info_actu['titre'];?>" /></p>
        <p><label for="categorie">Catégorie :&nbsp;</label><?php echo createSelect($actu->get_liste_cat(), 'categorie'	, $info_actu['categorie'], '', false);?></p>
        <p>
          <label for="soustitre_actu">Sous titre (max 255 caractères) :&nbsp;</label><textarea type="text" name="soustitre" id="soustitre_actu"><?php echo $info_actu['soustitre'];?></textarea></p>
        <p><label for="texte_actu">Texte :&nbsp;</label><textarea type="text" name="texte" id="texte_actu" ><?php echo $info_actu['texte'];?></textarea></p>
        <p><label for="moreTXT">En savoir plus libellé :&nbsp;</label><input type="text" name="moreTXT" id="moreTXT" value="<?php echo $info_actu['moreTXT'];?>" /></p>
        <p><label for="URL">En avoir plus URL (avec http://) :&nbsp;</label><input type="text" name="URL" id="URL" value="<?php echo $info_actu['URL'];?>" /></p>
		<p>
		  <?php if(isset($info_actu['id'])) { ?>
	  	</p>
		<p><label for="supprfile">Supprimer l'image :</label><input type="checkbox" value="1" id="supprfile" name="supprfile" /></p>
		<p>
		  <label for="picturefile">Image (fichier jpg) :&nbsp;</label>
		  <input type="file" name="picturefile" id="picturefile" /></p>
		<?php if(isset($info_actu['image'])){ ?>
		<label>&nbsp;</label><img src="../actu_images/<?php echo $info_actu['id'].'/'.$info_actu['image'];?>" />
		<input type="hidden" name="picture" id="picture" value="<?php echo $info_actu['image'];?>" />
		<?php } ?>
		<?php }else{ ?>
		<input type="hidden" name="picture" id="picture" value="" />
		<?php } ?>

        <p><label>&nbsp;</label><input type="submit" name="actu_save" id="actu_save" value="<?php if(isset($info_actu['id'])){?>Modifier<?php }else{ ?>Créer<?php } ?>" /></p>
        <input type="hidden" name="id" id="id_actu" value="<?php echo $info_actu['id'];?>" />
		<input type="hidden" name="update" id="id_actu" value="actu" />
    </form>
</div>

<script>
// MODIFICATIONS/CREATION DES ACTUS
//$('#actu_form').ajaxForm({ 
//	target: '#actu',
//	success: function() { 
//		$('#actu').fadeIn('slow');
//	}
//});
</script>