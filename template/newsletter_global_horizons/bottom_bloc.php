<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->

<div style="clear:both; margin-bottom:5px;">
          
	<a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
    <?php if($origine == "evenement_db" || $origine == "evenement_new_db"){ ?>
    	<a href="<?php echo $itemURL;?>&fromnews=<?php echo $news_id; ?>" target="_blank" >
    <?php }else if(isset($URL) || $linkToActu){ ?>
    	<a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank" > 
    <?php } ?> 
    <img src="<?php echo $template;?>images/puce.gif" style="float:left; margin:6px 0 0 0;"/>
          <p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#676767; font-weight:bold; margin:0; padding:0 0 0 14px;"><?php echo $titre?></p>
    <?php if(($origine == "evenement_db") || ($origine == "evenement_new_db") || isset($URL) || $linkToActu ) { ?>
    </a>
    <?php } ?>
</div>


<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->