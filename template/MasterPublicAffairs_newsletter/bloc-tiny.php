<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->
<div style="width:165px; float:left; margin-left:15px;margin-right:12px;margin-bottom:10px;margin-top:5px;" class="bloc">
<div style="width:165px;">
    <a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
    <?php if(isset($image)){?>
	<img src="<?php echo $image?>" width="165" alt="photo" style="margin-bottom:15px;"/>
	<?php } ?>
	<a href="<?php
	
		if($origine == "evenement_db" || $origine == "evenement_new_db"){
			echo $URL;
		}else if(isset($URL) || $linkToActu){
			echo $linkToActu?$itemURL:$URL;
		}
	
	?>" target="_blank" style="color:#565656;">
    <h2 style="font-family:Arial, Helvetica, sans-serif;font-size:12px;font-weight:bold;"><?php echo $titre?></h2>
	</a>
   <?php //echo $date?>
</div>

<!--
<p style="text-align:justify;font-size:10px" class="texte"><?php echo !empty($soustitre)?$soutitre:$texte;?></p>
    
    
<div style="width:155px;height:1px;clear:both;"></div>
	
	<?php if($origine == "evenement_db" || $origine == "evenement_new_db"){ ?>
	
	<p style="" class="texte">
		<?php if($isInscription == '1'){?>
			<a href="http://www.sciencespo.fr/evenements/inscription/inscription_multiple.php?id=<?php echo $id_event;?>&fromnews=<?php echo $news_id; ?>" target="_blank">
			<img src="<?php echo $template?>images/inscription.gif" />
			</a>
			<?php } ?> 
	  <a style="float:right;font-size:10px;color:#980031;" href="<?php echo $URL; ?>"><?php echo !empty($item['moreTXT']) ? $item['moreTXT'] : '+ d\'infos'; ?></a></p>
	
	<?php }else if(isset($URL) || $linkToActu){ ?>
	   
	<p style="" class="texte"><span class="evenements" style="color:#980031;font-weight:bold;">&gt;&gt;</span> <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank"><?php echo !empty($item['moreTXT']) ? $item['moreTXT'] : '+ d\'infos'; ?></a></p>
	
	<?php } ?>
    
</div>
-->
</div>
<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->