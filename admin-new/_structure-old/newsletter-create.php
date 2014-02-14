<div class="form_container">
<div id="news_creation">
    <form id="news_creation_form" action="" method="post">
        <input type="hidden" name="edit" value="create" />
        <label for="id_template" >Template à utiliser :&nbsp;</label><?php echo createSelect($news->get_templates_liste(), 'id_template', $_GET['id_template'],NULL,false);?><br />
        <label for="nom_newsletter">Titre de la newsletter :&nbsp;</label><input type="text" name="nom" value="" id="nom_newsletter" /><br />
        <label for="objet_newsletter">Objet de la newsletter (visible lors de l'envoi du mail) :&nbsp;</label><input type="text" name="objet" value="" id="objet_newsletter" />
        <hr class="reset" />
        <label>&nbsp;</label><input type="submit" name="save_btn" id="news_creation_btn" value="Créer" />
    </form>
</div>
</div>