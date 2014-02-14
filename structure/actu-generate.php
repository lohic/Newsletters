<?php

include_once("../classe/classe_actu.php");
include_once("../vars/statics_vars.php");
include_once('../vars/constantes_vars.php');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sciences Po - Actualité | <?php echo $info['titre'];?></title>
<link href="<?php echo $templateFolder;?>/style.css" rel="stylesheet" type="text/css" />

<style type="text/css">

<?php include(LOCAL_PATH.'template_actu/'.$template.'/style.css');?>

</style>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $GoogleAnalyticsCode;?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>

<?php include(LOCAL_PATH.'template_actu/'.$template.'/index.php'); ?>


</body>
</html>