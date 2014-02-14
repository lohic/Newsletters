<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->
<table width="190" border="0" cellspacing="0" cellpadding="0">

	<?php if(isset($titre)){ ?>
  <tr>
    <td width="190" valign="middle" bgcolor="#FFFFFF"><h2 style="color:#000000;font-size:18px;line-height:18px;font-weight:bold;margin:0;padding:2px;text-align:right;text-transform:uppercase;"><a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a><?php echo $titre?></h2></td>
    </tr>
    
    <?php }?>
  <tr>
      <td width="190" valign="top" bgcolor="#000000">
      
      <p style="font-size:10px;">
        
        
        <?php if(($origine == "evenement_db" || $origine == "evenement_new_db") && $isInscription){ ?>
        
       <a href="<?php echo $URL_front;?>inscription/inscription_multiple.php?id=<?php echo $id_event;?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank">
        <img src="<?php echo $template?>images/inscription.gif" width="65" height="13" border="0" style="margin-bottom:-3px;" /></a>
        
        <a href="<?php echo $itemURL;?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank">+ d'infos</a>
        
        
        <?php } ?><?php //else if(isset($URL) || $linkToActu){ ?>
 
        <!--<a href="<?php //echo $linkToActu?$itemURL:$URL;?>" target="_blank"><?php //echo !empty($moreTXT)?$moreTXT:'<img src="'.$template.'images/link.gif" width="13" height="13" border="0" />';?></a>-->
        
        <?php //} ?>
        
        <?php echo $info?>
        </p>
        
        </td>
  </tr>
  <tr>
    <td width="190" valign="top" bgcolor="#FFFFFF">
      
      <?php if(isset($image)){?>
      <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank">
      <img src="<?php echo $image?>" width="190" alt="photo" border="0" />
	  </a><?php } ?>
      
</td>
  </tr>
  <tr>
    <td height="3" bgcolor="#ff9900"></td>
  </tr>
  <tr>
    <td width="190" height="15"></td>
  </tr>
</table>
<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->