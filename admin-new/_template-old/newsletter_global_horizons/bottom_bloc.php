<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->

<div style="clear:both; margin-bottom:5px;">
          



	<a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
    <?php if($origine == "evenement_db"){ ?>
    	<a href="http://capricorne.sciences-po.fr/evenements/?eventId=<?php echo $id_event;?>&fromnews=<?php echo $news_id; ?>" target="_blank">
    <?php }else if($origine == "evenement_new_db"){ ?>
    	<a href="<?php echo $URL;?>&fromnews=<?php echo $news_id; ?>" target="_blank">
    <?php }else if(isset($URL)){ ?>
    	<a href="<?php echo $URL;?>" target="_blank"> 
    <?php } ?> 
    <img src="<?php echo $template;?>images/puce.gif" style="float:left; margin:6px 0 0 0;"/>
          <p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#676767; font-weight:bold; margin:0; padding:0 0 0 14px;"><?php echo $titre?></p>
    </a>
</div>


<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->