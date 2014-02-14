<?php
	$dest	= new dest();
?>

<div class="form_container">
	<?php $info = $news->get_newsletter_info(); ?>
	<h1><a href="show.php?id=<?php echo $info->id; ?>" target="_blank"><?php echo $info->nom;?></a></h1>
    <p>du <?php 
	
	setlocale(LC_ALL, 'fr_FR');
	$timestamp_tab = explode('-',$info->ladate);
	$timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
	
	echo utf8_encode(strftime('%A %e %B %Y',$timestamp));
	
	?> </p>
    
    <div class="options">
        <a href="./?page=news_modif&id_newsletter=<?php echo $info->id; ?>" title="modifier la newsletter">
        	<img src="../graphisme/pencil.png" alt="modifier"/>
        </a>
        &nbsp;
        <a href="show.php?id=<?php echo $info->id; ?>" target="_blank" title="voir la newsletter" >
        	<img src="../graphisme/eye.png" alt="voir"/>
         </a>
    </div>
    
    <div id="return_refresh"></div>
    <div id="news_envoi">
        <form id="news_envoi_form" action="XMLrequest_send.php" method="post">
            <fieldset>
        		<p class="legend">Sélectionner les destinataires par groupe :</p>
            	<div id="groupe_list"><?php echo $dest->get_groupes_selector(); ?></div>
            </fieldset>
            
                        
            <fieldset>
        		<p class="legend">Sélectionner les destinataires par adresse :</p>
            	<div id="dest_list"><?php echo $dest->get_destinataire(); ?></div>
            </fieldset>
            
            <fieldset>
        		<p class="legend">Liste des destinataires :</p>
            	<p><label for="liste_destinataire">(séparer avec des virgules) :</label>
            	<textarea name="liste_destinataire" id="liste_destinataire"></textarea></p>
            </fieldset>
            
           	<input name="id" type="hidden" value="<?php echo $id_newsletter; ?>" />
            <input type="submit" name="save_btn" class="buttonenregistrer"  id="save_btn" value="Envoyer" />
            
        </form>		
    </div>
</div>

<script language="javascript" type="text/javascript">
$(document).ready(function(){
	
	// ENVOI DE LA NEWSLETTER
	$('#news_envoi_form').ajaxForm({ 
		target: '#return_refresh',
		success: function() { 
			$('#return_refresh').fadeIn('slow');
		}
	});
});
</script>