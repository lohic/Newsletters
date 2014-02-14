<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->

<div style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#676767; font-weight:bold">
	<a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
    <?php if($origine == "evenement_db"){ ?>
    	<a href="http://capricorne.sciences-po.fr/evenements/?eventId=<?php echo $id_event;?>&fromnews=<?php echo $news_id; ?>" target="_blank">
    <?php }else if($origine == "evenement_new_db"){ ?>
    	<a href="<?php echo $URL;?>&fromnews=<?php echo $news_id; ?>" target="_blank">
    <?php }else if(isset($URL)){ ?>
    	<a href="<?php echo $URL;?>" target="_blank"> 
    <?php } ?> 
     
	<?php if(isset($image)){?><img src="<?php echo $image?>" width="167" /><?php } ?>
    <p><?php echo $titre?></p>
    </a>
</div>


<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->