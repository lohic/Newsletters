<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">
  <table width="800" border="0" cellspacing="0" cellpadding="0" background="#FFF">
    <tr>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
    <td colspan="7" align="right" bgcolor="#CCCCCC"><span style="color:#333333"><a name="haut" id="haut2"></a>Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#FF0000">cliquez ici</a></span></td>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
    <!--<tr>
      <td colspan="9" bgcolor="#FFFFFF"><img src="<?php $header = $news->get_header("header.gif"); echo $header->image;?>" height="<?php echo $header->h;?>" /></td>
    </tr>-->
    <tr>
    <td colspan="9" background="<?php $header = $news->get_header("header.gif"); echo $header->image;?>" height="<?php echo $header->h;?>" ><p style="margin:45px 0 0 27px;color:#FFF;font-size:10px;"><?php 
	
	setlocale(LC_ALL, 'fr_FR');
	$timestamp_tab = explode('-',$ladate);
	$timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
	
	echo utf8_encode(strftime('%A %e %B %Y',$timestamp));
	
	?></p></td>
  </tr>
    <tr>
      <td bgcolor="#CCCCCC">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td width="280" rowspan="3" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/sommaire.gif" alt="La vie académique et vous" width="280" height="45" /></td>
      <td height="15" bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="155" bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
    <tr>
    <td height="15" bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td width="260" rowspan="2" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/sommaire-vie-etudiante.gif" alt="La vie académique et vous" width="260" height="30" /></td>
    <td width="30" bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" bgcolor="#FFFFFF"><p style="font-size:9px;">SUIVRE SCIENCES PO : <a href="http://www.facebook.com/sciencespo" target="_blank"><img src="<?php echo $template;?>images/rs-facebook.gif" width="20" height="20" style="margin-bottom:-3px;" /></a><a href="http://twitter.com/#!/sciencespo" target="_blank"><img src="<?php echo $template;?>images/rs-twitter.gif" width="20" height="20" style="margin-bottom:-3px;" /></a><a href="http://www.sciencespo.fr/news_archives/fr/feed/" target="_blank"><img src="<?php echo $template;?>images/rs-rss.gif" width="20" height="20" style="margin-bottom:-3px;" /></a></p></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
  <tr>
    <td height="50" bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="4" rowspan="9" valign="top" bgcolor="#FFFFFF" background="<?php echo $template;?>images/back-right.gif">
    <table width="200" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="4" valign="top"><img src="<?php echo $template;?>images/rub-evenements.gif" width="200" height="50" alt="La vie académique et vous" /></td>
        </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td valign="top"><?php
	
	$news->set_contenu("evenements_list","event_bloc.php");
	
	$news->set_contenu("evenements_suite_list","event_bloc.php",0,"ET AUSSI...");
	
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
        <td colspan="4" valign="top"><img src="<?php echo $template;?>images/rub-boutique.gif" width="200" height="50" alt="La boutique de Sciences Po" /></td>
        </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td valign="top"><?php
	
	$news->set_contenu("boutique_list","boutique_bloc.php");
	
	$news->set_contenu("boutique_suite_list","boutique_bloc.php",0,"ET AUSSI...");
	
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
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/sommaire-la-une.gif" alt="La vie académique et vous" width="280" height="30" /></td>
    <td rowspan="2" valign="top" bgcolor="#FFFFFF">
    <?php
    $style['li'] = "font-weight:bold;font-size:14px;";
	$style['date'] = "";
	$style['ul'] = "color:#cc0099;margin:0;";
	$news->set_sommaire("vie_etudiante_list",false,$style,4);
	$news->set_sommaire("vie_etudiante_suite_list",false,$style,4);
	?>
    </td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF">
    <?php
    $style['li'] = "font-weight:bold;font-size:14px;";
	$style['date'] = "";
	$style['ul'] = "color:#66ccff;margin:0;";
	$news->set_sommaire("une_list",false,$style,4);
	$news->set_sommaire("une_suite_list",false,$style,4);
	?>
    </td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td height="50" colspan="4" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/rub-a-la-une.gif" width="570" height="50" alt="La vie académique et vous" /></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" valign="top" bgcolor="#FFFFFF"><?php
	
	$news->set_contenu("une_list","une_bloc.php");
	
	$news->set_contenu("une_suite_list","une_bloc.php",0,"ET AUSSI...");
	
	?></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td height="50" colspan="4" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/rub-vie-etudiante.gif" width="570" height="50" alt="La vie académique et vous" /></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" valign="top" bgcolor="#FFFFFF"><?php
	
	$news->set_contenu("vie_etudiante_list","vie_etudiante_bloc.php");
	
	$news->set_contenu("vie_etudiante_suite_list","vie_etudiante_bloc.php",0,"ET AUSSI...");

	?></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td height="50" colspan="4" valign="bottom" bgcolor="#FFFFFF" background="<?php echo $template;?>images/back-left.gif"><img src="<?php echo $template;?>images/rub-les-associations.gif" width="570" height="50" alt="La vie académique et vous" /></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="5" bgcolor="#FFFFFF">
    <a href="http://asscpo-paris.fr/" target="_blank"><img src="<?php echo $template;?>images/logo-association-sportive.gif" width="190" height="80" alt="La vie académique et vous" /></a>
    <a href="http://bdarts.org/" target="_blank"><img src="<?php echo $template;?>images/logo-bda.gif" width="110" height="80" alt="La vie académique et vous" /></a>
    <a href="http://www.bdescpo.info/" target="_blank"><img src="<?php echo $template;?>images/logo-bureau-eleve.gif" width="100" height="80" alt="La vie académique et vous" /></a>
    <a href="http://www.junior-consulting.com" target="_blank"><img src="<?php echo $template;?>images/logo-junior-consulting.gif" width="170" height="80" alt="La vie académique et vous" /></a>
    <a href="http://scpo-environnement.org/	" target="_blank"><img src="<?php echo $template;?>images/logo-environnement.gif" width="150" height="80" alt="La vie académique et vous" /></a></td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9" background="<?php echo $template;?>images/foot.gif" height="95"  >
    	<div style="padding:20px 30px;font-size:10px;">
        <?php $news->set_footer();?>
        </div>
      </td>
  </tr>
  <tr>
  	<td height="50" colspan="9" bgcolor="#CCCCCC">
    </td>
  </tr>
</table>
</div>
</div>