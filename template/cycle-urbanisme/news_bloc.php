<!-- //////////////// -->
<!-- BLOC DE NEWS   -->
<!-- //////////////// -->
<div style="clear:both; margin-left:15px; margin-bottom:40px; width:535px; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;">
  <a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
  <div>
		<?php if(isset($image)){?><img src="<?php echo $image?>" width="190" alt="photo" style="float:left; margin:0 15px 15px 0;border:0;" /><?php } ?>
		<h2 style="color:#fc054b;font-size:16px; margin:0;"><?php echo $titre?></h2>
		<div><?php echo !empty($soustitre)?$soustitre:$texte?></div>
		
		<div style="width:535px;height:1px;clear:both;"></div>
		<?php if($origine == "evenement_db"){ ?>
		
			<p style="float:right;font-size:12px;font-weight:bold;margin:0;"><span style="color:#fc054b;font-weight:bold;">&gt;&gt;</span> <a href="<?php echo $itemURL;?>&fromnews=<?php echo $news_id; ?>" target="_blank">Voir en ligne</a></p>
		
		<?php }else if($origine == "evenement_new_db"){ ?>
		
			<p style="float:right;font-size:12px;margin:0;font-weight:bold;margin:0;"><span style="color:#fc054b;font-weight:bold;">&gt;&gt;</span> <a href="<?php echo $itemURL;?>&fromnews=<?php echo $news_id; ?>" target="_blank">Voir en ligne</a></p>
		
		<?php if($isInscription == '1'){?>
			<p style="float:left;font-size:12px;font-weight:bold;margin:0;">
			<a href="http://www.sciencespo.fr/evenements/inscription/inscription_multiple.php?id=<?php echo $id_event;?>&fromnews=<?php echo $news_id; ?>" target="_blank">Inscription</a>
			</p>
		<?php } ?>
		
		<?php }else if(isset($URL)||$linkToActu){ ?>
			
			<p style="float:right;font-size:12px;font-weight:bold;margin:0;"><span style="color:#fc054b;font-weight:bold;">&gt;&gt;</span> <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank"><?php echo !empty($moreTXT)?$moreTXT:'Voir en ligne';?></a></p>
		
		<?php } ?>
  
  </div>
  
  <div style=""><?php echo $info?></div>
  
</div>
<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS -->
<!-- //////////////// -->