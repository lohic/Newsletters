<?php 

date_default_timezone_set('UTC');

$departementListe = array();
$departementListe[14] = "Calvados";
$departementListe[18] = "Cher";
$departementListe[22] = "Côte d'Armor";
$departementListe[29] = "Finistère";
$departementListe[35] = "Ille et Vilaine";
$departementListe[37] = "Indre et Loire";
$departementListe[44] = "Loire Atlantique";
$departementListe[45] = "Loiret";
$departementListe[49] = "Maine et Loire";
$departementListe[50] = "Manche";
$departementListe[53] = "Mayenne";
$departementListe[56] = "Morbihan";
$departementListe[72] = "Sarthe";
$departementListe[76] = "Seine Maritime";
$departementListe[85] = "Vendée";


$typeCatListe = array();
$typeCatListe['root'] = 'principale';
$typeCatListe['cat'] = 'catégorie';


$typeMenuListe = array();
$typeMenuListe['liste'] = 'Par liste';
$typeMenuListe['post'] = 'Par billet';
$typeMenuListe['special'] = 'Page spéciale';
$typeMenuListe['lien'] = 'Lien externe';


$triCatListe = array();
$triCatListe['date'] = 'Par date';
$triCatListe['lieu'] = 'Par lieu';
$triCatListe['abcd'] = 'Par ordre alphabétique';
$triCatListe['ordre'] = 'Par ordre';


$moisListe = array();
$moisListe['01']	= 'janvier';
$moisListe['02']	= 'février';
$moisListe['03']	= 'mars';
$moisListe['04']	= 'avril';
$moisListe['05']	= 'mai';
$moisListe['06']	= 'juin';
$moisListe['07']	= 'juillet';
$moisListe['08']	= 'août';
$moisListe['09']	= 'septembre';
$moisListe['10']	= 'octobre';
$moisListe['11']	= 'novembre';
$moisListe['12']	= 'décembre';


$jourListe = array();
$jourListe[1]		= 'lundi';
$jourListe[2]		= 'mardi';
$jourListe[3]		= 'mercredi';
$jourListe[4]		= 'jeudi';
$jourListe[5]		= 'vendredi';
$jourListe[6]		= 'samedi';
$jourListe[7]		= 'dimanche';


$langEvenement = array();
$langEvenement[0]	= 'français';
$langEvenement[1]	= 'anglais';
$langEvenement[2]	= 'chinois';
$langEvenement[3]	= 'allemand';
$langEvenement[4]	= 'danois';
$langEvenement[5]	= 'espagnol';
$langEvenement[6]	= 'italien';
$langEvenement[7]	= 'japonais';
$langEvenement[8]	= 'polonais';
$langEvenement[9]	= 'russe';
$langEvenement[10]	= 'tchèque';


$anneeListe = array();
for($i=date('Y')+1;$i>=2009;$i--){
	$anneeListe[$i] = $i;
}


$templateListe = array();
foreach(glob("{template/*}",GLOB_BRACE) as $folder){
    
        if(is_dir($folder)){
        	$dossier = str_replace('template/','',$folder);
      		$templateListe[$dossier] = $dossier ;
		}
}

?>