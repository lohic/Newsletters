<?php

include_once("classe/classe_newsletter.php");
include_once('vars/statics_vars.php');
include_once('vars/constantes_vars.php');

$id_newsletter = $_GET['id'];

$news = new newsletter($id_newsletter,'show',$_GET['unique']);

echo $news->generate_newsletter($id_newsletter);

?>