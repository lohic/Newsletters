<?php
	include_once("../classe/classe_dest.php");
	include_once("../vars/statics_vars.php");
	include_once('../vars/constantes_vars.php');
	$dest	= new dest();
	
	$dest->set_core($core);

?>

<div class="form_container">
	<?php $info = $news->get_newsletter_info(); ?>
	<h1><a href="../show/?id=<?php echo $info->id; ?>" target="_blank"><?php echo $info->nom;?></a></h1>
    <p>du <?php 
	
	setlocale(LC_ALL, 'fr_FR');
	$timestamp_tab = explode('-',$info->ladate);
	$timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
	
	echo strftime('%A %e %B %Y',$timestamp);
	
	?> </p>
    
    <div class="options">
        <a href="./?page=news_modif&id_newsletter=<?php echo $info->id; ?>" title="modifier la newsletter">
        	<img src="../graphisme/pencil.png" alt="modifier"/>
        </a>
        &nbsp;
        <a href="../show/?id=<?php echo $info->id; ?>" target="_blank" title="voir la newsletter" >
        	<img src="../graphisme/eye.png" alt="voir"/>
         </a>
    </div>
    
    <div class="reset"></div>
    <div id="return_refresh"></div>
    <div id="news_envoi">
    <img id="loading" src="loading.gif" style="display:none;">
        <form id="news_envoi_form" action="XMLrequest_send.php" method="post" enctype="multipart/form-data">
            <fieldset>
        		<p class="legend">Sélectionner les destinataires par groupe :</p>
            	<div id="groupe_list"><?php echo $dest->get_groupes_selector($core->groups_id); ?></div>
            </fieldset>
            
                        
            <fieldset>
        		<p class="legend">Sélectionner les destinataires par adresse :</p>
            	<div id="dest_list"><?php echo $dest->get_destinataire($core->groups_id); ?></div>
            </fieldset>
            
            <fieldset>
        		<p class="legend">Liste des destinataires :</p>
            	<p><label for="liste_destinataire">(séparer avec des virgules) :</label>
            	<textarea name="liste_destinataire" id="liste_destinataire"></textarea></p>
            </fieldset>
            
            <fieldset>
        		<p class="legend">Liste des destinataires sous forme de fichier (séparateur, retour ligne ou ,) :</p>
            	<p><label for="fichier_destinataire">fichier :</label>
                <input name="fichier_destinataire" id="fichier_destinataire" type="file" /></p>
            </fieldset>
            
           	<input name="id" type="hidden" value="<?php echo $id_newsletter; ?>" />
            <input type="submit" name="save_btn" class="buttonenregistrer"  id="save_btn" value="Envoyer" />
            
        </form>		
    </div>
</div>


<script type="text/javascript">	
	$(function (){
		$('#news_envoi_form').iframePostForm({
			json : false,
			post : function (){
				$('#return_refresh').text("état : en cours d'envoi...");
			},
			complete : function (response){
				
				$('#return_refresh').html(response);
			}
		});
	});
</script>	