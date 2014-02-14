<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->
<table width="800" border="0" cellspacing="0" cellpadding="0" background="#FFF">
  <tr>
    <td bgcolor="#787878">&nbsp;</td>
    <td colspan="2" bgcolor="#FFFFFF"><span style="background:#787878;padding:10px; display:inline-block;color:#FFFFFF;font-size:20px;">
    <a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a><?php echo $titre?></span></td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
    <tr>
      <td width="15" valign="top" bgcolor="#CCCCCC"><img src="<?php echo $template;?>images/triangle.gif" width="15" height="12" alt="" /></td>
      <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="740" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
  <tr>

  <tr>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF">

<div style="clear:both; margin:15px;width:710px;" class="bloc">
    <div>
    <?php if(isset($image)){?><img src="<?php echo $image?>" width="200" alt="photo" style="float:left; margin:0 30px 30px 0;border:0;" /><?php } ?>
    <p style="text-align:justify;" class="texte"><?php echo !empty($soustitre)?$soustitre:$texte;?></p>
    
    <div style="width:540px;height:1px;clear:both;"></div>
  
    <?php if(($origine == "evenement_db" || $origine == "evenement_new_db") && $isInscription){ ?>
        
       <a href="<?php echo $URL_front; ?>inscription/inscription_multiple.php?id=<?php echo $id_event;?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank">
        <img src="<?php echo $template?>images/inscription.gif" width="100" height="20" border="0" style="margin-bottom:-3px;margin-right:10px;float:left;" /></a>
        
        <a href="<?php echo $itemURL;?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank">+ d'infos</a>
        
        
        <?php }else if(isset($URL) || $linkToActu){ ?>
 
        <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank"><?php echo !empty($moreTXT)?$moreTXT:'<span style="color:cd075c;">>></span> En savoir plus';?></a>
        
        <?php } ?>
    
    </div>
    
    <div style=""><?php echo $info?></div>
</div></td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
</table>
<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->