<!-- //////////////// -->
<!-- BLOC DE NEWS     -->
<!-- //////////////// -->

<div style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#676767; font-weight:bold">
	<a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>

    <?php if($origine == "evenement_db" || $origine == "evenement_new_db"){ ?>
    	<a href="<?php echo $itemURL;?>&fromnews=<?php echo $news_id; ?>" target="_blank">
    <?php }else if(isset($URL) || $linkToActu){ ?>
    	<a href="<?php echo $linkToActu? $itemURL : $URL;?>" target="_blank"> 
    <?php } ?> 
     
	<?php if(isset($image)){?><img src="<?php echo $image?>" alt="photo" width="167" /><?php } ?>
    <p><?php echo $titre?></p>
     <?php if(($origine == "evenement_db") || ($origine == "evenement_new_db") || isset($URL) || $linkToActu ) { ?>
    </a>
    <?php } ?>
</div>


<!-- //////////////// -->
<!-- FIN DE BLOC DE NEWS  -->
<!-- //////////////// -->