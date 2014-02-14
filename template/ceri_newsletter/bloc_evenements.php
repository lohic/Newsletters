<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->
<table width="190" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="15" height="15" bgcolor="#FFFFFF"></td>
    <td width="160" height="15" bgcolor="#FFFFFF"></td>
    <td width="15" height="15" bgcolor="#FFFFFF"></td>
  </tr>
  <tr>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="160" valign="top" bgcolor="#FFFFFF">

    <?php if(isset($image)){?><img src="<?php echo $image?>" width="160" alt="photo" style="border:0;" /><?php } ?>
    <h2 style="background:#FF9900;color:#FFFFFF;font-size:10px;font-weight:bold;margin:0;padding:2px;text-transform:uppercase;"><a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a><?php echo $titre?></h2>
    <div style="color:#48494a;font-size:12px;margin:0"><?php echo !empty($soustitre)?$soustitre:$texte;?></div>
    
</td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td width="15" height="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="160" height="15" align="right" bgcolor="#FFFFFF">
    	<p style="font-size:10px;">
        
        
        <?php if(($origine == "evenement_db" || $origine == "evenement_new_db") && $isInscription){ ?>
        
       <a href="<?php echo $URL_front;?>inscription/inscription_multiple.php?id=<?php echo $id_event;?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank">
        <img src="<?php echo $template?>images/inscription.gif" width="65" height="13" border="0" style="margin-bottom:-3px;float:left;" /></a>
        
        <a href="<?php echo $itemURL;?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank">+ d'infos</a>
        
        
        <?php }else if(isset($URL) || $linkToActu){ ?>
 
        <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank"><?php echo !empty($moreTXT)?$moreTXT:'<img src="'.$template.'images/link.gif" width="13" height="13" border="0" />';?></a>
        
        <?php } ?>
        
        <?php echo $info?>
        </p>

    </td>
    <td width="15" height="15" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->