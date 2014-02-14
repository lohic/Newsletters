<?php 

//echo getcwd().'/../';

define ('SUB_FOLDER',			'Site_SCIENCESPO_NEWSLETTER/');
define ('SYSTEM_URL',			'http://localhost:8888/'.SUB_FOLDER);
define ('ABSOLUTE_URL',			'http://localhost:8888/'.SUB_FOLDER);
//define ('BASE_URL',			'/'.SUB_FOLDER);
define ('BASE_URL',				getcwd().'/../');
define ('LOCAL_PATH',			getcwd().'/../');
//define ('TAB_PREFIX',			'');

define ('IS_LDAP_SERVER',	false);

define ('TEMPLATE_FOLDER',		'template/');
define ('TEMPLATE_ACTU_FOLDER',	'template_actu/');
define ('ACTU_FOLDER',			'actu/');
define ('ACTU_MEDIA_FOLDER',	'actu_medias/');
define ('SHOW_FOLDER',			'show/');
define ('ARCHIVE_FOLDER',		'newsletter_archive/');

define ('IMG_ACTU',				'actu_images/');
define ('IMG_NEWSLETTER',		'newsletter_images/');

?>