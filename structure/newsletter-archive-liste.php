<?php
	//include_once('../vars/constantes_vars.php');
	include_once('../vars/config.php');
	include_once("../classe/classe_template.php");
	include_once("../vars/statics_vars.php");
	$gabarit = new template();
	
	//$gabarit->set_core($core);

?>


<div class="form_container">
	<?php 
  	$path = $_SERVER['PHP_SELF']; 
  	$file = basename ($path); 
	 if($file != 'liste-archives.php'){ ?>
	<p class="intro_modif">Liste des archives de :</p>
	<?php $info = $gabarit->get_template_info($_GET['id_template']); ?>
    <h3><?php echo $info['titre'];?></h3>
    
    <div class="reset"></div>
    <p><a href="liste-archives.php?id_template=<?php echo $_GET['id_template']; ?>" target="_blank">> Voir sans mise en forme</a></p>
    
    <div class="reset"></div>
    <?php } ?>
	<?php
		echo $gabarit->get_archives_liste($_GET['id_template']);
		
	?>
</div>