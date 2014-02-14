<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->

<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
        <td valign="top">
            <div id="text" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#666;margin-top:15px;">
                <a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
                <?php if(isset($image)){?><img src="<?php echo $image?>" width="165" alt="photo" style="float:left; margin:0 20px 20px 0;border:0;" /><?php } ?>
                <h2 style="font-family:Arial, Helvetica, sans-serif;font-weight:bold;font-size:14px;color:#660099;margin:0;"><?php echo $titre?></h2>
                <?php echo !empty($soustitre)?$soustitre:$texte;?>
                                
                <?php if(($origine == "evenement_db" || $origine == "evenement_new_db") && $isInscription){ ?>
                    <a href="<?php echo $URL_front; ?>inscription/inscription_multiple.php?id=<?php echo $id_event;?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank">
                        <img src="<?php echo $template?>images/inscription.gif" width="65" height="13" border="0" />
                    </a>
                    <a href="<?php echo $itemURL;?>&fromnews=<?php echo $news_id; ?>" target="_blank">+ d'infos</a>
                <?php }else if(isset($URL) || $linkToActu){ ?>
                    <p style="font-size:10px;color:#660099;">&gt;&gt; <a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank" style="color:#660099;"><?php echo !empty($moreTXT)?$moreTXT:'Read more';?></a></p>
                <?php } ?>
                </div>
                <div style="font-size:10px;color:#660099;"><?php echo $info?></div>
            </div>
        </td>
    </tr>
</table>

<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->