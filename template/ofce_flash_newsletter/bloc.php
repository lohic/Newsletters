<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
	<tr>
		<td bgcolor="#a7222b" width="15">&nbsp;</td>
		<!--Problème avec la longueur du bandeau de titre -->
		<td width="740" bgcolor="#a7222b"><h2 style="font-family:Arial, Helvetica, sans-serif;font-size:24px;font-weight:normal;color:#FFF;margin:5px 15px;padding:0;"><a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a><?php echo $titre?></h2></td>
		<td width="30" bgcolor="#FFFFFF">&nbsp;</td>
		<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
	</tr>
	<tr height="35">
		<td bgcolor="#CCCCCC" width="15" valign="top"><img src="<?php echo $template;?>images/titre.png" alt="" width="15" height="13" /></td>
		<td bgcolor="#FFFFFF" background="<?php echo $template;?>images/ombre.jpg" style="background-repeat:repeat-x;"><font style="font-size:5px;">&nbsp;</font></td>
		<td bgcolor="#FFFFFF">&nbsp;</td>
		<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
	</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
		<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
		<td bgcolor="#FFFFFF" width="30">&nbsp;</td>
		<td width="710" valign="top"><div id="image" style="float:left;margin-right:30px;margin-bottom:15px;"><?php if(isset($image)){?><img src="<?php echo $image?>" width="300" alt="photo"/><?php } ?></div>
			<div id="texte" style="font-family:Arial, Helvetica, sans-serif;font-size:14px;color:#666;">
                <?php if($origine == "evenement_db" || $origine == "evenement_new_db"){ ?>
                <h4 style="font-family:Arial, Helvetica, sans-serif;font-size:14px;font-weight:bold;color:#a7222b;margin-top:0;">
				<?php echo $date.' à '.$horaire; if(!empty($lieu)) echo ' dans '.$lieu ?></h4>
                <?php } ?>
				<?php echo !empty($soustitre)?$soustitre:$texte;?>
				<p style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#000;text-align:right;font-weight:normal;">&gt; <!--<a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank" style="color:#a7222b;"><?php echo !empty($moreTXT)?$moreTXT:'voir la fiche événement';?></a>-->
                <?php if($origine == "evenement_db" || $origine == "evenement_new_db"){ ?>
                <a href="<?php echo $itemURL;?>&fromnews=<?php echo $news_id; ?>" target="_blank" style="color:#a7222b;">Voir la fiche événement</a></p>
            <?php }else if(isset($URL) || $linkToActu){ ?>
               <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank" style="color:#a7222b;"><?php echo !empty($moreTXT)?$moreTXT:'En savoir plus';?></a>
             <?php } ?>
				</p>
			</div></td>
		<td bgcolor="#FFFFFF" width="30">&nbsp;</td>
		<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
	</tr>
</table>

