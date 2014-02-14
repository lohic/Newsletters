<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->
<div style="width:195px;clear:both; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; margin-bottom:15px;" class="bloc">
    <a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
	<h2 style="color:#fc054b; font-size:16px; margin:0;" class="date"><?php echo $origine == "evenement_db" ? $date : $titre; ?></h2>

    <?php if(isset($image)){?><img src="<?php echo $image?>" width="195" alt="photo"/><?php } ?>

	<?php if($origine == "evenement_db"){ ?>
		<p><?php echo $titre?></p>
	<?php }else{ ?>
		<div><?php echo !empty($soustitre)?$soustitre:$texte?></div>
	<?php } ?>
	
    <div style="width:195px;height:1px;clear:both;"></div>
    <?php if($origine == "evenement_db"){ ?>
    
    <d style="margin:0;" class="texte"><a href="<?php echo $itemURL;?>&fromnews=<?php echo $news_id; ?>" target="_blank">Inscription</a> <a style="float:right;font-size:10px;margin-bottom:5px;" href="<?php echo $item['URL']; ?>">En savoir plus</a></p>
    
    <?php }else if($origine == "evenement_new_db"){ ?>
    
    <p style="margin:0;" class="texte">
		<?php if($isInscription == '1'){?>
        	<a href="http://www.sciencespo.fr/evenements/inscription/inscription_multiple.php?id=<?php echo $id_event;?>&fromnews=<?php echo $news_id; ?>" target="_blank">Inscription</a>
			<?php } ?> 
            <a style="float:right;font-size:10px;margin-bottom:5px;" href="<?php echo $itemURL; ?>">En savoir plus</a></p>
    
    <?php }else if(isset($URL)||$linkToActu){ ?>
    
    <p style="margin:0;font-size:10px;" class="texte" ><span class="evenements" style="color:#fc054b;font-weight:bold;">&gt;&gt;</span> <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank">Voir en ligne</a></p>
    
    <?php } ?>
    
</div>
<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->