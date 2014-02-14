<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->
<table width="800" border="0" cellspacing="0" cellpadding="0">


    <tr>
      <td width="15" valign="top"></td>
      <td colspan="3" bgcolor="#FFFFFF"><img width="770" height="3" src="<?php echo $template?>images/ligne.gif" border="0" alt="" /></td>
      <td width="15"></td>
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
      <td valign="middle" bgcolor="#FFFFFF"><span style="color:#48494a;font-size:14px;font-weight:bold;"><a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a><?php echo $titre?></span>
      <span style="float:right;">
		
		<?php if(($origine == "evenement_db" || $origine == "evenement_new_db") && $isInscription){ ?>
        
       <a href="http:="http:"//www.sciencespo.fr/evenements/inscription/inscription.php?id=<?php echo $id_event;?>&amp;fromnews=<?php echo $news_id; ?>&quot;" target="_blank">
        <img src="<?php echo $template?>images/inscription.gif" width="65" height="13" border="0" style="margin-bottom:-3px;" /></a>
        
        <a href="<?php echo $itemURL;?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank">+ d'infos</a>
        
        
        <?php }else if(isset($URL) || $linkToActu){ ?>
 		
        <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank"><?php echo !empty($moreTXT)?$moreTXT:'<img src="'.$template.'images/link.gif" width="13" height="13" border="0" />';?></a>
        
        <?php } ?>
        
       </span>
        
        
        
      </td>
      <td width="10" bgcolor="#FFFFFF">&nbsp;</td>
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
  
  <?php if(isset($info)){ ?>
  <tr>
    <td width="15" height="15">&nbsp;</td>
    <td width="10" height="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td height="15" align="right" bgcolor="#FFFFFF">
    	<p style="font-size:10px; margin:0;">       
        <?php echo $info?>
        </p>

    </td>
    <td width="10" height="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" height="15">&nbsp;</td>
  </tr>
	<?php }else{ ?>
    
    <tr>
    <td width="15" height="5"></td>
    <td width="10" height="5" bgcolor="#FFFFFF"></td>
    <td height="5" bgcolor="#FFFFFF"></td>
    <td width="10" height="5" bgcolor="#FFFFFF"></td>
    <td width="15" height="5"></td>
  </tr>

	<?php } ?>

</table>
<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->