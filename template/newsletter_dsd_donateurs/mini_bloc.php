<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->
<div style="width:155px" class="bloc">
    <a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
    <strong><?php if($origine == "evenement_db" || $origine == "evenement_new_db"){ echo $date; }?></strong>
    <?php if(isset($image)){?><img src="<?php echo $image?>" width="155" alt="photo"/><?php } ?>
    <h2 style="font-family:Arial, Helvetica, sans-serif;font-size:18px;font-weight:normal;"><?php echo $titre?></h2>
   
	<?php if($origine != "evenement_db" && $origine != "evenement_new_db"){ ?>
	<p style="text-align:justify;font-size:10px;margin:0px;" class="texte"><?php echo !empty($soustitre)?$soutitre:$texte;?></p>
    <?php } ?>
    
    <div style="width:155px;height:1px;clear:both;"></div>
 
    <?php if($origine == "evenement_db" || $origine == "evenement_new_db"){ ?>
    
    <p style="margin:0px;" class="texte">
		<?php if($isInscription == '1'){?>
        	<a href="http://www.sciencespo.fr/evenements/inscription/inscription_multiple.php?id=<?php echo $id_event;?>&fromnews=<?php echo $news_id; ?>" target="_blank">
            <img src="<?php echo $template?>images/inscription.gif" />
            </a>
		<?php } ?> 
      	<a style="float:right;font-size:10px;" href="<?php echo $URL; ?>"><?php echo !empty($item['moreTXT']) ? $item['moreTXT'] : '+ d\'infos'; ?></a></p>
    
    <?php }else if(isset($URL) || $linkToActu){ ?>
       
    <p style="text-align:right;font-size:10px;" class="texte">
    	<span class="evenements" style="color:#666666;font-weight:bold;">&gt;&gt;</span> <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank"><?php echo !empty($item['moreTXT']) ? $item['moreTXT'] : '+ d\'infos'; ?></a></p>
    
    <?php } ?>
    
</div>
<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->