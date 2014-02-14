<div class="<?php echo $class; ?>">
    <div class="infos">
        <p class="jour"></p>
        <div class="image">
        	<img src="../graphisme/folder_open.png" width="32" height="32" alt="modifier"/>
        </div>
    
    
        <div class="titre_heure">
            <p class="titre"><a href="#" title="modifier"><?php echo $nom; ?></a></p>
            <p><?php //echo $mail; ?></p>
        </div>
    </div>
    
    <div class="liens">
        <a href="#" title="modifier" id="edit-<?php echo $id; ?>" class="modif_cat"><img src="../graphisme/pencil.png" alt="modifier"/></a>
    </div>
    
    <div class="places">
    </div>
    
    <div class="poubelle">
        <a href="#" onclick="supprCat(<?php echo $id; ?>,'<?php echo $nom; ?>')" title="supprimer"><img src="../graphisme/trash.png" alt="supprimer"/></a>
    </div>
</div>

<div class="<?php echo $class; ?> edit" id="form-edit-<?php echo $id; ?>">
	<form action="" method="post" id="modif_cat_form_<?php echo $id; ?>">
        <fieldset>
        <p class="legend">Informations :</p>
        	<input type="hidden" name="modif_cat" value="ok" />
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            
            <p><label for="cat_libelle-<?php echo $id; ?>">libellé : </label>
            <input type="text" id="cat_libelle-<?php echo $id; ?>" name="libelle" value="<?php echo $nom; ?>" /></p>
            
            <p><label for="cat_idGA-<?php echo $id; ?>">code Google Analytics : </label>
            <input type="text" id="cat_idGA-<?php echo $id; ?>" name="google_analytics_id" value="<?php echo $google_analytics_id; ?>" /></p>
            
            <p><label for="cat_template-<?php echo $id; ?>">dossier du gabarit : </label>
            <?php echo createFolderSelect('../template_actu/','template','cat_template-'.$id,$template); ?></p>
        </fieldset>
        <fieldset>
        <p class="legend">Catégorie accessible aux groupes :</p>
            <p><?php echo $groupes; ?></p>
        </fieldset>
        <input type="submit" name="edit_dest" class="buttonenregistrer" id="edit_dest" value="Modifier" />
	</form>
</div>