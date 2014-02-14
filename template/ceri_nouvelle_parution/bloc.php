<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="15" height="30">&nbsp;</td>
    <td width="10" height="30">&nbsp;</td>
    <td width="708" height="30">&nbsp;</td>
    <td width="10" height="30">&nbsp;</td>
    <td width="15" height="30">&nbsp;</td>
  </tr>
  <tr>
    <td width="15" height="10"></td>
    <td width="10" height="10" bgcolor="#FFFFFF"></td>
    <td height="10" bgcolor="#FFFFFF"></td>
    <td width="10" height="10" bgcolor="#FFFFFF"></td>
    <td width="15" height="10"></td>
  </tr>
    <tr>
      <td width="15" valign="top">&nbsp;</td>
      <td width="10" bgcolor="#FFFFFF">&nbsp;</td>
      <td valign="middle" bgcolor="#FFFFFF"><span style="color:#48494a;font-size:14px;font-weight:bold;"><a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a><?php echo $titre?></span></td>
      <td width="10" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="15">&nbsp;</td>
    </tr>
    <tr>
      <td width="15" valign="top">&nbsp;</td>
      <td colspan="3" bgcolor="#FFFFFF"><a href="http://www.sciencespo.fr/evenements/inscription/inscription.php?id=<?php echo $id_event;?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank"><img width="770" height="3" src="<?php echo $template?>images/ligne.gif" border="0" alt="" /></a></td>
      <td width="15">&nbsp;</td>
    </tr>
  <tr>
      <td>&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="15">&nbsp;</td>
    <td width="10" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="708" valign="top" bgcolor="#FFFFFF">

    <?php if(isset($image)){?><img src="<?php echo $image?>" width="295" alt="photo" style="float:left; margin:0 10px 10px 0;border:0;" /><?php } ?>
    <div style="color:#48494a;font-size:12px;margin:0"><?php echo !empty($soustitre)?$soustitre:$texte;?></div>
    
</td>
    <td width="10" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15">&nbsp;</td>
  </tr>
  <tr>
    <td width="15" height="15">&nbsp;</td>
    <td width="10" height="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td height="15" align="right" bgcolor="#FFFFFF">
    	<p style="font-size:10px;">
        
        
        <?php if(($origine == "evenement_db" || $origine == "evenement_new_db") && $isInscription){ ?>
        
       <a href="http:="http:"//www.sciencespo.fr/evenements/inscription/inscription.php?id=<?php echo $id_event;?>&amp;fromnews=<?php echo $news_id; ?>&quot;" target="_blank">
        <img src="<?php echo $template?>images/inscription.gif" width="65" height="13" border="0" style="margin-bottom:-3px;" /></a>
        
        <span style="color:#ff9900;font-weight:bold;">&gt;&gt;</span>
        <a href="<?php echo $itemURL;?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank">+ d'infos</a>
        
        
        <?php }else if(isset($URL) || $linkToActu){ ?>
        
        <span style="color:#ff9900;font-weight:bold;">&gt;&gt;</span>
        <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank"><?php echo !empty($moreTXT)?$moreTXT:'En savoir plus';?></a>
        
        <?php } ?>
        
        <?php echo $info?>
        </p>

    </td>
    <td width="10" height="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" height="15">&nbsp;</td>
  </tr>
  
  <tr>
    <td width="15" height="3"></td>
    <td width="10" height="3" bgcolor="#FF9900"></td>
    <td height="3" bgcolor="#FF9900"></td>
    <td width="10" height="3" bgcolor="#FF9900"></td>
    <td width="15" height="3"></td>
  </tr>
  <tr>
    <td width="15" height="30">&nbsp;</td>
    <td width="10" height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td width="10" height="30">&nbsp;</td>
    <td width="15" height="30">&nbsp;</td>
  </tr>
</table>
<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->