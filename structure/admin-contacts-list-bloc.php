<div class="<?php echo $class; ?>">
    <div class="infos">
        <p class="jour"></p>
        <div class="image">
        	<img src="../graphisme/user.png" width="32" height="32" alt="modifier"/>
        </div>
    
    
        <div class="titre_heure">
            <p class="titre"><a href="#" title="modifier"><?php echo $nom; ?></a></p>
            <p><?php echo $mail; ?></p>
        </div>
    </div>
    
    <div class="liens">
        <a href="#" title="modifier" id="edit-<?php echo $id; ?>" class="modif_contact"><img src="../graphisme/pencil.png" alt="modifier"/></a>
    </div>
    
    <div class="places">
    </div>
    
    <div class="poubelle">
        <a href="#" onclick="supprContact(<?php echo $id; ?>,'<?php echo $nom; ?>')" title="supprimer"><img src="../graphisme/trash.png" alt="supprimer"/></a>
    </div>
</div>
<div class="<?php echo $class; ?> edit" id="form-edit-<?php echo $id; ?>">
	<form action="" method="post" id="modif_dest_form_<?php echo $id; ?>">
        <fieldset>
        <p class="legend">Informations :</p>
        	<input type="hidden" name="modif_dest" value="ok" />
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <p><label for="dest_nom-<?php echo $id; ?>">libellé : </label><input type="text" id="dest_nom-<?php echo $id; ?>" name="nom" value="<?php echo $nom; ?>" class="inputField" /></p>
            <p><label for="dest_mail-<?php echo $id; ?>">mail : </label><input type="text" id="dest_mail-<?php echo $id; ?>" name="mail" value="<?php echo $mail; ?>" class="inputField" /></p>
        </fieldset>
        <fieldset>
        <p class="legend">Contact relié aux groupes :</p>
            <p><?php echo $groupes; ?></p>
        </fieldset>
        <input type="submit" name="edit_dest" class="buttonenregistrer" id="edit_dest" value="Modifier" />
	</form>
</div>