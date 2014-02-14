<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">

<table border="0" cellpadding="0" cellspacing="0" width="800">
	<tr>
    	<td align="right" bgcolor="#CCCCCC" height="20"><font style="font-family:Verdana, Geneva, sans-serif;color:#666;font-size:10px;margin-right:15px;">Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#009966;">cliquez ici</a></font></td>
    </tr>
	<tr>
    	<td><img src="<?php echo $template;?>images/header.png" width="800" height="100" alt="header" /></td>
    </tr>
	<tr>
    	<td>
        	<table border="0" cellpadding="0" cellspacing="0" height="25">
            	<tr>
                	<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
                	<td bgcolor="#FFFFFF" width="770" height="50"><h1 style="font-family:Arial, Helvetica, sans-serif;font-size:30px;font-weight:normal;color:#245f4f;margin-left:15px;display:inline;">Documentation et ressources</h1>
                	<h3 style="font-family:Arial, Helvetica, sans-serif;font-style:italic;font-weight:normal;font-size:18px;color:#245f4f;margin-left:10px;display:inline;">/ Documentation &amp; Resources</h3></td>
                 	<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
               </tr>
            </table>
      </td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
    <tr>
      <td><img src="<?php echo $template;?>images/Focus.png" width="280" height="45" alt="Focus" /></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
   </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
	<tr>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td>
	   <?php
	
		$news->set_contenu("focus_list","bloc_image.php");
		
		?>
	   </td>
      <td width="30">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
    <tr>
      <td><img src="<?php echo $template;?>images/Sites-Blogs.png" width="345" height="45" alt="Sites et blogs" /></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
   </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
	<tr>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td>
	   	<?php
	
		$news->set_contenu("sites_list","bloc_image.php");
		
		?>
           
       </td>
       <td width="30">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
    <tr>
      <td><img src="<?php echo $template;?>images/Actus.png" width="280" height="45" alt="Actualités" /></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
   </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
	<tr>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td>&nbsp;</td>
       <td width="30">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
	<tr>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td>
	   <?php
	
		$news->set_contenu("actualites_list","bloc_image.php");
		
		?>
	   </td>
      <td width="30">&nbsp;</td>
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
      <td bgcolor="#e8e8e8"><div id="footer" style="font-family:Verdana, Geneva, sans-serif;font-size:12px;color:#000;margin:5px 15px;">
         <?php $news->set_footer();?>
       </div></td>
      <td bgcolor="#e8e8e8">&nbsp;</td>
   </tr>
</table>

</div>
</div>