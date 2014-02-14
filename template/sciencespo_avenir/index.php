<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">

<table border="0" cellpadding="0" cellspacing="0" width="800">
	<tr>
    	<td align="right" bgcolor="#CCCCCC" height="20"><font style="font-family:Verdana, Geneva, sans-serif;color:#666;font-size:10px;">Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#333;">cliquez ici</a></font></td>
    </tr>
	<tr>
    	<td></td>
    </tr>
	<tr>
    	<td>
        	<table border="0" cellpadding="0" cellspacing="0" height="25">
            	<tr>
            		<td width="800" bgcolor="#ca0519"><img src="<?php $header = $news->get_header("header.jpg"); echo $header->image;?>" width="800" alt="Sciences po  avenir | Flash info" /></td>
            		</tr>
            	<tr>
                	<td bgcolor="#ca0519"><img src="<?php echo $template;?>images/header-bottom.png" width="800" height="15"/></td>
                	</tr>
            </table>
      </td>
    </tr>
</table>
<?php
$news->set_contenu("actualite_list","bloc.php");
?>
<table border="0" cellpadding="0" cellspacing="0" width="800">
	<tr>
		<td bgcolor="#CCCCCC" width="15" valign="bottom">
			<img src="<?php echo $template;?>images/foot-g.png" width="15" height="13" />
		</td>
		<td bgcolor="#FFFFFF">&nbsp;</td>
		<td bgcolor="#CCCCCC" width="15" valign="bottom">
			<img src="<?php echo $template;?>images/foot-d.png" width="15" height="13" />
		</td>
	</tr>
	<tr>
		<td bgcolor="#e8e8e8">&nbsp;</td>
		<td bgcolor="#e8e8e8">
			<div id="footer" style="font-family:Verdana, Geneva, sans-serif;font-size:10px;color:#666;margin:5px 15px;">
				<?php $news->set_footer();?>
			</div>
		</td>
		<td bgcolor="#e8e8e8">&nbsp;</td>
	</tr>
</table>

</div>
</div>