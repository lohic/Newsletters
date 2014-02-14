<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->

<div style="clear:both; width:650px; margin-bottom:15px;">
		<a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
        <?php if(isset($image)){?><img src="<?php echo $image?>" alt="photo" width="167" style="margin:0 24px 24px 0; float:left" /><?php } ?>
        <h3 style="font-family:Arial, Helvetica, sans-serif; font-size:14px; margin:0 0 0 191px; font-weight:bold; color:#da2e00"><?php echo $titre?></h3>
        <div style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#676767; margin:0 0 0 191px;">
			<?php echo $texte?>        
            <?php if($origine == "evenement_db"){ ?>
                <p style="font-family:Arial, Helvetica, sans-serif; font-size:10px"><span style="color:#da2e00">&gt;&gt;</span>&nbsp;<a href="http://capricorne.sciences-po.fr/evenements/?eventId=<?php echo $id_event;?>&fromnews=<?php echo $news_id; ?>" target="_blank" style="color:#676767">Read more</a></p>      
            <?php }else if($origine == "evenement_new_db"){ ?>
                <p style="font-family:Arial, Helvetica, sans-serif; font-size:10px"><span style="color:#da2e00">&gt;&gt;</span>&nbsp;<a href="<?php echo $URL;?>&fromnews=<?php echo $news_id; ?>" target="_blank" style="color:#676767">Read more</a></p>
            <?php }else if(isset($URL)){ ?>
                <p style="font-family:Arial, Helvetica, sans-serif; font-size:10px"><span style="color:#da2e00">&gt;&gt;</span>&nbsp;<a href="<?php echo $URL;?>" target="_blank" style="color:#676767">Read more</a></p>
             <?php } ?>
        </div>
</div>

<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->