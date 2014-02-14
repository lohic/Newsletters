<div class="<?php echo $class; ?>">
    <div class="infos">
        <p class="jour"></p>
        <div class="image">
        	<img src="../graphisme/folder_open.png" width="32" height="32" alt="modifier"/>
        </div>
    
    
        <div class="titre_heure">
            <p class="titre"><a href="#" title="modifier"><?php echo $nom; ?></a></p>
            <p><?php echo $titre; ?></p>
        </div>
    </div>
    
    <div class="liens">
<a href="#" title="modifier" id="edit-<?php echo $id; ?>" class="modif_template"><img src="../graphisme/pencil.png" alt="modifier"/></a><a href="?page=archive_liste&id_template=<?php echo $id; ?>"><img src="../graphisme/eye.png" alt="voir la liste des archives" title="voir la liste des archives"/></a></div>
    
    <div class="places">
    </div>
    
    <div class="poubelle">
        <a href="#" onclick="supprTemplate(<?php echo $id; ?>,'<?php echo $nom; ?>')" title="supprimer"><img src="../graphisme/trash.png" alt="supprimer"/></a>
    </div>
</div>
<div class="<?php echo $class; ?> edit" id="form-edit-<?php echo $id; ?>">
	<form action="" method="post" id="modif_template_form_<?php echo $id; ?>">
        <fieldset>
        <p class="legend">Informations :</p>
        	<input type="hidden" name="modif_template" value="ok" />
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            
            <p><label for="template_nom-<?php echo $id; ?>">libellé : </label>
            <input type="text" id="template_nom-<?php echo $id; ?>" name="nom" value="<?php echo $nom; ?>" class="inputField" /></p>
            
            <p><label for="template_titre-<?php echo $id; ?>">titre : </label>
            <input type="text" id="template_titre-<?php echo $id; ?>" name="titre" value="<?php echo $titre; ?>" class="inputField" /></p>
            
            <p><label for="template_reply_to-<?php echo $id; ?>">reply to : </label>
            <input type="text" id="template_reply_to-<?php echo $id; ?>" name="reply_to" value="<?php echo $reply_to; ?>" class="inputField" /></p>
            
            <p><label for="template_from-<?php echo $id; ?>">from : </label>
            <input type="text" id="template_from-<?php echo $id; ?>" name="from" value="<?php echo $from; ?>" class="inputField" /></p>
        
            
            <p><label for="template_GAid-<?php echo $id; ?>">ID google analytics : </label>
            <input type="text" id="template_GAid-<?php echo $id; ?>" name="google_analytics_id" value="<?php echo $google_analytics_id; ?>" class="inputField" /></p>
            
            <p><label for="template_footer_id-<?php echo $id; ?>">footer par défaut : </label>
            <?php echo createCombobox($footers, 'footer_id', 'template_footer_id-'.$id, $footer_id, '', false);?>
                        
            <p><label for="template_folder_id-<?php echo $id; ?>">dossier du gabarit : </label>
            <?php echo createFolderSelect('../template/','template','template_folder_id-'.$id,$template); ?>
            
        </fieldset>
        <fieldset>
        <p class="legend">Template accessible aux groupes :</p>
            <p><?php echo $groupes; ?></p>
        </fieldset>
        <input type="submit" name="edit_dest" class="buttonenregistrer" id="edit_dest" value="Modifier" />
	</form>
</div>