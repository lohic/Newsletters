<div class="newsletter">
<div id="content" style="margin-top:0;margin-bottom:0;margin-left:auto;margin-right:auto;width:800px;">
  <table width="800" border="0" cellspacing="0" cellpadding="0" background="#FFF">
    <tr>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
    <td colspan="5" align="right" bgcolor="#CCCCCC"><span style="color:#333333;font-size:10px;"><a name="haut" id="haut2"></a>Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#030">cliquez ici</a></span></td>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
    <!--<tr>
      <td colspan="8" bgcolor="#FFFFFF"><img src="<?php $header = $news->get_header("header.gif"); echo $header->image;?>" height="<?php echo $header->h;?>" /></td>
    </tr>-->
    <tr>
      <td height="100" colspan="7" valign="top" bgcolor="#c61f16" background="<?php echo $template;?>images/header2.gif" ><p style="margin-left:15px;margin-top:58px;color:#FFF;font-size:12px;text-transform:uppercase;">Lettre d'information aux entreprises partenaires -
        <?php 
	if(isset($ladate)){
	setlocale(LC_ALL, 'fr_FR');
	$timestamp_tab = explode('-',$ladate);
	$timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
	
	echo utf8_encode(strftime('%B %Y',$timestamp));
	}
	?></p></td>
    </tr>
    <tr>
      <td width ="15" height="15" bgcolor="#CCCCCC"></td>
      <td width ="15" height="15" bgcolor="#FFFFFF"></td>
      <td width ="540" height="15" valign="top" bgcolor="#FFFFFF"></td>
      <td width ="215" height="15" colspan="3" valign="top" bgcolor="#FFFFFF"></td>
      <td width="15" height="15" bgcolor="#CCCCCC"></td>
    </tr>
    <tr>
      <td width="15" height="8" bgcolor="#CCCCCC"></td>
      <td width="15" bgcolor="#FFFFFF"></td>
      <td width="540" valign="top" bgcolor="#FFFFFF"><h2 style="color:#ff3300;font-size:14px;font-weight:bold;">À la une</h2>
        <?php
    $style['li'] = "font-size:14px;font-weight:normal;";
	$style['date'] = "";
	$style['ul'] = "color:#ff3300;margin:0;";
	
	
	$news->set_sommaire("une_list",false,$style,8);

	?>
        <h2 style="color:#ffcc66;font-size:14px;font-weight:bold;margin-top:10px;">Ça se passe à Sciences Po</h2>
        <?php
    $style['li'] = "font-size:14px;font-weight:normal;";
	$style['date'] = "";
	$style['ul'] = "color:#ffcc66;margin:0;";
	
	$news->set_sommaire("ca_se_passe_sciencespo_list",false,$style,8);
	?></td>
      <td width ="215" colspan="3" valign="top" bgcolor="#FFFFFF"><h2 style="color:#c1a37f;font-size:14px;font-weight:bold;">&nbsp;</h2></td>
      <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
    <tr>
    <td height="15" bgcolor="#CCCCCC">&nbsp;</td>
    <td height="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="540" height="15" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="3" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" height="15" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" valign="top" bgcolor="#FFFFFF" background="<?php echo $template;?>images/back-left.gif"><table width="600" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="570" colspan="3" valign="top"><img src="<?php echo $template;?>images/rub_une.gif" width="570" height="50" alt="Actualités" border="0" /></td>
        <td width="30" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="540" valign="top"><?php
	
	$news->set_contenu("une_list","post_bloc.php");
	
	$news->set_contenu("une_suite_list","post_bloc.php",0,"ET AUSSI...");
	
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
        <td colspan="3" valign="top"><img src="<?php echo $template;?>images/rub_casepasseasciencespo.gif" width="570" height="50" alt="Ça vient de sortir" border="0" /></td>
        <td width="30" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="540" valign="top"><?php
	
	$news->set_contenu("ca_se_passe_sciencespo_list","post_bloc.php");
	
	$news->set_contenu("ca_se_passe_sciencespo_suite_list","post_bloc.php",0,"ET AUSSI...");

	?></td>
        <td width="30" valign="top">&nbsp;</td>
      </tr>    
    </table></td>
    
    
    <td colspan="3" valign="top" bgcolor="#FFFFFF"  background="<?php echo $template;?>images/back-right.gif"><table width="200" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="4" valign="top"><img src="<?php echo $template;?>images/rub_agenda.gif" width="200" height="50" alt="Le chiffre" border="0" /></td>
        </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td valign="top"><?php
	
	$news->set_contenu("agenda_list","mini_bloc.php");
	
	$news->set_contenu("agenda_suite_list","mini_bloc.php",0,"ET AUSSI...");
	
	?></td>
        <td valign="top">&nbsp;</td>
        <td valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td width="15" valign="top">&nbsp;</td>
        <td width="155" valign="top">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" valign="top"><img src="<?php echo $template;?>images/rub_image.gif" width="200" height="50" alt="L'image" border="0" /></td>
        </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td valign="top"><?php
	
	$news->set_contenu("image_list","mini_bloc.php");
	
	$news->set_contenu("image_suite_list","mini_bloc.php",0,"ET AUSSI...");
	
	?></td>
        <td valign="top">&nbsp;</td>
        <td valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td width="15" valign="top">&nbsp;</td>
        <td width="155" valign="top">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" valign="top"><img src="<?php echo $template;?>images/rub_formation.gif" width="200" height="50" alt="La formation" border="0" /></td>
        </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td valign="top"><?php
	
	$news->set_contenu("formation_list","mini_bloc.php");
	
	$news->set_contenu("formation_suite_list","mini_bloc.php",0,"ET AUSSI...");
	
	?></td>
        <td valign="top">&nbsp;</td>
        <td valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td width="15" valign="top">&nbsp;</td>
        <td width="155" valign="top">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" valign="top"><img src="<?php echo $template;?>images/rub_chiffre.gif" width="200" height="50" alt="Vie des campus" border="0" /></td>
        </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td valign="top"><?php
	
	$news->set_contenu("chiffre_list","mini_bloc.php");
	
	$news->set_contenu("chiffre_suite_list","mini_bloc.php",0,"ET AUSSI...");
	
	?></td>
        <td valign="top">&nbsp;</td>
        <td valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      </table></td>
  </tr>
  <tr>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="585" colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="170" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#FFFFFF" background="<?php echo $template;?>images/foot.gif" height="15"  >&nbsp;</td>
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