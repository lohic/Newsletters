<div class="form_container">
<?php if(!empty($_GET['id_newsletter'])){ ?>
<p class="intro_modif">Modification de :</p>
<?php $info = $news->get_newsletter_info(); ?>
<h3><?php echo $info->nom;?></h3>

<div class="options">
	<a href="show.php?id=<?php echo $id_newsletter ?>" target="_blank">
    	<img src="../graphisme/eye.png" alt="voir"/>
    </a>
	&nbsp;
    <a href="./?page=news_send&id_newsletter=<?php echo $id_newsletter; ?>">
    	<img src="../graphisme/mail.png" alt="envoyer"/>
    </a>
    &nbsp;
    <a href="#" id="edit_newsletter">
	<img src="../graphisme/pencil.png" alt="modifier"/>
    </a>
</div>

<div class="reset"></div>

<div id="news_save">
    <form id="news_save_form" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="edit" value="update_info" />
        <input type="hidden" name="id" value="<?php echo $id_newsletter; ?>" />
        <fieldset>
            <p>
            	<label for="nom_newsletter2" class="inline">Titre de la newsletter :&nbsp;</label>
            	<input type="text" name="nom" value="<?php echo $info->nom;?>" id="nom_newsletter2" class="inputField" />
            </p>
        </fieldset>
        <fieldset>
            <p>
            	<label for="objet_newsletter2" class="inline">Objet de la newsletter :&nbsp;</label>
            	<input type="text" name="objet" value="<?php echo $info->objet;?>" id="objet_newsletter2" class="inputField" />
            </p>
            <p>
            	<label for="date_newsletter2" class="inline">Date :&nbsp;</label>
            	<input type="text" name="date_newsletter2" id="date_newsletter2" value="<?php echo $info->ladate;?>" class="inputFieldShort"/>
            </p>
        </fieldset>
        <?php if(isset($id_newsletter)) { ?>
        <fieldset>
            <p>
            	<label for="picturefile" class="inline">Image :&nbsp;</label>
            	<input type="file" name="picturefile" id="picturefile" />
            </p>
            <?php if(isset($info->image)){ ?>
            <p>
            	<label for="suppr_image" class="inline">Supprimer l'image :&nbsp;</label>
            	<input type="checkbox" name="suppr_image" id="suppr_image" value="true" />
            </p>
            <p>
            	<label class="inline">&nbsp;</label>
            	<img src="../newsletter_images/<?php echo $info->id.'/'.$info->image;?>" />
            	<input type="hidden" name="picture" id="picture" value="<?php echo $info->image;?>" />
            </p>
            <?php } ?>
        </fieldset>
        <?php } ?>
        <input type="submit" name="save_btn" id="news_save_btn" value="Sauver" class="buttonenregistrer" />
    </form>
    <div class="reset" /></div>
</div>



<div id="return_refresh">état : ok</div>
<div class="admin menu">
    <div class="container">
    	<form id="refresh_form" action="XMLrequest_save.php" method="post">
            <input name="save_value" type="hidden" id="save_value" value="" />
            <input name="id" type="hidden" value="<?php echo $id_newsletter; ?>" />
        </form>
    
    	<form id="refresh_rss_form" action="XMLrequest_archive_rss.php" method="post" >
        	<input type="hidden" name="rss_refresh" value="ok" />
        </form>
        <form id="refresh_event_list_form" action="XMLrequest_refresh_list.php" method="post">
        	<a href="javascript:$('#refresh_rss_form').submit();" id="rss_btn" class="btn" title="Rafraichir les flux RSS"><img src="../graphisme/rss.png" alt="modifier"/></a>
            <input type="hidden" id="id_newsletter" name="id_newsletter" value="<?php echo $id_newsletter; ?>" />
            <?php echo createSelect($news->get_source_news(),	'origine', 	'aucun', 	"onchange=\"$('#refresh_event_list_form').submit();\"", false ); ?>
			<?php echo createSelect($anneeListe,				'annee',	date('Y'), 	"onchange=\"$('#refresh_event_list_form').submit();\"", false ); ?>
            <?php echo createSelect($moisListe,					'mois',		date('m'), 	"onchange=\"$('#refresh_event_list_form').submit();\"", false ); ?>
        </form>
    </div>
</div>

</div>

<div id="content" class="menu">





<div id="MySplitter">
<!-- LE TEMPLATE De NEWSLETTER -->

    <div id="LeftPane" class="">
        <div id="newsletter_frame">
			<?php if(!empty($id_newsletter)){ ?>
            <?php $template = $news->get_template($id_newsletter);?>
			<?php $template_folder = $news->get_template($id_newsletter,true);?>
            <?php include_once('../template/'.$template_folder.'/index.php'); ?>
            <?php //include_once('template/'.$template_folder.'/index.php'); ?>
            <?php } ?>
        </div>
    </div>
    
    <!-- LE MENU DES EVENEMENTS -->
    <div id="RightPane" class="admin">
        <div class="container">
            <ul id="item_list" class="sort_list">
            <?php echo $news->get_liste_evenements(date('Y'),date('m'));?>
            </ul>
        </div>
    </div>
</div>

<div class="form_container">
	<?php if(!empty($id_newsletter)){ ?>
    <p class="resume"><?php echo "liste détectées : ".implode(",",$news->set_contenu()); ?></p>
    <?php }else{ ?>
    <p class="admin">aucune newsletter n'a été selectionnée</p> 
    <?php }?>
</div>

<script type="text/javascript" language="javascript">
function saveOrderPage() {
	var serialStr1 = "";
	//var serialStr2 = "";
	//var serialStr3 = "";
	$("body ul#evenements_list>li").each(function(i, elm) { serialStr1 += (i > 0 ? "|" : "") + $(elm).attr("id"); });
	// this dynamically updates string to hidden form field
	//alert( serialStr1+"\n"+serialStr2+"\n"+serialStr3);
	
	//var valeur = document.getElementById("save_value");
	var valeur = document.getElementById("save_value");
	valeur.value = serialStr1;
		
	$('#refresh_form').submit();
};

$(document).ready(function() {

	//SPLITTER
	//$(document).ready(function() {
		$("#MySplitter").splitter({
			type: "v",
			minLeft: 500, sizeLeft: 300, minRight: 170,
			resizeToWidth: true,
			cookie: "vsplitter"
		});
		$("#MySplitter").css("height", "400px").trigger("resize");
		
		$('#news_save').hide();
		
		$('#edit_newsletter').click(function(){
			$('#news_save').slideToggle();
		});
	//});

	//REDIMENTIONNEMENT
	$(function() {
		$('#MySplitter').resizable({
			resize: function(event, ui)
			{
				$("#MySplitter" ).resizable( "option", "minHeight", 35 );
				$("#MySplitter" ).resizable( "option", "minWidth", 1000 );
				$("#MySplitter" ).resizable( "option", "maxWidth", 1000 );
			}
		});
	});
	
	// RAFRAICHISSEMENT DE LA LISTE
	$('#refresh_event_list_form').ajaxForm({ 
		target: '#item_list', 
		success: function() { 
			$('#item_list').fadeIn('slow');
		}
	});

	// SAUVEGARDE DE LA NEWSLETTER
	$('#refresh_form').ajaxForm({ 
		target: '#return_refresh',
		success: function() { 
			$('#return_refresh').fadeIn('slow');
		}
	});
	


	// ARCHIVAGE DES RSS
	$('#refresh_rss_form').ajaxForm({ 
		target: '#return_refresh',
		success: function() { 
			$('#return_refresh').fadeIn('slow');
		}
	});


	
	// ACTIVATION DU DRAG&DROP
	
	$(function() {
		$(".sort_list").sortable({
			connectWith: '.sort_list',
			helper :			function (evt, ui) { return $(ui).clone().appendTo('body').show(); },
			handle : 'span.handler',
			stop: function() {
				var order = '';
				$('.news_list').each( function () {
					order += $(this).attr('id') +':'+ $(this).sortable('toArray')+'|';
				});
				//alert(order);
				var valeur = document.getElementById("save_value");
				valeur.value = order;
				
				$('#return_refresh').text('état : Sauvegarde en cours !');
				$('#refresh_form').submit();
			}
		});
		
		$(".sort_list").disableSelection();
	});

});

</script>
<?php } ?>

</div>