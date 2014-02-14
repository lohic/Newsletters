<div id="bloc" style="width:300px;">
	<a name="item-<?php echo $id;?>" id="item-<?php echo $id;?>"></a>
    <h2 style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;outline-color:0;color:#7F7F7F;font-style:normal;font-variant:normal;font-weight:normal;font-size:21px;font-family:georgia, serif;line-height:normal;width:300px;margin-top:20px;margin-bottom:0;margin-right:0;margin-left:0;"><?php echo $titre?></h2>
    
    
    <h3 style="outline-color:0;padding-top:0;padding-bottom:10px;padding-right:0;padding-left:0;font-style:italic;font-variant:normal;font-weight:normal;font-size:16px;font-family:georgia, serif;line-height:normal;color:#7F7F7F;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#7F7F7F;margin-top:10px;margin-bottom:0;margin-right:0;margin-left:0;width:300px;"><?php echo $soustitre;?></h3>

    
    <div style="font-style:normal;font-variant:normal;font-weight:normal;font-size:12px;font-family:arial, sans-serif;line-height:20px;color:#7F7F7F;margin-top:20px;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:20px;padding-left:0;"><?php echo $texte;?><br />    
    <?php if(($origine == "evenement_db" || $origine == "evenement_new_db") && $isInscription){ ?>      
        <a href="<?php echo $itemURL;?>&amp;fromnews=<?php echo $news_id; ?>" target="_blank" style="text-decoration: none; color: rgb(201, 2, 95); font-size: 11px;">&gt; Pour en savoir plus</a>
    <?php }else if(isset($URL) || $linkToActu){ ?>
 		<a href="<?php echo $linkToActu?$itemURL:$URL;?>" target="_blank" style="text-decoration: none; color: rgb(201, 2, 95); font-size: 11px;"><?php echo !empty($moreTXT)?$moreTXT:'&gt; Pour en savoir plus';?></a>
    <?php } ?>
    </div>
    
    <p style="font-style:normal; font-variant:normal; font-weight:normal; font-size:12px; font-family:arial, sans-serif; line-height:20px; color:#7F7F7F; margin-top:20px; margin-right:0; margin-left:0; padding-top:0; padding-bottom:0; padding-right:20px; padding-left:0;">
    	<span style="font-style:normal;font-variant:normal;font-weight:normal;font-size:12px;font-family:arial, sans-serif;line-height:20px;color:#7F7F7F;margin-top:20px;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:20px;padding-left:0;">
             <?php if(isset($image)){?><img src="<?php echo $image?>" width="300" alt="photo" /><?php } ?>
        </span>
    </p>
</div>
