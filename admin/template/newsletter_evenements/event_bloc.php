<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->
<tr>
<td colspan="4" bgcolor="#FFFFFF">
<a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a><div style="margin:0 40px;"><?php if(isset($image)){?><img src="<?php echo $image?>" width="240" alt="photo" style="float:left; margin:0 15px 20px 0" /><?php } ?>
<p style="margin:0 0 0 255px;" class="date"><strong><?php echo $date?><?php if($lieu!=""){?> - <?php echo $lieu?><?php } if($horaire!=""){?> - <?php echo $horaire?><?php } ?></strong></p>
<h2 style="margin:0 0 0 255px;"><span style="color:#F00"><?php echo $titre?></span></h2>
<h3 style="margin:0 0 0 255px;"><?php echo $soustitre?></h3>
<p style="margin:0 0 0 255px;" class="texte"><?php echo $texte?></p>
<?php if($origine == "evenement_db"){ ?>
<p style="margin:0 0 0 255px" class="texte">&gt; <a href="http://capricorne.sciences-po.fr/evenements/?eventId=<?php echo $id_event;?>&fromnews=<?php echo $news_id; ?>" target="_blank">voir la fiche &eacute;v&eacute;nement</a></p>
<?php }else if($origine == "evenement_new_db"){ ?>
<p style="margin:0 0 0 255px" class="texte">&gt; <a href="<?php echo $URL;?>&fromnews=<?php echo $news_id; ?>" target="_blank">voir la fiche &eacute;v&eacute;nement</a></p>
<?php }else if(isset($URL)){ ?>
<p style="margin:0 0 0 255px" class="texte">&gt; <a href="<?php echo $URL;?>" target="_blank"><?php echo !empty($moreTXT)?$moreTXT:'En savoir plus';?></a></p>
<?php } ?>
</div>

</td>
</tr>
<tr>
<td colspan="4" align="right" bgcolor="#FFFFFF">
<div style="margin:0 40px;"><?php echo $info?></div>	
<img src="<?php echo $template;?>images/ligne.gif" width="800" height="14" />
</td>
</tr>
<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->