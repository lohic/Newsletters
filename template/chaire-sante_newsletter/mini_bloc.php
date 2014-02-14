<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->
<div style="width:190px;margin-left:10px;" class="bloc">
    <a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
    
    
    <?php if(isset($image)){?><img style="margin-bottom:5px;" src="<?php echo $image?>" width="170" alt="photo"/><?php } ?>
   
    <h2 style="font-family:Arial, Helvetica, sans-serif;font-size:14px;font-weight:bold;color:#0947a3"><?php echo $titre?></h2>
    <!--
<p style="text-align:justify;font-size:10px" class="texte"><?php //echo !empty($soustitre)?$soutitre:$texte;?></p>-->
	<div style="font-size:12px;"><?php echo !empty($soustitre)?$soutitre:$texte;?></div>
 
    <?php if($origine == "evenement_db" || $origine == "evenement_new_db"){ ?>
    
    <div style="" class="texte">
		<?php if($isInscription == '1'){?>
        	<a href="http://www.sciencespo.fr/evenements/inscription/inscription_multiple.php?id=<?php echo $id_event;?>&fromnews=<?php echo $news_id; ?>" target="_blank">
            <img src="<?php echo $template?>images/inscription.gif" />
            </a>
			<?php } ?> 
     
      <a style="float:right;font-size:10px;" href="<?php echo $URL; ?>"><?php echo !empty($item['moreTXT']) ? $item['moreTXT'] : '+ d\'infos'; ?></a></div>
    
    <?php }else if(isset($URL) || $linkToActu){ ?>
       
    <p style="" class="texte"><span class="evenements" style="color:#666666;font-weight:bold;">&gt;&gt;</span> <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank"><?php echo !empty($item['moreTXT']) ? $item['moreTXT'] : '+ d\'infos'; ?></a></p>
    
    <?php } ?>
    
</div>
<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->