<div class="admin menu">
    <div class="container">
    	<form id="refresh_rss_form" action="XMLrequest_archive_rss.php" method="post" >
        	<input type="hidden" name="rss_refresh" value="ok" />
        </form>
        <form id="refresh_event_list_form" action="XMLrequest_refresh_list.php" method="post">
        	<a href="javascript:$('#refresh_rss_form').submit();" id="rss_btn" class="btn" title="Archiver les flux RSS"><span>Archiver les flux</span></a>
            <input type="hidden" id="id_newsletter" name="id_newsletter" value="<?php echo $id_newsletter; ?>" />
            <?php echo createSelect($news->get_source_news(),	'origine', 	'aucun', 	"onchange=\"$('#refresh_event_list_form').submit();\"", false ); ?>
			<?php echo createSelect($anneeListe,				'annee',	date('Y'), 	"onchange=\"$('#refresh_event_list_form').submit();\"", false ); ?>
            <?php echo createSelect($moisListe,					'mois',		date('m'), 	"onchange=\"$('#refresh_event_list_form').submit();\"", false ); ?>
        </form>
    </div>
</div>



<div id="MySplitter">
<!-- LE TEMPLATE De NEWSLETTER -->

    <div id="LeftPane" class="">
        <div id="newsletter_frame">
			<?php if(!empty($id_newsletter)){ ?>
            <?php $template = $news->get_template($id_newsletter);?>
			<?php $template_folder = $news->get_template($id_newsletter,true);?>
            <?php include_once('template/'.$template_folder.'/index.php'); ?>
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


<div class="menu admin">
    <div class="container">
		<?php if(!empty($id_newsletter)){ ?>
        <p class="resume"><?php echo "liste détectées : ".implode(",",$news->set_contenu()); ?></p>
        <?php }else{ ?>
        <p class="admin">aucune newsletter n'a été selectionnée</p> 
        <?php }?>
    </div>
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
	$(document).ready(function() {
		$("#MySplitter").splitter({
			type: "v",
			minLeft: 500, sizeLeft: 300, minRight: 170,
			resizeToWidth: true,
			cookie: "vsplitter"
		});
		$("#MySplitter").css("height", "400px").trigger("resize");
	});

	//REDIMENTIONNEMENT
	$(function() {
		$('#MySplitter').resizable({
			resize: function(event, ui)
			{
				$("#MySplitter" ).resizable( "option", "minHeight", 35 );
				$("#MySplitter" ).resizable( "option", "minWidth", 990 );
				$("#MySplitter" ).resizable( "option", "maxWidth", 990 );
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
	
	// ENVOI DE LA NEWSLETTER
	$('#news_envoi_form').ajaxForm({ 
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