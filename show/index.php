<?php

include_once("../classe/classe_newsletter.php");
include_once('../vars/statics_vars.php');
//include_once('../vars/constantes_vars.php');
include_once('../vars/config.php');

$id_newsletter = isset($_GET['id'])?$_GET['id']:-1;

$news = new newsletter($id_newsletter,'show',isset($_GET['unique'])?$_GET['unique']:'-1');

echo $news->generate_newsletter($id_newsletter);
