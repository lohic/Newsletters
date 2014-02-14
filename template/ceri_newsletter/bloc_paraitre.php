<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->
<table width="535" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="5" bgcolor="#FFFFFF"><a href="http://www.sciencespo.fr/evenements/inscription/inscription.php?id=<?php echo $id_event;?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank"><img width="565" height="3" src="<?php echo $template?>images/ligne-565.gif" border="0" alt="" /></a></td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
      <td width="10" rowspan="2" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="62" rowspan="2" valign="top" bgcolor="#FFFFFF">
      <?php if(isset($image)){?><img src="<?php echo $image?>" border="0" width="62" alt="photo" /><?php } ?>
      </td>
      <td width="15" rowspan="2" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="468" valign="top" bgcolor="#FFFFFF">
          <h2 style="color:#48494a;font-size:14px;font-weight:bold;margin:0;"><a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a><?php echo $titre?></h2>
    <div style="color:#48494a;font-size:12px;margin:0"><?php echo !empty($soustitre)?$soustitre:$texte;?></div>

</td>
      <td width="10" rowspan="2" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="top" bgcolor="#FFFFFF"><span style="font-size:10px;">
      <?php if(($origine == "evenement_db" || $origine == "evenement_new_db") && $isInscription){ ?>
      <a href="<?php echo $URL_front;?>inscription/inscription_multiple.php?id=<?php echo $id_event;?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank">
      	<img src="<?php echo $template?>images/inscription.gif" alt="" width="65" height="13" border="0" style="margin-bottom:-3px;" /></a> <a href="<?php echo $itemURL;?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank">+ d'infos</a>
      <?php }else if(isset($URL) || $linkToActu){ ?>
      <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank"><?php echo !empty($moreTXT)?$moreTXT:'<img src="'.$template.'images/link.gif" width="13" height="13" border="0" />';?></a>
      <?php } ?>
    <?php echo $info?></span></td>
  </tr>
  <tr>
    <td height="5" bgcolor="#FFFFFF"></td>
    <td height="5" bgcolor="#FFFFFF"></td>
    <td height="5" bgcolor="#FFFFFF"></td>
    <td height="5" bgcolor="#FFFFFF"></td>
    <td height="5" bgcolor="#FFFFFF"></td>
  </tr>
</table>
<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->