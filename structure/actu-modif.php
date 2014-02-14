<?php
//header('Content-type: text/html; charset=UTF-8');

include_once('../classe/classe_actu.php');
include_once('../classe/fonctions.php');
include_once('../vars/statics_vars.php');

$actu = new actu();

$actu->set_core($core);

if(isset($_POST['suppr_media']) && !empty($_POST['id_suppr_media'])){
	$actu->suppr_media($_POST['id_suppr_media']);
}


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
				resize($fileName,'../actu_images/'.$_POST['id'].'/', 768, 1536);
			}
			if($fileName){
				$tab_actu['image']		= $fileName;
			}else{
				$tab_actu['image']		= NULL;
			}
		}
	
		$actu->upload_media_liste($_FILES['mediafile'],$_POST['id']);
		
		$actu->create_actu($tab_actu,$_POST['id']);
		$id_actu = $_POST['id'];
	}else{
		
		$id_actu = $actu->create_actu($tab_actu);

		!is_dir('../actu_images/'.$id_actu )?mkdir('../actu_images/'.$id_actu ):"";	
		
		//echo 'CREATION';
		if(isset($_FILES['picturefile']) && !empty($_FILES['picturefile']['name']) && $_FILES['picturefile']['name']!=''){
			$fileName = upload($_FILES['picturefile'], '../actu_images/'.$id_actu.'/');
	
	
			//echo "########################## TYPE DE DOCUMENT ".$_FILES['picture']['type'];
			
			if($_FILES['picturefile']['type'] == "image/jpeg" || $_FILES['picturefile']['type'] == "image/jpg"){
				resize($fileName,'../actu_images/'.$id_actu.'/', 768, 1536);
			}
			if($fileName){
				$tab_actu['image']		= $fileName;
			}else{
				$tab_actu['image']		= NULL;
			}
			
			$actu->create_actu($tab_actu,$id_actu);
		}
		
	}
}

if(isset($id_actu)){
	$info_actu = $actu->get_info($id_actu);
}else{
	$info_actu = $actu->get_info($_GET['id_actu']);
}

if(!isset($info_actu['date'])){
	$info_actu['date'] = date('Y-m-d');	
}

?>
<div class="form_container">
<div id="actu" class="menu admin">

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
    <!--<h1>Gestion des actualités</h1>-->
    <?php if(!empty($info_actu['id'])){ ?>
    <p class="intro_modif">Modification de :</p>
    <h3><?php echo $info_actu['titre'];?></h3>
    <?php }else{ ?>
    <p class="intro_modif">Création d'une</p>
	<h3>actualité</h3>
    <?php } ?>
    
    <div class="options">
        <a href="../actu/?id=<?php echo $info_actu['id'];?>" target="_blank">
            <img src="../graphisme/eye.png" alt="voir"/>
        </a>
    </div>

    
    <div class="reset"></div>
    
    <form action="?page=actu_modif" method="post" enctype="multipart/form-data" id="actu_form">
    	<fieldset>
        	<p class="legend">informations sur l'événement</p>
            <p>
            	<label for="date" class="inline">Date :</label>
                <input type="text" class="date inputFieldShort" name="date" id="date" maxlength="10" readonly="readonly" value="<?php echo $info_actu['date'];?>" />
            </p>
            <p>
            	<label for="titre" class="inline">Titre :&nbsp;</label>
                <input type="text"  class="inputField" name="titre" id="titre" value="<?php echo htmlspecialchars($info_actu['titre']);?>" />
            </p>
            <p>
            	<label for="categorie" class="inline">Catégorie :&nbsp;</label>
				<?php echo createSelect($actu->get_liste_cat($core->groups_id), 'categorie'	, $info_actu['categorie'], '', false);?>
            </p>
        </fieldset>
        <fieldset>
            <p>
                <label for="soustitre_actu" class="inline">Sous titre (max 255 caractères) :</label>
                <textarea type="text" name="soustitre" id="soustitre_actu" class="textareaField" ><?php echo htmlspecialchars($info_actu['soustitre']);?></textarea>
            </p>
            <p>
                <label for="texte_actu" class="inline">Texte :&nbsp;</label>
                <textarea type="text" name="texte" id="texte_actu" class="textareaField" ><?php echo $info_actu['texte'];?></textarea>
            </p>
        </fieldset>
        <fieldset>
            <p>
            	<label for="moreTXT" class="inline">En savoir plus libellé :&nbsp;</label>
                <input class="inputField"type="text" name="moreTXT" id="moreTXT" value="<?php echo htmlspecialchars($info_actu['moreTXT']);?>" />
            </p>
            <p>
            	<label for="URL" class="inline">En savoir plus URL (avec http://) :&nbsp;</label>
            	<input class="inputField" type="text" name="URL" id="URL" value="<?php echo $info_actu['URL'];?>" />
            </p>
            <p>
            	<label for="picturefile" class="inline">Image (fichier jpg) :&nbsp;</label>
            	<input type="file" name="picturefile" id="picturefile" />
            </p>
            <?php if(isset($info_actu['image'])){ ?>
            	<label class="inline">&nbsp;</label>
                <img src="../actu_images/<?php echo $info_actu['id'].'/'.$info_actu['image'];?>" />
           		<input type="hidden" name="picture" id="picture" value="<?php echo $info_actu['image'];?>" />
            <p>
            	<label for="supprfile" class="inline">Supprimer l'image :</label>
                <input type="checkbox" value="1" id="supprfile" name="supprfile" />
            </p>
            <?php } ?>
		</fieldset>
        <fieldset>
           	<p class="legend"><a href="javascript:" id="add_media"><img src="../graphisme/round_plus.png" alt="ajouter un média" height="16"/></a> ajouter des médias</p>
        	<ul id="addmedialist">
            	<li><input type="file" name="mediafile[]" /></li>
            </ul>
            <div id="media_listing">
            <?php echo $actu->return_media_liste($info_actu['id']); ?>
            </div>
        </fieldset>
        <p>
        <input type="submit" name="actu_save" id="actu_save" class="buttonenregistrer" value="<?php if(isset($info_actu['id'])){?>Modifier<?php }else{ ?>Créer<?php } ?>" /></p>
        <input type="hidden" name="id" id="id_actu" value="<?php echo $info_actu['id'];?>" />
		<input type="hidden" name="update" id="id_actu" value="actu" />
    </form>
    <?php if(isset($info_actu['id'])){?>
   <form action="" method="post" enctype="multipart/form-data" id="actu_duplicate_form">
   			<p><input class="buttonenregistrer" type="submit" name="actu_duplicate" id="actu_duplicate" value="dupliquer" /></p>
        <input type="hidden" name="id" id="id_actu_duplicate" value="<?php echo $info_actu['id'];?>" />
		<input type="hidden" name="duplicate" id="id_actu" value="actu" />
   </form>
   <?php } ?>
   
   
   <form id="suppr_media_form" method="post">
   		<input type="hidden" name="id_suppr_media" id="id_suppr_media" value="" />
        <input type="hidden" name="suppr_media" id="suppr_media" value="ok" />
   </form>

   
   <div class="reset"></div>
</div>

</div>
</div>

<script type="text/javascript" language="javascript">
$(document).ready(function(){
	
	$('#add_media').click(function(){
		$('#addmedialist').append('<li><input type="file" name="mediafile[]" /></li>');
	});
});

function supprMedia(id){
	if(confirm('Voulez vous supprimer ce média ? Cette action est irréversible.')){
		$('#id_suppr_media').val(id);
		$('#suppr_media_form').submit();
	}
}

function showMedia(id){
			
		$.post("XMLrequest_show_media.php", { id_media: id},
	   function(data) {
		 $('#media_listing').html(data);
	   });
}

</script>