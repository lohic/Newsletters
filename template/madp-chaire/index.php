<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFFFFF">
	<tr>
    	<td align="right" bgcolor="#CCC" height="20"><font style="font-family:Verdana, Geneva, sans-serif;color:#666;font-size:10px;margin-right:15px;">Si vous ne visualisez pas correctement le Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#660099;">cliquez ici</a></font></td>
    </tr>
	<tr>
    	<td><img src="<?php echo $template;?>images/header1.jpg" width="490" height="100" alt="La lettre de la Chaire" /><img src="<?php echo $template;?>images/header2.jpg" width="170" height="100" alt="Sciences Po" /><img src="<?php echo $template;?>images/header3.jpg" width="140" height="100" alt="Chaire M.A.D.P" /></td>
    </tr>
	<tr>
    	<td>
        	<table border="0" cellpadding="0" cellspacing="0" height="25">
            	<tr>
                	<td bgcolor="#CCC" width="15">&nbsp;</td>
                	<td bgcolor="#fff" width="770" height="50"><h1 style="font-family:Arial, Helvetica, sans-serif;font-size:30px;font-weight:normal;color:#660099;margin-left:15px;display:inline;">Edito</h1></td>
                 	<td bgcolor="#CCC" width="15">&nbsp;</td>
               </tr>
            	<tr>
                	<td bgcolor="#CCC" width="15">&nbsp;</td>
                	       <td><?php $news->set_contenu("edito_list","edito_bloc.php"); ?></td>

                 	<td bgcolor="#CCC" width="15">&nbsp;</td>
               </tr>
            </table>
      </td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFF">
    <tr>
      <td bgcolor="#FFF"><img src="<?php echo $template;?>images/Manif.png" width="285" height="45" alt="Manifestations" /></td>
      <td bgcolor="#FFF">&nbsp;</td>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
   </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFF">
	<tr>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td>
       	<?php $news->set_contenu("manifestations_list","une_bloc.php"); ?>
       </td>
       <td width="30">&nbsp;</td>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#CCC" width="15" height="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td>&nbsp;</td>
      <td width="30">&nbsp;</td>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFF">
    <tr>
      <td bgcolor="#FFF"><img src="<?php echo $template;?>images/Equipe.png" width="285" height="45" alt="L'équipe et ses invités" /></td>
      <td bgcolor="#fff">&nbsp;</td>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
   </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFF">
	<tr>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td><?php $news->set_contenu("equipe_list","une_bloc.php"); ?></td>
       <td width="30">&nbsp;</td>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
    </tr>
    
    <tr>
      <td bgcolor="#CCC" width="15" height="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td>&nbsp;</td>
      <td width="30">&nbsp;</td>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFF">
    <tr>
      <td bgcolor="#FFF"><img src="<?php echo $template;?>images/Paraitre.png" width="285" height="45" alt="Vient de paraître" /></td>
      <td bgcolor="#fff">&nbsp;</td>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
   </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFF">
	<tr>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td><?php $news->set_contenu("vient_paraitre_list","une_bloc.php"); ?></td>
       <td width="30">&nbsp;</td>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
    </tr>
	<tr>
      <td bgcolor="#CCC" width="15" height="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td>&nbsp;</td>
      <td width="30">&nbsp;</td>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFF">
    <tr>
      <td><img src="<?php echo $template;?>images/Focus.png" width="285" height="45" alt="Focus" /></td>
      <td bgcolor="#fff">&nbsp;</td>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
   </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFF">
	<tr>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td><?php $news->set_contenu("focus_list","une_bloc.php"); ?></td>
       <td width="30">&nbsp;</td>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
    </tr>
	<tr>
      <td bgcolor="#CCC" width="15" height="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td>&nbsp;</td>
      <td width="30">&nbsp;</td>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFF">
    <tr>
      <td bgcolor="#FFF"><img src="<?php echo $template;?>images/Opportunites.png" width="285" height="45" alt="Opportunités" /></td>
      <td bgcolor="#fff">&nbsp;</td>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
   </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFF">
	<tr>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td><?php $news->set_contenu("opportunites_list","une_bloc.php"); ?></td>
       <td width="30">&nbsp;</td>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
       <td width="30">&nbsp;</td>
       <td>&nbsp;</td>
       <td width="30">&nbsp;</td>
      <td bgcolor="#CCC" width="15">&nbsp;</td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#FFF">
    <tr>
      <td bgcolor="#CCC" width="15" valign="bottom"><img src="<?php echo $template;?>images/foot-g.png" width="15" height="13" /></td>
      <td bgcolor="#fff">&nbsp;</td>
      <td bgcolor="#CCC" width="15" valign="bottom"><img src="<?php echo $template;?>images/foot-d.png" width="15" height="13" /></td>
   </tr>
    <tr>
      <td bgcolor="#e8e8e8">&nbsp;</td>
      <td bgcolor="#e8e8e8"><div id="footer" style="font-family:Verdana, Geneva, sans-serif;font-size:12px;color:#000;margin:5px 15px;">
         <?php $news->set_footer();?>
       </div></td>
      <td bgcolor="#e8e8e8">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#e8e8e8" height="10">&nbsp;</td>
      <td bgcolor="#e8e8e8">&nbsp;</td>
      <td bgcolor="#e8e8e8">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#CCC" height="20">&nbsp;</td>
      <td bgcolor="#CCC">&nbsp;</td>
      <td bgcolor="#CCC">&nbsp;</td>
   </tr>
</table>
</div>
</div>