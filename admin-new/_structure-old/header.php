<div id="header">
    <a href="./"><img src="../graphisme/logo_full.gif" alt="Sciences-Po" width="310" height="90"/></a>
    <h1><a href="./">/ newsletter</a></h1>
    <!--<a href="./?logout=true" class="deconnecter">se déconnecter</a>-->
    <?php if($core->isAdmin){  ?>
    <form id="logout_form" action="./" method="post">
        <!--<p><a href="index.php?logout=true">&gt; se déconnecter</a></p>-->
        <input name="logout" type="hidden" value="true" />
        <!--<p>Bienvenue <?php echo $core->user_info->login ;?></p> --><input type="submit" name="logout_btn" id="logout_btn" value="se déconnecter" />
    </form>
    <?php } ?>
</div>