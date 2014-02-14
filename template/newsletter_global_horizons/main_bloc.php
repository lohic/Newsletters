<table width="800" border="0" cellspacing="0" cellpadding="0" bgcolor="#CCCCCC">
<tr>
    <td width="15" height="10" bgcolor="#CCCCCC"><a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a></td>
    <td width="15" height="10" bgcolor="#FFFFFF"></td>
    <td width="740" height="10" colspan="2" align="left" bgcolor="#FFFFFF"><?php if(isset($image)){?><img src="<?php echo $image?>" alt="photo" width="740" /><?php } ?></td>
    <td width="15" height="10" bgcolor="#FFFFFF"></td>
    <td width="15" height="10" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
  <tr>
    <td width="15" height="20" bgcolor="#CCCCCC">&nbsp;</td>
    <td width="15" height="20" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="740" height="20" colspan="2" align="left" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" height="20" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" height="20" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
  
  <tr>
    <td width="15" height="25" background="<?php echo $template;?>images/titre-rectangle.gif" bgcolor="#CCCCCC">&nbsp;</td>
    <td width="15" bgcolor="#da2e00">&nbsp;</td>
    <td width="26" align="left" bgcolor="#da2e00">&nbsp;</td>
    <td width="714" align="left" bgcolor="#FFFFFF"><h2 style="font-family:Arial, Helvetica, sans-serif; text-transform:uppercase; font-size:24px; margin:0 0 0 15px; font-weight:normal; color:#da2e00"><?php echo $titre?></h2></td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
  <tr>
    <td width="15" height="7" background="<?php echo $template;?>images/titre-triangle.gif" bgcolor="#CCCCCC"></td>
    <td width="15" height="7" bgcolor="#FFFFFF"></td>
    <td width="740" height="7" colspan="2" align="left" bgcolor="#FFFFFF"></td>
    <td width="15" height="7" bgcolor="#FFFFFF"></td>
    <td width="15" height="7"bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td width="15" height="10" bgcolor="#CCCCCC"></td>
    <td width="15" height="10" bgcolor="#FFFFFF"></td>
    <td width="740" height="10" colspan="2" align="left" bgcolor="#FFFFFF"></td>
    <td width="15" height="10" bgcolor="#FFFFFF"></td>
    <td width="15" height="10" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="740" colspan="2" align="left" valign="top" bgcolor="#FFFFFF">
    <div style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#676767">
	<?php echo !empty($soustitre)?$soustitre:$texte;	?>
            </div>     
            <?php if($origine == "evenement_db" || $origine == "evenement_new_db"){ ?>
                <p style="font-family:Arial, Helvetica, sans-serif; font-size:10px"><span style="color:#da2e00">&gt;&gt;</span>&nbsp;<a href="<?php echo $itemURL;?>&fromnews=<?php echo $news_id; ?>" target="_blank" style="color:#da2e00">Read more</a></p>
            <?php }else if(isset($URL) || $linkToActu){ ?>
                <p style="font-family:Arial, Helvetica, sans-serif; font-size:10px"><span style="color:#da2e00">&gt;&gt;</span>&nbsp;<a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank" style="color:#da2e00">Read more</a></p>
             <?php } ?></td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
</table>