<div class="<?php echo $class; ?>">
    <div class="infos">
        <p class="jour"></p>
        <div class="image">
        	<img src="../graphisme/folder_open.png" width="32" height="32" alt="modifier"/>
        </div>
    
    
        <div class="titre_heure">
            <p class="titre"><a href="#" title="modifier"><?php echo $titre; ?></a></p>
            <p><!--<?php echo $titre; ?>--></p>
        </div>
    </div>
    
    <div class="liens">
        <a href="#" title="modifier" id="edit-<?php echo $id; ?>" class="modif_footer"><img src="../graphisme/pencil.png" alt="modifier"/></a>
    </div>
    
    <div class="places">
    </div>
    
    <div class="poubelle">
        <a href="#" onclick="supprFooter(<?php echo $id; ?>,'<?php echo $titre; ?>')" title="supprimer"><img src="../graphisme/trash.png" alt="supprimer"/></a>
    </div>
</div>
<div class="<?php echo $class; ?> edit" id="form-edit-<?php echo $id; ?>">
	<form action="" method="post" id="modif_footer_form_<?php echo $id; ?>">
        <fieldset>
        <p class="legend">Informations :</p>
        	<input type="hidden" name="modif_footer" value="ok" />
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            
            <p><label for="footer_titre-<?php echo $id; ?>">libellé : </label>
            <input type="text" id="footer_titre-<?php echo $id; ?>" name="titre" value="<?php echo $titre; ?>" class="inputField" /></p>
           
            <p><label for="footer_footer-<?php echo $id; ?>">texte du footer : </label>
            <textarea type="text" id="footer_footer_id-<?php echo $id; ?>" name="footer" class="tinymce textareaFieldWide" /><?php echo $footer; ?></textarea></p>
            
        </fieldset>
        <!--
        <fieldset>
        <p class="legend">Footer accessible aux groupes :</p>
            <p><?php echo $groupes; ?></p>
        </fieldset>-->
        <input type="submit" name="edit_dest" class="buttonenregistrer" id="edit_dest" value="Modifier" />
	</form>
</div>