<?php
$liste  = '<h3>Requête de test de LDAP</h3>';
$ldapmails = array();
$mailsenvoyes = array();

$ldap = ldap_connect("ldap.sciences-po.fr");

if ($ldap) { 
	$r=ldap_bind($ldap);
	
	$liste .= 'Recherchons (cn=grp-*) ...' . '<br />';
	
	$sr = ldap_search($ldap,"ou=Groups, o=sciences-po, c=fr", "cn=grp-*");  
	
	$liste .= 'Le nombre d\'entrées retournées est ' . ldap_count_entries( $ldap , $sr ) . '<br />';
	$liste .= 'Lecture des entrées ...<br />';
	
	$info = ldap_get_entries( $ldap , $sr );
	
	$liste .= 'Données pour ' . $info["count"] . ' entrées:<br />';
	
	for ($i = 0 ; $i < $info["count"] ; $i++) {
		$liste .= '';
		$liste .= '<h3>' . $i . '</h3>';
		$liste .= 'dn est : ' . $info[$i]["dn"] . '<br />';
		$liste .= 'premiere entree cn : ' . $info[$i]["cn"][0] . '<br />';
		$liste .= 'premier email : ' . $info[$i]["mail"][0] . '<br />';
		$liste .= '';
		
		$ldapmails[] = $info[$i]["mail"][0];
	}
	
	$liste .= 'Fermeture de la connexion';
	
	ldap_close($ldap);

} else {
	$liste .= '<h4>Impossible de se connecter au serveur LDAP.</h4>';
}

$ldapmails = array_unique($ldapmails);


if(!empty($_POST['to'])){
	if(count($ldapmails)>0){
		$mailsto = explode(',',$_POST['to']);
		$mailsto = array_unique($mailsto);
		
		$mailsautorized = explode(',',$_POST['autorized']);
		$mailsautorized = array_unique($mailsautorized);
		
		foreach($mailsto as $mail){
			
			if( in_array($mail, $ldapmails) ){
				if( in_array($mail, $mailsautorized) ){
					$mailsenvoyes[] = $mail;
				}
			}else{
				$mailsenvoyes[] = $mail;	
			}
		}
		
	}else{
		$mailsenvoyes = explode(',',$_POST['to']);
		$mailsenvoyes = array_unique($mailsenvoyes);
	}
}


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Document sans nom</title>
</head>

<body>
<form action="" target="" method="POST">
	<p><label for="to">Destinataires</label></p>
    <p><textarea name="to" cols="40" rows="5" id="to">test@test.com,test2@test.com,test@test.com,grp-administration@ldd01.sciences-po.fr</textarea></p>
    
	<p><label for="autorized">Mails autorisés</label></p>
    <p><textarea name="autorized" cols="40" rows="5" id="autorized"></textarea></p>
    
    <p><input name="Envoyer" type="submit" value="valider" /></p>
</form>

<p><?php echo implode(', ', $mailsenvoyes); ?></p>

<p><?php echo implode(', ', $ldapmails);?></p>

<?php //echo $liste; ?>

</body>
</html>