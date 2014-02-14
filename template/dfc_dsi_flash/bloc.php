<table border="0" cellpadding="0" cellspacing="0" width="825" bgcolor="#FFFFFF">
	<tr>
		<td bgcolor="#787878" width="15">&nbsp;</td>
		<!--Problème avec la longueur du bandeau de titre -->
		<td bgcolor="#787878">
			<h1 style="font-family:Arial, Helvetica, sans-serif;font-size:24px;font-weight:normal;color:#FFFFFF;margin:5px 30px;padding:0;">
			<?php echo $titre?>
			</h1>
		</td>
		<td>&nbsp;</td>
		<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
	</tr>
	<tr height="35">
		<td bgcolor="#CCCCCC" width="15" valign="top">
			<img src="<?php echo $template;?>images/titre.png" width="15" height="13" />
		</td>
		<td background="<?php echo $template;?>images/ombre.jpg" style="background-repeat:repeat-x;"></td>
		<td >&nbsp;</td>
		<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
	</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="825" bgcolor="#FFFFFF">
	<tr>
		<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
		<td bgcolor="#FFFFFF" width="30">&nbsp;</td>
		<td valign="top">
			<!--Besoin d'un margin-top du premier p ? -->
			<div id="texte" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#000;">
				<?php if(isset($image)){?>
				 <img src="<?php echo $image?>" width="285" alt="photo" style="float:left;margin:0 10px 20px 0;" />
				 <?php } ?>
				
				<?php echo !empty($soustitre)?'<p>'.$soustitre.'</p>':$texte;?>
				
				<?php if($origine == "evenement_db" || $origine == "evenement_new_db"){ ?>
    
				<p style="float:right;font-size:10px;" class="texte"><span class="une" style="color:#bd2e10;font-weight:bold;">&gt;&gt;</span> <a href="<?php echo $itemURL;?>&fromnews=<?php echo $news_id; ?>" target="_blank">+ d'infos</a></p>
				
				<?php if($isInscription == '1'){?>
				<p style="float:left;" class="texte">
				<a href="http://www.sciencespo.fr/evenements/inscription/inscription_multiple.php?id=<?php echo $id_event;?>&fromnews=<?php echo $news_id; ?>" target="_blank">
				<img src="<?php echo $template?>images/inscription.gif" />
				</a>
				</p>
				<?php } ?>
				
				<?php }else if(isset($URL) || $linkToActu){ ?>
				
				<p style="float:right;font-size:10px;" class="texte"><span class="une" style="color:#bd2e10;font-weight:bold;">&gt;&gt;</span> <a href="<?php echo $linkToActu ? $itemURL : $URL;?>" target="_blank"><?php echo !empty($moreTXT)?$moreTXT:'En savoir plus';?></a></p>
				
				<?php } ?>
			</div>
		</td>
		<td bgcolor="#FFFFFF" width="20">&nbsp;</td>
		<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
	</tr>
</table>