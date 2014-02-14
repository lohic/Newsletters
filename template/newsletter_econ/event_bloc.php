<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->
<div style="width:155px;clear:both;" class="bloc">
    <a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
    <?php if(isset($image)){?><img src="<?php echo $image?>" width="155" alt="photo"/><?php } ?>
    <div style="background:#CCC;padding:2px;text-align:right;" class="date"><strong><?php echo $date?></strong></div>
    
    <h2 style="color:#66cc33"><?php echo $titre?></h2>
    
    <div style="width:155px;height:1px;clear:both;"></div>
    <?php if($origine == "evenement_db"){ ?>
    
    <p style="margin:0;" class="texte"><a href="<?php echo $itemURL;?>&fromnews=<?php echo $news_id; ?>" target="_blank"><img style="border:0;" src="<?php echo $template?>images/inscription.gif" /></a> <a style="float:right;font-size:10px;margin-bottom:5px;" href="<?php echo $item['URL']; ?>">+ read more</a></p>
    
    <?php }else if($origine == "evenement_new_db"){ ?>
    
    <p style="margin:0;" class="texte">
		<?php if($isInscription == '1'){?>
        	<a href="http://www.sciencespo.fr/evenements/inscription/inscription_multiple.php?id=<?php echo $id_event;?>&fromnews=<?php echo $news_id; ?>" target="_blank">
            <img src="<?php echo $template?>images/inscription.gif" />
            </a>
			<?php } ?> 
            <a style="float:right;font-size:10px;margin-bottom:5px;" href="<?php echo $itemURL; ?>">+ read more</a></p>
    
    <?php }else if(isset($URL)||$linkToActu){ ?>
    
    <p style="margin:0;font-size:10px;" class="texte" ><span class="evenements" style="color:#66cc00;font-weight:bold;">&gt;&gt;</span> <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank">read more</a></p>
    
    <?php } ?>
    
</div>
<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->