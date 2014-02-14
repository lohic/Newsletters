<div class="newsletter" style="background:#CCCCCC">
<center>
<p style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#676767; padding:5px 0;">Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#da2e00">cliquez ici</a></p>
<table width="800" border="0" cellspacing="0" cellpadding="0" bgcolor="#CCCCCC">
  <tr>
    <td height="108" colspan="6" valign="top" background="<?php $header = $news->get_header("header.gif"); echo $header->image;?>"><p style="margin:63px 0 0 30px; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#da2e00"><?php 
	
	setlocale(LC_ALL, 'fr_FR');
	$timestamp_tab = explode('-',$ladate);
	$timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
	
	echo utf8_encode(strftime('%B %Y',$timestamp));
	
	?></p></td>
  </tr>
  
  <?php
	
	$news->set_contenu("main_list","main_bloc.php");
	

	?>
  
  
  <tr>
    <td height="25">&nbsp;</td>
    <td height="25" bgcolor="#FFFFFF">&nbsp;</td>
    <td height="25" colspan="2" bgcolor="#FFFFFF" background="<?php echo $template;?>images/separation.gif">&nbsp;</td>
    <td height="25" bgcolor="#FFFFFF">&nbsp;</td>
    <td height="25">&nbsp;</td>
  </tr>
  
  
  
  
  
  <tr>
    <td height="15">&nbsp;</td>
    <td height="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td height="15" colspan="2" valign="top" bgcolor="#FFFFFF"><?php
	
	$news->set_contenu("news_list","news_bloc.php");
	

	?></td>
    <td height="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td height="15">&nbsp;</td>
  </tr>
  <tr>
    <td height="15">&nbsp;</td>
    <td height="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td height="15" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
    <td height="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td height="15">&nbsp;</td>
  </tr>
  <tr>
    <td height="15">&nbsp;</td>
    <td height="15" bgcolor="#f3f3f3">&nbsp;</td>
    <td height="15" colspan="2" bgcolor="#f3f3f3">&nbsp;</td>
    <td height="15" bgcolor="#f3f3f3">&nbsp;</td>
    <td height="15">&nbsp;</td>
  </tr>
  
  <tr>
    <td width="15" height="25" background="<?php echo $template;?>images/titre-rectangle.gif">&nbsp;</td>
    <td width="15" bgcolor="#da2e00">&nbsp;</td>
    <td width="26" bgcolor="#da2e00">&nbsp;</td>
    <td width="714" bgcolor="#f3f3f3"><h2 style="font-family:Arial, Helvetica, sans-serif; text-transform:uppercase; font-size:24px; margin:0 0 0 15px; font-weight:normal; color:#da2e00">This month at <strong>Sciences Po</strong></h2></td>
    <td width="15" bgcolor="#f3f3f3">&nbsp;</td>
    <td width="15">&nbsp;</td>
  </tr>
  <tr>
    <td width="15" height="7" background="<?php echo $template;?>images/titre-triangle.gif"></td>
    <td width="15" height="7" bgcolor="#f3f3f3"></td>
    <td height="7" colspan="2" bgcolor="#f3f3f3"></td>
    <td width="15" height="7" bgcolor="#f3f3f3"></td>
    <td width="15" height="7"></td>
  </tr>
  <tr>
    <td width="15" height="10"></td>
    <td width="15" height="10" bgcolor="#f3f3f3"></td>
    <td height="10" colspan="2" bgcolor="#f3f3f3"></td>
    <td width="15" height="10" bgcolor="#f3f3f3"></td>
    <td width="15" height="10"></td>
  </tr>
  <tr>
    <td width="15">&nbsp;</td>
    <td width="15" bgcolor="#f3f3f3">&nbsp;</td>
    <td colspan="2" bgcolor="#f3f3f3"><table width="740" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="167" valign="top"><?php
	
	$news->set_contenu("month1_list","month_bloc.php");
	

	?></td>
        <td width="24" valign="top">&nbsp;</td>
        <td width="167" valign="top"><?php
	
	$news->set_contenu("month2_list","month_bloc.php");
	

	?> </td>
        <td width="24" valign="top">&nbsp;</td>
        <td width="167" valign="top"><?php
	
	$news->set_contenu("month3_list","month_bloc.php");
	

	?></td>
        <td width="24" valign="top">&nbsp;</td>
        <td width="167" valign="top"><?php
	
	$news->set_contenu("month4_list","month_bloc.php");
	

	?></td>
      </tr>
      <tr>
        <td width="167">&nbsp;</td>
        <td width="24">&nbsp;</td>
        <td width="167">&nbsp;</td>
        <td width="24">&nbsp;</td>
        <td width="167">&nbsp;</td>
        <td width="24">&nbsp;</td>
        <td width="167">&nbsp;</td>
      </tr>
    </table></td>
    <td width="15" bgcolor="#f3f3f3"><p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="15">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="8"></td>
    <td height="8" bgcolor="#ffffff"></td>
    <td height="8" colspan="2" bgcolor="#ffffff"></td>
    <td height="8" bgcolor="#ffffff"></td>
    <td height="8"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td bgcolor="#ffffff">&nbsp;</td>
    <td colspan="2" bgcolor="#ffffff">
    
    <table width="740" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="226" valign="top"><h3 style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#676767; font-weight:bold">General news at Sciences Po</h3></td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="1" valign="top" bgcolor="#cccccc"></td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="226" valign="top"><h3 style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#676767; font-weight:bold">In Press</h3></td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="1" valign="top" bgcolor="#cccccc"></td>
        <td width="15" valign="top">&nbsp;</td>
        <td width="226" valign="top"><h3 style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#676767; font-weight:bold">Upcoming</h3></td>
      </tr>
      <tr>
        <td width="226" valign="top"><?php
	
	$news->set_contenu("general_list","bottom_bloc.php");
	

	?></td>
        <td width="15">&nbsp;</td>
        <td width="1" bgcolor="#cccccc"></td>
        <td width="15">&nbsp;</td>
        <td width="226" valign="top"><?php
	
	$news->set_contenu("press_list","bottom_bloc.php");
	

	?></td>
        <td width="15">&nbsp;</td>
        <td width="1" bgcolor="#cccccc"></td>
        <td width="15">&nbsp;</td>
        <td width="226" valign="top"><?php
	
	$news->set_contenu("upcoming_list","bottom_bloc.php");
	

	?></td>
      </tr>
      </table>
    
    </td>
    <td bgcolor="#ffffff">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="15">&nbsp;</td>
    <td width="15" bgcolor="#ffffff">&nbsp;</td>
    <td colspan="2" bgcolor="#ffffff">&nbsp;</td>
    <td width="15" bgcolor="#ffffff">&nbsp;</td>
    <td width="15">&nbsp;</td>
  </tr>
  <tr>
    <td width="15" height="16" background="<?php echo $template;?>images/triangle-left.gif"></td>
    <td width="15" height="16" bgcolor="#FFFFFF"></td>
    <td height="16" colspan="2" bgcolor="#FFFFFF"></td>
    <td width="15" height="16" bgcolor="#FFFFFF"></td>
    <td width="15" height="16" background="<?php echo $template;?>images/triangle-right.gif"></td>
  </tr>
  <tr>
    <td width="15" height="60" bgcolor="#e8e8e8">&nbsp;</td>
    <td width="15" height="60" bgcolor="#e8e8e8">&nbsp;</td>
    <td height="60" colspan="2" bgcolor="#e8e8e8"><div style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#676767"><p>Global Horizons is a publication from Sciences Po International Affairs Division<br />
      Contact : <a href="mailto:bulletin.daie@sciences-po.fr" style="color:#da2e00">bulletin.daie@sciences-po.fr</a></p></div></td>
    <td width="15" height="60" bgcolor="#e8e8e8">&nbsp;</td>
    <td width="15" height="60" bgcolor="#e8e8e8">&nbsp;</td>
  </tr>
</table>
&nbsp;
</center>
</div>