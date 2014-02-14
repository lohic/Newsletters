<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
	   <td>
	   <a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
	   <div id="text" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#666;margin:15px 0;">
	   	<h2 style="font-family:Arial, Helvetica, sans-serif;font-weight:bold;font-size:14px;color:#009966;margin:0;"><?php echo $titre?></h2>
	   <div style="margin:0;"><?php echo !empty($soustitre)?'<p>'.$soustitre.'</p>':$texte;?></div>	
	   <?php if(isset($URL) || $linkToActu){ ?>
				<p style="font-size:10px;color:#009966;">&gt;&gt; <a href="<?php echo $linkToActu ? $itemURL : $URL;?>" style="color:#009966;" target="_blank"><?php echo !empty($moreTXT)?$moreTXT:'Read more';?></a></p>
		
		<?php } ?>
	   
	   </div>
	   </td>
   </tr>
</table>