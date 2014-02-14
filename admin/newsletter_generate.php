<?php

include_once("classe/classe_newsletter.php");
include_once("vars/statics_vars.php");

global $jourListe;
global $moisListe;

$news = new newsletter($id_newsletter,'show');

$template = $news->get_template($id_newsletter);
$templateFolder = $news->get_template($id_newsletter,'short');
$ladate = $news->get_date($id_newsletter);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SciencesPo | Newsletters</title>
<link href="<?php echo $template;?>style.css" rel="stylesheet" type="text/css" />

<style type="text/css">

<?php include('template/'.$templateFolder.'/style.css');?>

</style>

</head>

<body>
<div id="newsletter">
<?php include_once('template/'.$templateFolder.'/index.php'); ?>
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