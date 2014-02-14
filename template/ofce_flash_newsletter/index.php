<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">

<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
	<tr>
    	<td align="right" bgcolor="#CCCCCC" height="20"><font style="font-family:Verdana, Geneva, sans-serif;color:#666;font-size:10px;margin-right:15px;">Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#a7222b;">cliquez ici</a></font></td>
    </tr>
	<tr>
    	<td><img src="<?php echo $template;?>images/header.png" width="800" height="100" alt="header" /></td>
    </tr>
	<tr>
    	<td>
        	<table border="0" cellpadding="0" cellspacing="0" height="25" bgcolor="#FFFFFF">
            	<tr>
                	<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
                	<td bgcolor="#FFFFFF" width="770" height="50"><h1 style="font-family:Arial, Helvetica, sans-serif;font-size:30px;font-weight:normal;color:#a7222b;margin-left:15px;display:inline;">Événement</h1><h3 style="font-family:Arial, Helvetica, sans-serif;font-style:italic;font-weight:normal;font-size:18px;color:#a7222b;margin-left:10px;display:inline;">/ Event</h3></td>
                 	<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
               </tr>
            </table>
      </td>
    </tr>
</table>



<?php
	
$news->set_contenu("evenements_list","bloc.php");

?>

<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
	<tr>
      <td bgcolor="#CCCCCC" width="15" valign="bottom"><img src="<?php echo $template;?>images/foot-g.png" width="15" height="13" /></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15" valign="bottom"><img src="images/foot-d.png" width="15" height="13" /></td>
   </tr>
    <tr>
      <td bgcolor="#e8e8e8">&nbsp;</td>
      <td bgcolor="#e8e8e8"><div id="footer" style="font-family:Verdana, Geneva, sans-serif;font-size:12px;color:#000;margin:5px 15px;">
         <?php $news->set_footer();?>
       </div></td>
      <td bgcolor="#e8e8e8">&nbsp;</td>
   </tr>
</table>

</div>
</div>