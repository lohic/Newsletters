<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">
  <table width="800" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFF">
    <tr>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
    <td colspan="5" align="right" bgcolor="#CCCCCC"><span style="color:#333333;font-size:10px;"><a name="haut" id="haut2"></a>Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#030">cliquez ici</a></span></td>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
    <!--<tr>
      <td colspan="8" bgcolor="#FFFFFF"><img src="<?php $header = $news->get_header("header.gif"); echo $header->image;?>" height="<?php echo $header->h;?>" /></td>
    </tr>-->
    <tr>
      <td height="80" valign="top" bgcolor="#d3d725" ></td>
      <td height="80" width="585" colspan="3" valign="top"  bgcolor="#d3d725" ><img src="<?php echo $template;?>images/header-center-left.gif" width="585" height="60" alt="Sciences Po en campagne" border="0" /><span style="margin-left:15px;color:#FFF;font-size:10px;">La newsletter des donateurs -
        <?php 
	
	setlocale(LC_ALL, 'fr_FR');
	$timestamp_tab = explode('-',$ladate);
	$timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
	
	echo utf8_encode(strftime('%A %e %B %Y',$timestamp));
	
	?></span></td>
      <td height="80" width="185" colspan="2" valign="top" bgcolor="#d3d725" ><a href="http://www.sciencespo.fr/2013/content/14/comment-donner" target="_blank"><img src="<?php echo $template;?>images/header-don.gif" width="185" height="80" alt="Faire un don" border="0" /></a></td>
      <td width="15" height="80" valign="top" bgcolor="#d3d725" >&nbsp;</td>
    </tr>
    <tr>
    <td height="20" width="800" colspan="7" valign="top" background="<?php echo $template;?>images/header-bottom.gif" bgcolor="#FFFFFF" ></td>
    </tr>
    <tr>
      <td height="15" bgcolor="#CCCCCC">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td valign="top" bgcolor="#FFFFFF"><p><img src="<?php echo $template;?>images/sommaire.gif" width="102" height="16" alt="sommaire" border="0"/></p>
        <?php
    $style['li'] = "font-size:14px;font-weight:normal;";
	$style['date'] = "";
	$style['ul'] = "color:#cccc33;margin:0;";
	
	//$news->set_sommaire("edito_list",false,$style,8);
	//$news->set_sommaire("edito_suite_list",false,$style,8);
	
	$news->set_sommaire("campagne_list",false,$style,8);
	//$news->set_sommaire("campagne_suite_list",false,$style,8);

	$news->set_sommaire("developpement_list",false,$style,8);
	//$news->set_sommaire("developpement_suite_list",false,$style,8);
	
	$news->set_sommaire("vocation_list",false,$style,8);
	//$news->set_sommaire("vocation_suite_list",false,$style,8);
	?></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td width="185" colspan="2" rowspan="2" valign="bottom" bgcolor="#FFFFFF"><a href="http://www.sciencespo.fr/2013/content/3/un-héritage-historique" target="_blank"><img src="<?php echo $template;?>images/portrait.jpg" width="185" height="150" alt="Édito" border="0" style="display:block;" /></a></td>
      <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
    <tr>
    <td height="15" bgcolor="#CCCCCC">&nbsp;</td>
    <td height="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="540" height="15" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="30" height="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" height="15" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" valign="top" bgcolor="#FFFFFF" background="<?php echo $template;?>images/back-left.gif">
    
    
    <table width="600" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="570" colspan="3" valign="top"><img src="<?php echo $template;?>images/rub_edito.gif" width="570" height="50" alt="Édito" border="0" /></td>
        <td width="30" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="540" valign="top"><?php
	
	$news->set_contenu("edito_list","post_bloc.php");
	
	$news->set_contenu("edito_suite_list","post_bloc.php",0,"ET AUSSI...");
	
	?></td>
        <td width="30" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="540" valign="top">&nbsp;</td>
        <td width="30" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" valign="top"><img src="<?php echo $template;?>images/rub_campagne.gif" width="570" height="50" alt="La campagne" border="0" /></td>
        <td width="30" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="540" valign="top"><?php
	
	$news->set_contenu("campagne_list","post_bloc.php");
	
	$news->set_contenu("campagne_suite_list","post_bloc.php",0,"ET AUSSI...");

	?></td>
        <td width="30" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="540" valign="top">&nbsp;</td>
        <td width="30" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" valign="top"><img src="<?php echo $template;?>images/rub_developpement.gif" width="570" height="50" alt="En développement" border="0" /></td>
        <td width="30" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="540" valign="top"><?php
	
	$news->set_contenu("developpement_list","post_bloc.php");
	
	$news->set_contenu("developpement_suite_list","post_bloc.php",0,"ET AUSSI...");
	
	?></td>
        <td width="30" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="540" valign="top">&nbsp;</td>
        <td width="30" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" valign="top"><img src="<?php echo $template;?>images/rub_donateur.gif" alt="Vocation donateur" width="570" height="50" border="0" /></td>
        <td width="30" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="540" valign="top"><?php
	
	$news->set_contenu("vocation_list","post_bloc.php");
	
	$news->set_contenu("vocation_suite_list","post_bloc.php",0,"ET AUSSI...");

	?></td>
        <td width="30" valign="top">&nbsp;</td>
      </tr>
      
    </table>
    
    
    </td>
    
    
    <td colspan="3" valign="top" bgcolor="#FFFFFF" background="<?php echo $template;?>images/back-right.gif">
    
    <table width="200" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="4" width="200" valign="top"><img src="<?php echo $template;?>images/rub_chiffre.gif" width="200" height="50" alt="Le chiffre" border="0" /></td>
        </tr>
      <tr>
        <td width="15" valign="top">&nbsp;</td>
        <td width="155" valign="top"><?php
	
	$news->set_contenu("chiffre_list","mini_bloc.php");
	
	$news->set_contenu("chiffre_suite_list","mini_bloc.php",0,"ET AUSSI...");
	
	?></td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td width="15" valign="top">&nbsp;</td>
        <td width="155" valign="top">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" width="200" valign="top"><img src="<?php echo $template;?>images/rub_mot.gif" width="200" height="50" alt="Le mot" border="0" /></td>
        </tr>
      <tr>
        <td width="15" valign="top">&nbsp;</td>
        <td width="155" valign="top"><?php
	
	$news->set_contenu("mot_list","mini_bloc.php");
	
	$news->set_contenu("mot_suite_list","mini_bloc.php",0,"ET AUSSI...");
	
	?></td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td width="15" valign="top">&nbsp;</td>
        <td width="155" valign="top">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" width="200" valign="top"><img src="<?php echo $template;?>images/rub_video.gif" width="200" height="50" alt="La vidéo" border="0" /></td>
        </tr>
      <tr>
        <td width="15" valign="top">&nbsp;</td>
        <td width="155" valign="top"><?php
	
	$news->set_contenu("video_list","mini_bloc.php");
	
	$news->set_contenu("video_suite_list","mini_bloc.php",0,"ET AUSSI...");
	
	?></td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td width="15" valign="top">&nbsp;</td>
        <td width="155" valign="top">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" width="200" valign="top"><img src="<?php echo $template;?>images/rub_revenir.gif" width="200" height="50" alt="Revenir au 27" border="0" /></td>
        </tr>
      <tr>
        <td width="15" valign="top">&nbsp;</td>
        <td width="155" valign="top"><?php
	
	$news->set_contenu("revenir_list","mini_bloc.php");
	
	$news->set_contenu("revenir_suite_list","mini_bloc.php",0,"ET AUSSI...");
	
	?></td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      </table></td>
  </tr>
  <tr>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#FFFFFF" background="<?php echo $template;?>images/foot.gif" width="800" height="15"  >&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#e8e8e8" height="80"  >
    	<div style="padding:10px 30px 10px;font-size:12px;">
        <?php $news->set_footer();?>
        </div>
      </td>
  </tr>
  <tr>
  	<td height="50" colspan="7" bgcolor="#CCCCCC">
    </td>
  </tr>
</table>
</div>
</div>