<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->
<table width="770" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="15">&nbsp;</td>
		<td>
			<a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
			<div>
			<h2 style="font-family:Arial, sans-serif; font-size:24px; color:#1e3155; text-transform:uppercase; font-weight:normal; margin-top:4px; margin-bottom:10px">
			<?php echo $titre?></h2>

			<?php if(isset($image)){?><img src="<?php echo $image?>" width="240" alt="photo" style="float:right; margin:0 0 20px 15px;border:0;" /><?php } ?>
						<div style="font-size:14px; font-style:italic;">
			<?php echo !empty($soustitre)?'<p>'.$soustitre.'</p>':$texte;?></div>
			
			<div style="width:555px;height:1px;clear:both;"></div>
			
			<p style="font-size:10px;margin:0;">
			
			<?php if($origine == "evenement_db" || $origine == "evenement_new_db"){ ?>
			<a href="<?php echo $itemURL;?>&fromnews=<?php echo $news_id; ?>" target="_blank">>> Read more</a>
			
			<?php if($isInscription == '1'){?>
			<a href="http://www.sciencespo.fr/evenements/inscription/inscription_multiple.php?id=<?php echo $id_event;?>&fromnews=<?php echo $news_id; ?>" target="_blank">
			<img src="<?php echo $template?>images/inscription.gif" style="vertical-align:text-bottom" />
			</a>
			<?php } ?>
			
			<?php }else if(isset($URL) || $linkToActu){ ?>
			<a href="<?php echo $linkToActu ? $itemURL : $URL;?>" target="_blank"><?php echo !empty($moreTXT)?$moreTXT:'En savoir plus';?></a>
			<?php } ?>
			
			</p>
			
			<div style=""><?php echo $info?></div>
		
		</td>
		<td width="15">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>

<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->