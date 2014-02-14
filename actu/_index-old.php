<?php

include('../classe/classe_actu.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sciencespo Actualité</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="actu">
<div id="header"></div>
<div id="content">
<?php
$actu = new Actu();
$info = $actu->get_info($_GET['id']);

setlocale(LC_ALL, 'fr_FR');
$timestamp_tab = explode('-',$info['date']);
$timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
?>
<?php if(isset($info['id'])){ ?>
<p class="date"><?php echo strftime('%A %e %B %Y',$timestamp); ?></p>
<h1><?php echo $info['titre']; ?></h1>
<h2><?php echo $info['soustitre']; ?></h2>
<div><?PHP if(isset($info['image'])){?><img src='<?php echo '../actu_images/'.$info['id'].'/'.$info['image']; ?>' width="370"/><?php } ?><?php echo $info['texte']; ?></div>
<div class="reset"></div>
<?php if(isset($info['URL'])){ ?>
<p class="lien"><a href="<?php echo $info['URL']; ?>" target="_blank" >&gt; <?php if(isset($info['moreTXT'])){ echo $info['moreTXT']; }else{ echo 'En savoir plus';} ?></a></p>
<?php } ?>
<?php }else{ ?>
<h1>L'actualité demandée n'existe pas.</h1>
<?php } ?>
</div>
<div id="footer"></div>
</div>
<script type="text/javascript">
 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20942014-1']);
  _gaq.push(['_trackPageview']);
 
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 
</script>
</body>
</html>