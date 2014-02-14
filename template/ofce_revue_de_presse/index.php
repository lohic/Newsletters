<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">

<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
	<tr>
    	<td align="right" bgcolor="#CCCCCC" height="20"><font style="font-family:Verdana, Geneva, sans-serif;color:#666;font-size:10px;margin-right:15px;">Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#369;">cliquez ici</a></font></td>
    </tr>
	<tr>
    	<td><img src="<?php echo $template;?>images/header.png" width="800" height="100" alt="header" /></td>
    </tr>
	<tr>
    	<td>
        	<table border="0" cellpadding="0" cellspacing="0" height="25">
            	<tr>
                	<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
                	<td bgcolor="#FFFFFF" width="770" height="50"><h1 style="font-family:Arial, Helvetica, sans-serif;font-size:36px;font-weight:normal;color:#369;margin-left:15px;display:inline;">Revue de presse</h1>
                	<h3 style="font-family:Arial, Helvetica, sans-serif;font-style:italic;font-weight:normal;font-size:24px;color:#369;margin-left:10px;display:inline;">/ Press Review</h3></td>
                 	<td bgcolor="#CCCCCC" width="15">&nbsp;</td>
               </tr>
            </table>
      </td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
    <tr>
      <td><img src="<?php echo $template;?>images/Media.png" width="400" height="45" alt="OFCE dans les médias" /></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
   </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
    <tr>
      <td bgcolor="#CCCCCC" width="15"><font style="font-size:5px;">&nbsp;</font></td>
      <td bgcolor="#FFFFFF"><font style="font-size:5px;">&nbsp;</font></td>
      <td bgcolor="#FFFFFF"><font style="font-size:5px;">&nbsp;</font></td>
      <td bgcolor="#FFFFFF"><font style="font-size:5px;">&nbsp;</font></td>
      <td bgcolor="#CCCCCC" width="15"><font style="font-size:5px;">&nbsp;</font></td>
    </tr> <!--ligne blanche séparatrice -->
	<tr>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td>
           <?php
	
			$news->set_contenu("ofce_media_list","bloc.php");
					
			?>
      </td>
       <td width="30">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
    </tr>
    <tr height="30"> 
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
    </tr> <!--ligne blanche séparatrice -->
</table>

<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
    <tr>
      <td><img src="<?php echo $template;?>images/Entretiens-debats.png" width="450" height="45" alt="Entretiens et débats" /></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
   </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
    <tr>
      <td bgcolor="#CCCCCC" width="15"><font style="font-size:5px;">&nbsp;</font></td>
      <td bgcolor="#FFFFFF"><font style="font-size:5px;">&nbsp;</font></td>
      <td bgcolor="#FFFFFF"><font style="font-size:5px;">&nbsp;</font></td>
      <td bgcolor="#FFFFFF"><font style="font-size:5px;">&nbsp;</font></td>
      <td bgcolor="#CCCCCC" width="15"><font style="font-size:5px;">&nbsp;</font></td>
    </tr> <!--ligne blanche séparatrice -->
	<tr>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td>
           <?php
	
			$news->set_contenu("entretien_debats_list","bloc.php");
					
			?>
      </td>
       <td width="30">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
    </tr>
    <tr height="30"> 
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
    </tr> <!--ligne blanche séparatrice -->
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
    <tr>
      <td><img src="<?php echo $template;?>images/Publications.png" width="290" height="45" alt="Publications" /></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
   </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
    <tr>
      <td bgcolor="#CCCCCC" width="15"><font style="font-size:5px;">&nbsp;</font></td>
      <td bgcolor="#FFFFFF"><font style="font-size:5px;">&nbsp;</font></td>
      <td bgcolor="#FFFFFF"><font style="font-size:5px;">&nbsp;</font></td>
      <td bgcolor="#FFFFFF"><font style="font-size:5px;">&nbsp;</font></td>
      <td bgcolor="#CCCCCC" width="15"><font style="font-size:5px;">&nbsp;</font></td>
    </tr> <!--ligne blanche séparatrice -->
	<tr>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td>
           <?php
	
			$news->set_contenu("publications_list","bloc.php");
					
			?>
      </td>
       <td width="30">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
    </tr>
    <tr height="30"> 
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#CCCCCC" width="15">&nbsp;</td>
    </tr> <!--ligne blanche séparatrice -->
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