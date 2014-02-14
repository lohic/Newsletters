<?php

include_once("../classe/classe_actu.php");
include_once('../vars/statics_vars.php');
include_once('../vars/constantes_vars.php');

$id_actu = $_GET['id'];

$actu = new actu($id_actu);

echo $actu->generate_actu();

?>