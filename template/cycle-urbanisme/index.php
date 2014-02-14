<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">
<table width="800" border="0" cellspacing="0" cellpadding="0" background="#FFF">
	<tr>
		<td colspan="3" bgcolor="#000000"><p style="text-align:right;color:#FFFFFF; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;font-size:10px;padding:5px;"><span style="color:#333333;font-size:11px;"><a name="haut" id="haut"></a></span>Si vous ne visualisez pas correctement la newsletter <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#FFFFFF;">cliquez ici</a></p></td>
	</tr>
	<tr>
		<td colspan="3" bgcolor="#000000"><img src="<?php echo $template;?>images/header.gif" height="80" width="800" alt="SciencesPo | Cycle d'Urbanisme" /></td>
	</tr>
	<tr>
		<td colspan="3" bgcolor="#FFFFFF"><img src="<?php $header = $news->get_header("front.jpg"); echo $header->image;?>" height="<?php echo $header->h;?>" width="800" alt="bandeau" /></td>
	</tr>
	<tr>
		<td height="13" colspan="3" bgcolor="#FFFFFF"></td>
	</tr>
	<tr>
		<td width="550" height="50" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/titre.gif" width="400" height="50"></td>
		<td width="40" bgcolor="#FFFFFF">&nbsp;</td>
		<td width="210" bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
	<tr>
		<td valign="top" bgcolor="#FFFFFF"><p style="color:#fc054b; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; margin-left:55px; margin-top:0; text-transform:capitalize; font-size:16px;">
			<?php 
	
	setlocale(LC_ALL, 'fr_FR');
	$timestamp_tab = explode('-',$ladate);
	$timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
	
	echo utf8_encode(strftime('%B %Y',$timestamp));
	
	?>
			</span></p></td>
		<td bgcolor="#FFFFFF">&nbsp;</td>
		<td bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
	<tr>
		<td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
		<td bgcolor="#FFFFFF">&nbsp;</td>
		<td bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/agenda.gif" width="200" height="30"></td>
	</tr>
	<tr>
		<td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
		<td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
		<td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
	<tr>
		<td valign="top" bgcolor="#FFFFFF"><?php
	
	$news->set_contenu("main_list","news_bloc.php");
	
	?></td>
		<td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
		<td valign="top" bgcolor="#FFFFFF"><?php
	
	$news->set_contenu("agenda_list","event_bloc.php");
	
	
	?></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">&nbsp;</td>
		<td bgcolor="#FFFFFF">&nbsp;</td>
		<td bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" bgcolor="#000000"><div style="margin:0px 15px; color:#FFFFFF; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;font-size:14px;">
		<?php $news->set_footer();?>
		</div></td>
	</tr>
</table>
</div>
</div>