<div class="<?php echo $class; ?>">
    <div class="infos">
        <p class="jour"><?php $temp = explode('-',$date); echo $temp[2]; ?></p>
        <div class="image">
        	<?php // IMAGE : w 55px h 35px ?>
        </div>
    
    
        <div class="titre_heure">
            <p class="titre"><a href="./?page=actu_modif&id_actu=<?php echo $id; ?>" title="modifier"><?php echo $titre; ?></a></p>
            <p><?php echo $categorie; ?></p>
        </div>
    </div>
    
    <div class="liens">
    
        <a href="./?page=actu_modif&id_actu=<?php echo $id; ?>" title="modifier"><img src="../graphisme/pencil.png" alt="modifier"/></a>&nbsp;<a href="../actu/?id=<?php echo $id; ?>" target="_blank"><img src="../graphisme/eye.png" alt="voir"/></a><br/>
    </div>
    <div class="places">
        
    </div>
    <div class="poubelle">
        <a href="list.php?fonction=supprimer&amp;id=243" onclick="confirmar('list.php?fonction=supprimer&amp;id=243', 'Etes-vous sûr de vouloir supprimer cette actualit ? Les images associées seront également supprimées.')" title="supprimer"><img src="../graphisme/trash.png" alt="supprimer"/></a>
    
    </div>
</div>