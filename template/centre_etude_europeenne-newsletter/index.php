<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">
  <table width="800" border="0" cellspacing="0" cellpadding="0" background="#FFF">
    <tr>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
    <td colspan="7" align="right" bgcolor="#CCCCCC"><span style="color:#333333;font-size:10px;"><a name="haut" id="haut2"></a>Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#006766">cliquez ici</a></span></td>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
    <!--<tr>
      <td colspan="9" bgcolor="#FFFFFF"><img src="<?php $header = $news->get_header("header.gif"); echo $header->image;?>" height="<?php echo $header->h;?>" /></td>
    </tr>-->
    <tr>
    <td colspan="9" bgcolor="#FFFFFF" background="<?php $header = $news->get_header("header.gif"); echo $header->image;?>" height="<?php echo $header->h;?>" ></td>
  </tr>
    <tr>
      <td bgcolor="#CCCCCC">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td width="280" bgcolor="#FFFFFF">&nbsp;</td>
      <td height="15" bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="155" bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td width="280" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="260" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="4" rowspan="12" valign="top" bgcolor="#FFFFFF" background="<?php echo $template;?>images/back-right.gif">
    <table width="200" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15" valign="top">&nbsp;</td>
        <td width="155" valign="top">&nbsp;</td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" valign="top"><img src="<?php echo $template;?>images/rub-events.gif" width="200" height="50" alt="Events" /></td>
        </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td valign="top"><?php
	
	$news->set_contenu("events_list","mini_bloc.php");
	
	$news->set_contenu("events_suite_list","mini_bloc.php",0,"ET AUSSI...");
	
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
        <td colspan="4" valign="top"><img src="<?php echo $template;?>images/rub-medias.gif" width="200" height="50" alt="Medias" /></td>
        </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td valign="top"><?php
	
	$news->set_contenu("medias_list","mini_bloc.php");
	
	$news->set_contenu("medias_suite_list","mini_bloc.php",0,"ET AUSSI...");
	
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
		
    </table>
	</td>
  </tr>
  <tr>
    <td height="50" colspan="4" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/rub-highlights.gif" width="570" height="50" alt="Highlights" /></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
  	<td bgcolor="#CCCCCC">&nbsp;</td>
  	<td bgcolor="#FFFFFF">&nbsp;</td>
  	<td colspan="2" valign="top" bgcolor="#FFFFFF"><?php
	
	$news->set_contenu("highlights_list","post_bloc.php");
	
	$news->set_contenu("highlights_suite_list","post_bloc.php",0,"ET AUSSI...");
	
	?></td>
  	<td bgcolor="#FFFFFF">&nbsp;</td>
  	</tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td height="50" colspan="4" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/rub-news.gif" width="570" height="50" alt="News" /></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
  	<td bgcolor="#CCCCCC">&nbsp;</td>
  	<td bgcolor="#FFFFFF">&nbsp;</td>
  	<td colspan="2" valign="top" bgcolor="#FFFFFF"><?php
	
	$news->set_contenu("news_list","post_bloc.php");
	
	$news->set_contenu("news_suite_list","post_bloc.php",0,"ET AUSSI...");

	?></td>
  	<td bgcolor="#FFFFFF">&nbsp;</td>
  	</tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td height="50" colspan="4" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/rub-people.gif" width="570" height="50" alt="People" /></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
  	<td bgcolor="#CCCCCC">&nbsp;</td>
  	<td bgcolor="#FFFFFF">&nbsp;</td>
  	<td colspan="2" valign="top" bgcolor="#FFFFFF"><?php
	
	$news->set_contenu("people_list","post_bloc.php");
	
	$news->set_contenu("people_suite_list","post_bloc.php",0,"ET AUSSI...");

	?></td>
  	<td bgcolor="#FFFFFF">&nbsp;</td>
  	</tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td height="50" colspan="4" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/rub-last-publications.gif" width="570" height="50" alt="Last publications" /></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" valign="top" bgcolor="#FFFFFF"><?php
	
	$news->set_contenu("last-publication_list","post_bloc.php");
	
	$news->set_contenu("last-publication_suite_list","post_bloc.php",0,"ET AUSSI...");

	?></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="5" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9" bgcolor="#FFFFFF" background="<?php echo $template;?>images/foot.gif" height="95"  >
    	<div style="padding:10px 30px;font-size:10px;">
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