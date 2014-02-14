<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->
<table width="497" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="15" height="15"></td>
        <td height="15" colspan="3"></td>
        <td width="15" height="15"></td>
    </tr>
	<?php if(isset($image)){?>
    <tr>
        <td width="15" valign="top">&nbsp;</td>
        <td colspan="3" bgcolor="#FFFFFF">
        <img width="467" alt="photo" border="0" src="<?php echo $image?>"/><!--
        <img width="40" height="20" alt="photo" border="0" src="<?php echo $template;?>images/triangle.png" style="position:relative;margin-top:-20px;margin-left:20px;"/>--></td>
        <td width="15">&nbsp;</td>
    </tr>
	<?php } ?>
    <tr>
      <td width="15" valign="top">&nbsp;</td>
      <td width="15" bgcolor="<?php echo $couleur; //#FF9900?>">&nbsp;</td>
      <td width="437" valign="middle" bgcolor="<?php echo $couleur; //#FF9900?>">
      <h2 style="color:#FFFFFF;font-size:20px;font-weight:bold;text-transform:uppercase;"><a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a><?php echo $titre?></h2></td>
      <td width="15" bgcolor="<?php echo $couleur; //#FF9900?>">&nbsp;</td>
      <td width="15">&nbsp;</td>
    </tr>
  <tr>
      <td width="15">&nbsp;</td>
      <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="437" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="15">&nbsp;</td>
  </tr>
  <tr>
    <td width="15">&nbsp;</td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="437" valign="top" bgcolor="#FFFFFF">
    <p style="font-size:18px;font-weight:bold;color:#000000;margin-bottom:10px;"><?php echo $date.' | '.$horaire; ?></p>
    <div style="color:#48494a;font-size:12px;margin:0"><?php echo !empty($soustitre)?$soustitre:$texte;?></div>
    
</td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15">&nbsp;</td>
  </tr>
  <tr>
    <td width="15" height="15">&nbsp;</td>
    <td width="15" height="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="437" height="15" align="right" bgcolor="#FFFFFF">
    	<p style="font-size:10px;">
        
        
        <?php if(($origine == "evenement_db" || $origine == "evenement_new_db") && $isInscription){ ?>
        
       <a href="<?php echo $URL_front; ?>inscription/inscription_multiple.php?id=<?php echo $id_event;?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank">
        <img src="<?php echo $template?>images/inscription.gif" width="65" height="13" border="0" style="margin-bottom:-3px;float:left;" /></a>
        
        <a href="<?php /*echo $itemURL;*/ echo $URL_front.'?id='.$id_event?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank">+ d'infos</a>
        
        
        <?php }else if(isset($URL) || $linkToActu){ ?>
 
        <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank"><?php echo !empty($moreTXT)?$moreTXT:'<img src="'.$template.'images/link.gif" width="13" height="13" border="0" />';?></a>
        
        <?php } ?>
        
        <?php echo $info?>
        </p>

    </td>
    <td width="15" height="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" height="15">&nbsp;</td>
  </tr>
  
  <!--<tr>
    <td width="15" height="15">&nbsp;</td>
    <td width="15" height="15">&nbsp;</td>
    <td width="437" height="15">&nbsp;</td>
    <td width="15" height="15">&nbsp;</td>
    <td width="15" height="15">&nbsp;</td>
  </tr>-->
</table>
<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->