<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
	   <td valign="top">
	   <?php if(isset($image)){?>
	   <img src="<?php echo $image?>" width="165" alt="photo" style="margin-top:15px;" />
	   <?php } ?>
	   <td width="20">&nbsp;</td>
	   <td valign="top">
		   <a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
			   <div id="text" style="font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;font-size:12px;color:#666;margin-top:15px;">
			   
			   <h2 style="font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;font-weight:bold;font-size:14px;color:#fc054b;margin:0;"><?php echo $titre?></h2>
			   
			   <div style="margin:0;"><?php echo !empty($soustitre)?'<p>'.$soustitre.'</p>':$texte;?></div>	
			   		   
			   <?php if(isset($URL) || $linkToActu){ ?>
				<p style="font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;font-size:10px;color:#fc054b; font-weight:bold;">&gt;&gt; <a href="<?php echo $linkToActu ? $itemURL : $URL;?>" style="color:#fc054b;" target="_blank"><?php echo !empty($moreTXT)?$moreTXT:'Voir en ligne';?></a></p>
		
		<?php } ?>
			</div>
	   </td>
   </tr>
</table>