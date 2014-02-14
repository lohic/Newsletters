<?php
$id_template = isset($_GET['id_template'])?$_GET['id_template']:NULL;
?>
<div class="form_container">
<p class="intro_modif">Création de</p>
<h3>newsletter</h3>
<div class="reset"></div>
<div id="news_creation">
    <form id="news_creation_form" action="" method="post">
        <fieldset>
            <input type="hidden" name="edit" value="create" />
            
            <p><label for="id_template" class="inline" >Template à utiliser :&nbsp;</label>
            <?php echo createSelect($news->get_templates_liste($core->groups_id,false), 'id_template', $id_template ,NULL,false);?></p>
            
            <p><label for="nom_newsletter" class="inline">Titre de la newsletter :&nbsp;</label>
            <input type="text" name="nom" value="" id="nom_newsletter" class="inputField" /></p>
            
            <p><label for="objet_newsletter" class="inline">Objet de la newsletter (visible lors de l'envoi du mail) :&nbsp;</label>
            <input type="text" name="objet" value="" id="objet_newsletter" class="inputField" /></p>
        </fieldset>
            <input type="submit" name="save_btn" id="news_creation_btn" value="Créer" class="buttonenregistrer" />
    </form>
    <div class="reset" /></div>
</div>
</div>