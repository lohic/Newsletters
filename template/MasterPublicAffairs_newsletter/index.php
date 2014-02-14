<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">

<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" width="800">
	<tr>
    	<td align="right" bgcolor="#CCCCCC" height="20"><font style="font-family:Verdana, Geneva, sans-serif;color:#666;font-size:10px;margin-right:15px;">If you are having trouble visualising this email, please <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#1e3155;"> click here</a></font></td>
    </tr>
	<tr>
    	<td height="110" align="right" valign="bottom" background="<?php echo $template;?>images/header.gif" title="La lettre d'information sur l'évolution des systèmes d'information de la DFC | Sciences po - Formation continue">
		<p style="font-size:12px;padding-right:30px;padding-bottom:15px;color:#FFFFFF;"><?php 
	
	setlocale(LC_ALL, 'en_EN');
	$timestamp_tab = explode('-',$ladate);
	$timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
	
	echo utf8_encode(strftime('%b %d, %Y',$timestamp));
	
	?></p>
		<p style="font-size:12px;padding-right:30px;padding-bottom:20px;color:#FFFFFF;">Follow us on <a href="https://www.facebook.com/SciencesPoMPA"><img src="<?php echo $template;?>images/facebook.png" alt="MPA on facebook" width="16" height="16"/></a> <a href="https://twitter.com/SciencesPoMPA"><img src="<?php echo $template;?>images/twitter.png" alt="MPA on Twitter" width="16" height="16"/></a></p>
		</td>
    </tr>
	<tr>
    	<td>
        	<table border="0" cellpadding="0" cellspacing="0" height="25">
            	<tr>
            		<td bgcolor="#CCCCCC">&nbsp;</td>
            		<td bgcolor="#FFFFFF"><?php
		$news->set_contenu("edito_list","edito.php");
		?></td>
            		<td bgcolor="#CCCCCC">&nbsp;</td>
            		</tr>
            	<tr>
                	<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
                	<td bgcolor="#FFFFFF" width="770"><img src="<?php echo $template;?>images/ombre.gif" width="770" height="20"/></td>
                 	<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
               </tr>
            </table>
      </td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" width="800">
	<tr>
		<td width="15" bgcolor="#CCCCCC">&nbsp;</td>
		<td width="135">&nbsp;</td>
		<td width="635">&nbsp;</td>
		<td width="15" bgcolor="#CCCCCC">&nbsp;</td>
	</tr>
	<tr>
		<td width="150" colspan="2" valign="top" bgcolor="#CCCCCC">
		<img src="<?php echo $template;?>images/titre-blanc.gif" width="150" height="44"/>
		</td>
		<td width="635" valign="top"><h2 style="font-family:Arial, sans-serif; font-size:24px; color:#1e3155; text-transform:uppercase; font-weight:normal; margin-top:4px; margin-bottom:0">What's new at the MPA</h2></td>
		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
	</tr>
	<tr>
		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
		<td width="770" colspan="2" valign="top"><?php
		$news->set_contenu("whatsnew_list","bloc.php");
		?></td>
		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
	</tr>
	<tr>
		<td width="150" colspan="2" valign="top" bgcolor="#CCCCCC">
		<img src="<?php echo $template;?>images/titre-blanc.gif" width="150" height="44"/></td>
		<td width="635" valign="top"><h2 style="font-family:Arial, sans-serif; font-size:24px; color:#1e3155; text-transform:uppercase; font-weight:normal; margin-top:4px;margin-bottom:0">Meet the MPA community</h2></td>
		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
	</tr>
	<tr>
		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
		<td width="770" colspan="2" valign="top"><?php
		$news->set_contenu("meetMPA_list","bloc.php");
		?></td>
		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
	</tr>
	<tr>
		<td valign="top" bgcolor="#CCCCCC" height="10"></td>
		<td valign="top" bgcolor="#ececec"></td>
		<td valign="top" bgcolor="#ececec"></td>
		<td valign="top" bgcolor="#CCCCCC"></td>
	</tr>
	<tr>
		<td width="150" colspan="2" valign="top" bgcolor="#CCCCCC">
		<img src="<?php echo $template;?>images/titre-gris.gif" width="150" height="44"/></td>
		<td width="635" valign="top" bgcolor="#ececec"><h2 style="font-family:Arial, sans-serif; font-size:24px; color:#1e3155; text-transform:uppercase; font-weight:normal; margin-top:4px;margin-bottom:0">Snapshot</h2></td>
		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
	</tr>
	<tr>
		<td width="15" height="5" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
		<td width="770" colspan="2" valign="top" bgcolor="#ececec"><?php
		$news->set_contenu("snapshot_list","bloc-tiny.php");
		?></td>
		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
	</tr>
	<tr>
		<td valign="top" bgcolor="#CCCCCC" height="10"></td>
		<td valign="top"></td>
		<td valign="top"></td>
		<td valign="top" bgcolor="#CCCCCC"></td>
	</tr>
	<tr>
		<td width="150" colspan="2" valign="top" bgcolor="#CCCCCC">
		<img src="<?php echo $template;?>images/titre-blanc.gif" width="150" height="44"/></td>
		<td width="635" valign="top"><h2 style="font-family:Arial, sans-serif; font-size:24px; color:#1e3155; text-transform:uppercase; font-weight:normal; margin-top:4px;margin-bottom:0">In other news…</h2></td>
		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
	</tr>
	<tr>
		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
		<td width="770" colspan="2" valign="top"><?php
		$news->set_contenu("inothernews_list","bloc.php");
		?></td>
		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
	</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
	<tr>
      <td bgcolor="#CCCCCC" width="15" valign="bottom"><img src="<?php echo $template;?>images/foot-g.png" width="15" height="13" /></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15" valign="bottom"><img src="<?php echo $template;?>images/foot-d.png" width="15" height="13" /></td>
   </tr>
    <tr>
      <td bgcolor="#e8e8e8">&nbsp;</td>
      <td bgcolor="#e8e8e8"><div id="footer" style="font-family:Verdana, Geneva, sans-serif;font-size:10px;color:#666;margin-top:20px; margin-left:15px; margin-rigth:15px; margin-bottom:30px;">
         <?php $news->set_footer();?>
       </div></td>
      <td bgcolor="#e8e8e8">&nbsp;</td>
   </tr>
</table>
</div>
</div>