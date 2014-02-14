<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
		<td width="40">&nbsp;</td>
		<td valign="top">
			<?php if(isset($image)){?><img src="<?php echo $image?>" width="240" alt="photo"/><?php } ?>
		</td>
		<td>&nbsp;</td>
		<td width="465" valign="top">
			<h2 style="font-family:Arial, Helvetica, sans-serif;font-weight:bold;font-size:12px;color:#000;display:inline;">
				<?php echo $date?><?php if( $origine == "evenement_db" || $origine == "evenement_new_db"){ echo ' - '.$horaire ; } ?>
			</h2>
			<h1 style="font-family:Arial, Helvetica, sans-serif;font-weight:bold;font-size:14px;color:#ff0033;margin-top:0;">
				<?php echo $titre?>
			</h1>
			<div id="texte" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#000;"><p style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#000;">
			<?php echo !empty($soustitre)?$soustitre:$texte;?>
			</div>
			<p style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#000;">
			&gt; <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank" style="color:#ff0033;"><?php echo !empty($moreTXT)?$moreTXT:'voir la fiche événement';?></a>
			</p>
		</td>
		<td width="40">&nbsp;</td>
		</tr>
		<tr>
		<td width="40">&nbsp;</td>
		<td><img src="<?php echo $template;?>images/separateur-img.png" width="240" height="15" alt="" /></td>
		<td><img src="<?php echo $template;?>images/separateur-marge.png" width="15" height="15" alt="" /></td>
		<td><img src="<?php echo $template;?>images/separateur-texte.png" width="465" height="15" alt="" /></td>
		<td width="40">&nbsp;</td>
	</tr>
</table>