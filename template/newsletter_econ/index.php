<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">
  <table width="800" border="0" cellspacing="0" cellpadding="0" background="#FFF">
    <tr>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
    <td colspan="7" align="right" bgcolor="#CCCCCC"><span style="color:#333333;font-size:11px;"><a name="haut" id="haut2"></a>If you are having trouble visualising this email, please  <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#FF0000">clic here</a></span></td>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
    <!--<tr>
      <td colspan="9" bgcolor="#FFFFFF"><img src="<?php $header = $news->get_header("header.gif"); echo $header->image;?>" height="<?php echo $header->h;?>" /></td>
    </tr>-->
    <tr>
    <td colspan="9" bgcolor="#FFFFFF" background="<?php $header = $news->get_header("header.gif"); echo $header->image;?>" height="<?php echo $header->h;?>" ><p style="margin:45px 0 0 27px;color:#FFF;font-size:10px;"><?php 
	
	setlocale(LC_ALL, 'en_EN');
	$timestamp_tab = explode('-',$ladate);
	$timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
	
	echo utf8_encode(strftime('%B %e, %Y',$timestamp));
	
	?></p></td>
  </tr>
    <tr>
      <td rowspan="2" bgcolor="#CCCCCC">&nbsp;</td>
      <td rowspan="2" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="280" rowspan="2" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="260" rowspan="2" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="30" rowspan="2" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="15" bgcolor="#FFFFFF"><p style="font-size:9px;">&nbsp;</p></td>
      <td width="155" bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" rowspan="7" valign="top" bgcolor="#FFFFFF" background="<?php echo $template;?>images/back-right.gif">
        <table width="200" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="4" valign="top"><img src="<?php echo $template;?>images/rub-events.gif" width="200" height="50" alt="Events" /></td>
            </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top"><?php
	
	$news->set_contenu("events_list","event_bloc.php");
	
	$news->set_contenu("events_suite_list","event_bloc.php",0,'');
	
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
    <td height="50" colspan="4" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/rub-seminars.gif" width="570" height="50" alt="Seminars and Conferences" /></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" valign="top" bgcolor="#FFFFFF"><?php
	
	$news->set_contenu("seminar_list","news_bloc.php");
	
	$news->set_contenu("seminar_suite_list","news_bloc.php",0,'Other news');
	
	?></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td height="50" colspan="4" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/rub-news.gif" width="570" height="50" alt="Latest news" /></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" valign="top" bgcolor="#FFFFFF"><?php
	
	$news->set_contenu("news_list","news_bloc.php");
	
	$news->set_contenu("news_suite_list","news_bloc.php",0,'Other news');

	?></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td height="50" colspan="4" valign="bottom" bgcolor="#FFFFFF" background="<?php echo $template;?>images/back-left.gif"><img src="<?php echo $template;?>images/rub-jobs.gif" width="570" height="50" alt="Jobs and internships ads" /></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" valign="top" bgcolor="#FFFFFF"><?php
	
	$news->set_contenu("jobs_list","news_bloc.php");
	
	$news->set_contenu("jobs_suite_list","news_bloc.php",0,'Other news');

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
    <td colspan="9" bgcolor="#FFFFFF" background="<?php echo $template;?>images/foot.gif" height="20" >
    	
      </td>
  </tr>
  <tr>
    <td colspan="9" bgcolor="#e8e8e8"  height="75"  >
    	<div style="padding:0px 30px 20px;font-size:10px;">
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