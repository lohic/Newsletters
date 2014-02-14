<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">

<table border="0" cellpadding="0" cellspacing="0"  bgcolor="#FFFFFF">
	<tr>
    	<td align="right" bgcolor="#CCCCCC" height="20"><font style="font-family:Arial, Helvetica, sans-serif;color:#333;font-size:12px;">Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="font-family:Arial, Helvetica, sans-serif;color:#333;font-size:12px;">cliquez ici</a></font></td>
    </tr>
	<tr>
    	<td><a id="top" name="top"></a><img src="<?php echo $template;?>images/header.jpg" width="800" height="140" alt="Sciencespo | Flash événements partenaires" /></td>
    </tr>
	<tr>
    	<td bgcolor="#262626" height="3"><font style="font-size:5px;">&nbsp;</font></td>
    </tr>
	<tr>
    	<td>
        	<table border="0" cellpadding="0" cellspacing="0">
            	<tr>
                	<td width="40">&nbsp;</td>
                	<td><img src="<?php echo $template;?>images/titre.png" width="240" height="27" alt="À vos agendas !" /></td>
                 	<td>&nbsp;</td>
               </tr>
            	<tr>
                	<td width="40">&nbsp;</td>
                	<td>&nbsp;</td>
                 	<td>&nbsp;</td>
               </tr>
            </table>
      </td>
    </tr>
</table>
<?php
$news->set_contenu("agenda_list","bloc-image.php");
?><table border="0" cellpadding="0" cellspacing="0" width="800"  bgcolor="#FFFFFF">
	<tr>
    	<td>&nbsp;</td>
    </tr>
	<tr>
    	<td align="right" bgcolor="#e7e7e7" height="50"><font style="font-family:Arial, Helvetica, sans-serif;color:#333;font-size:12px;"><a href="#top" style="border:0;text-decoration:none;color:#333;"><img src="<?php echo $template;?>images/top.png" width="11" height="11" alt="top" /> Retour haut de page</a></font></td>
    </tr>
	<tr>
    	<td align="center" bgcolor="#e7e7e7"><font style="font-family:Arial, Helvetica, sans-serif;color:#333;font-size:12px;">
		<?php $news->set_footer();?>
        </font></td>
    </tr>
</table>
</div>
</div>