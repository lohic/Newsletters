<div class="<?php echo $class; ?>">
    <div class="infos">
        <p class="jour"></p>
        <div class="image">
        	<img src="../graphisme/rss_sq.png" width="32" height="32" alt="modifier"/>
        </div>
    
    
        <div class="titre_heure">
            <p class="titre"><a href="#" title="modifier"><?php echo $nom; ?></a></p>
            <p><?php echo $url; ?></p>
        </div>
    </div>
    
    <div class="liens">
        <a href="#" title="modifier" id="edit-<?php echo $id; ?>" class="modif_rss"><img src="../graphisme/pencil.png" alt="modifier"/></a>
    </div>
    
    <div class="places">
    </div>
    
    <div class="poubelle">
        <a href="#" onclick="supprRSS(<?php echo $id; ?>,'<?php echo $nom; ?>')" title="supprimer"><img src="../graphisme/trash.png" alt="supprimer"/></a>
    </div>
</div>

<div class="<?php echo $class; ?> edit" id="form-edit-<?php echo $id; ?>">
	<form action="" method="post" id="modif_rss_form_<?php echo $id; ?>">
        <fieldset>
        <p class="legend">Informations :</p>
        	<input type="hidden" name="modif_rss" value="ok" />
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <p><label for="rss_nom-<?php echo $id; ?>">nom : </label><input type="text" id="rss_nom-<?php echo $id; ?>" name="nom" value="<?php echo $nom; ?>" /></p>
            <p><label for="rss_url-<?php echo $id; ?>">url : </label><input type="text" id="rss_url-<?php echo $id; ?>" name="URL" value="<?php echo $url; ?>" class="inputField" /></p>
        </fieldset>
        <input type="submit" name="edit_dest" class="buttonenregistrer" id="edit_dest" value="Modifier" />
	</form>
</div>