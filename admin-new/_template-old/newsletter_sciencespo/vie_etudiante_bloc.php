<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->
<div style="clear:both; margin-bottom:20px;width:540px;" class="bloc">
    <a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
    <div>
    <?php if(isset($image)){?><img src="<?php echo $image?>" width="220" alt="photo" style="float:left; margin:0 15px 20px 0;border:0;" /><?php } ?>

    <h2 style=""><?php echo $titre?></h2>
    <p style="text-align:justify;" class="texte"><?php echo $texte?></p>
    
    <div style="width:540px;height:1px;clear:both;"></div>
    <?php if($origine == "evenement_db"){ ?>
    
    <p style="float:right;font-size:10px;" class="texte"><span class="vie" style="color:#cc0099;font-weight:bold;">&gt;&gt;</span> <a href="http://capricorne.sciences-po.fr/evenements/?eventId=<?php echo $id_event;?>&fromnews=<?php echo $news_id; ?>" target="_blank">+ d'infos</a></p>
    
    <?php }else if($origine == "evenement_new_db"){ ?>
    
    <p style="float:right;font-size:10px;" class="texte"><span class="une" style="color:#cc0099;font-weight:bold;">&gt;&gt;</span> <a href="<?php echo $URL;?>&fromnews=<?php echo $news_id; ?>" target="_blank">+ d'infos</a></p>
    <?php if($isInscription == '1'){?>
    <p style="float:left;" class="texte">
    <a href="http://www.sciencespo.fr/evenements/inscription/inscription_multiple.php?id=<?php echo $id_event;?>&fromnews=<?php echo $news_id; ?>" target="_blank">
    <img src="<?php echo $template?>images/inscription.gif" />
    </a>
    </p>
    <?php } ?>
    
    <?php }else if(isset($URL)){ ?>
    
    <p style="float:right;font-size:10px;;" class="texte"><span class="vie" style="color:#cc0099;font-weight:bold;">&gt;&gt;</span> <a href="<?php echo $URL;?>" target="_blank"><?php echo !empty($moreTXT)?$moreTXT:'En savoir plus';?></a></p>
    
    <?php } ?>
    
    </div>
    
    <div style=""><?php echo $info?></div>
    
    
    <img src="<?php echo $template;?>images/ligne.gif" width="540" height="6"/>
</div>
<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->