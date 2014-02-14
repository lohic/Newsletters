<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">

<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" width="800">
	<tr>
    	<td align="right" bgcolor="#CCCCCC" height="20"><font style="font-family:Verdana, Geneva, sans-serif;color:#666;font-size:10px;margin-right:15px;">Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#333;">cliquez ici</a></font></td>
    </tr>
	<tr>
    	<td><img src="<?php echo $template;?>images/header.jpg" width="800" height="90" alt="La lettre d'information sur l'évolution des systèmes d'information de la DFC | Sciences po - Formation continue" /></td>
    </tr>
	<tr>
    	<td>
        	<table border="0" cellpadding="0" cellspacing="0" height="25">
            	<tr>
                	<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
                	<td bgcolor="#FFFFFF" width="770">&nbsp;</td>
                 	<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
               </tr>
            </table>
      </td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" width="800">
	<tr>
      <td><img src="<?php echo $template;?>images/a-la-une.png" width="570" height="50" alt="À la une" /></td>
      <td bgcolor="#FFFFFF" width="30">&nbsp;</td>
      <td><img src="<?php echo $template;?>images/focus.png" width="200" height="50" alt="Focus" /></td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" width="800">
	<tr>
		<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
		<td bgcolor="#FFFFFF" width="15">&nbsp;</td>
		<td bgcolor="#FFFFFF" width="540"><?php
		$news->set_contenu("a_la_une_list","bloc.php");
		?></td>
		<td bgcolor="#FFFFFF" width="30">&nbsp;</td>
		<td bgcolor="#FFFFFF" width="185">
		<?php
		$news->set_contenu("focus_list","bloc-tiny.php");
		?>
		</td>
		<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
	</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
      <td><img src="<?php echo $template;?>images/agenda.png" width="570" height="50" alt="Agenda" /></td>
      <td bgcolor="#FFFFFF" width="30">&nbsp;</td>
      <td><img src="<?php echo $template;?>images/forum.png" width="200" height="50" alt="Forum" /></td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
		<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
		<td bgcolor="#FFFFFF" width="15">&nbsp;</td>
		<td bgcolor="#FFFFFF" width="540"><?php
		$news->set_contenu("agenda_list","bloc.php");
		?></td>
		<td bgcolor="#FFFFFF" width="30">&nbsp;</td>
		<td bgcolor="#FFFFFF" width="185">
		<?php
		$news->set_contenu("forum_list","bloc-tiny.php");
		?>
		</td>
		<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
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
      <td bgcolor="#e8e8e8"><div id="footer" style="font-family:Verdana, Geneva, sans-serif;font-size:10px;color:#666;margin:5px 15px;">
         <?php $news->set_footer();?>
       </div></td>
      <td bgcolor="#e8e8e8">&nbsp;</td>
   </tr>
</table>
</div>
</div>