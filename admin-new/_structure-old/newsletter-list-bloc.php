<div class="<?php echo $class; ?>">
    <div class="infos">
        <p class="jour"><?php $temp = explode('-',$date); echo $temp[2]; ?></p>
        <div class="image">
            <!--<a href="crop.php?id=243"><img src="upload/photos/evenement_243/mini-image.jpg?cache=1304592856" alt="Finale du Concours d'arbitrage international de Paris 2011" width="55" height="35"/></a>-->
        </div>
    
    
        <div class="titre_heure">
            <p class="titre"><a href="./?page=news_modif&id_newsletter=<?php echo $id; ?>" title="modifier"><?php echo $titre; ?></a></p>
            <p><?php echo $template; ?></p>
        </div>
    </div>
    
    <div class="liens">
    
        <a href="./?page=news_modif&id_newsletter=<?php echo $id; ?>" title="modifier"><img src="../graphisme/pencil.png" alt="modifier"/></a>&nbsp;<a href="show.php?id=<?php echo $id; ?>" target="_blank"><img src="../graphisme/eye.png" alt="voir"/></a>&nbsp;<a href="./?page=news_send&id_newsletter=<?php echo $id; ?>"><img src="../graphisme/mail.png" alt="envoyer"/></a><br/>
    </div>
    <div class="places">
        
    </div>
    <div class="poubelle">
        <a href="list.php?fonction=supprimer&id=243" onclick="confirmar('list.php?fonction=supprimer&id=<?php echo $id; ?>', 'Etes-vous sûr de vouloir supprimer cette newsletter ?')" title="supprimer"><img src="../graphisme/trash.png" alt="supprimer"/></a>
    
    </div>
</div>