<?php

if($core->isAdmin){

$selectClass = '';

function selectClass($ref=NULL){
	if(isset($_GET['page']) && isset($ref) ){
		if($_GET['page'] == $ref){
			echo 'select';	
		}else{
			echo '';	
		}
	}else{
		echo '';
	}
}



/*
news_select
news_send
news_create
actu_select
actu_create
contact
template_select
template_create
admin
*/

?>
<div id="menuHaut">
    <ul id="menuDown">
        <li id="news_select_btn"><a href="./?page=news_select" class="<?php selectClass('news_select'); ?>"><span>Newsletters</span></a>
            <ul>
        		<li id="news_create_btn"><a href="./?page=news_create" class="<?php selectClass('news_create'); ?>"><span>Créer</span></a></li>
            </ul>
        </li>
        <li id=""><a href="./?page=actu_select" class="<?php selectClass('actu_select'); ?>"><span>Actualités</span></a>
            <ul>
                <li id="actu_create_btn"><a href="./?page=actu_create" class="<?php selectClass('actu_create'); ?>"><span>Créer</span></a></li>
            </ul>
        </li>
        <li id=""><a href="./?page=contact" class="<?php selectClass('contact'); ?>"><span>Contacts</span></a>
        	<ul>
            	<li id=""><a href="./?page=groupes" class="<?php selectClass('groupes'); ?>"><span>Groupes</span></a>
            </ul>
        </li>
        <?php if($core->isAdmin && $core->userLevel<=1){ ?>
        <li id="admin_btn"><a href="./?page=template_select" class="<?php selectClass('template_select'); ?>"><span>Gabarits</span></a>
            <ul>
                <li><a href="./?page=footer_admin" class="<?php selectClass('footer_admin'); ?>"><span>Footer</span></a></li>
            </ul>
        </li>
        <?php } ?>
        <li id="admin_btn"><a href="./?page=admin" class="<?php selectClass('admin'); ?>"><span>Rubriques<?php if($core->isAdmin && $core->userLevel<=1){ ?> / RSS<?php } ?></span></a>
        </li>
        <?php if($core->isAdmin && $core->userLevel<=1){ ?>
        <li id="comptes_btn"><a href="./?page=comptes" class="<?php selectClass('comptes'); ?>"><span>Comptes</span></a>
        	<ul>
                <li id="groupes_admin_btn"><a href="./?page=groupes_admin" class="<?php selectClass('groupes_admin'); ?>"><span>Groupes admin</span></a>	
                <li id="organismes_btn"><a href="./?page=organismes" class="<?php selectClass('organismes'); ?>"><span>Organismes</span></a>
            </ul>
        </li>
        <?php } ?>
    </ul>
    <div class="reset"></div>
</div>
<hr class="reset" />

<?php } ?>
