<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">
<table width="800px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center" bgcolor="#ff0000"><span style="color:#FFF"><a name="haut" id="haut"></a>Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#000">cliquez ici</a></span></td>
  </tr>
  <tr>
    <td colspan="3"><img src="<?php $header = $news->get_header(); echo $header->image;?>" width="<?php echo $header->w;?>" height="<?php echo $header->h;?>" alt="Science Po" /></td>
    </tr>
  <!-- //////////////// -->
  <!-- BLOC DE MENU     -->
  <!-- //////////////// -->
  <tr>
	<td width="240" valign="top" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/a_la_une.gif" width="240" height="30" alt="À vos agendas" /></td>
	<td width="240" valign="top" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/vie_pedagorouge.jpg" width="240" height="30" alt="À vos agendas" /></td>
	<td width="240" valign="top" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/vie_scientifiqrouge.jpg" width="240" height="30" alt="À vos agendas" /></td>
	</tr>
  <tr>
    <td width="240" valign="top">
	<?php
	
	$news->set_sommaire("une_list",false);

	?>
	</td>
    <td width="240" valign="top"><?php
	
	$news->set_sommaire("vie_pedagogique_list",false);

	?></td>
    <td width="240" valign="top"><?php
	
	$news->set_sommaire("vie_scientifique_list",false);

	?></td>
    </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    </tr>
  <!-- //////////////// -->
  <!-- FIN DE BLOC DE MENU     -->
  <!-- //////////////// -->


  <!-- //////////////// -->
  <!-- BLOC DE RUBRIQUE     -->
  <!-- //////////////// -->
  <tr>
    <td height="3" colspan="3" bgcolor="#262626"></td>
    </tr>
  <tr>
    <td colspan="3" bgcolor="#FFFFFF"><div style="margin:0 40px;"><img src="<?php echo $template;?>images/rub_a_la_une.gif" width="240" height="27" alt="À la une" /></div></td>
    </tr>

  <tr>
    <td height="20" colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <!-- //////////////// -->
  <!-- FIN DE BLOC DE RUBRIQUE     -->
  <!-- //////////////// -->


<tr>
    <td colspan="3" bgcolor="#FFFFFF"><div style="margin:0 40px;">
	<?php
	
	$news->set_contenu("une_list","event_bloc.php");
	
	?></div>
</td>
</tr>

<tr>
    <td height="20" colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <td height="40" colspan="3" align="right" valign="middle"><a href="#haut" style="color:#333; text-decoration:none"><img src="<?php echo $template;?>images/up.gif" alt="up" width="13" height="13" border="0" />Retour haut de page</a></td>
   </tr>
  <tr>
<tr>
    <td height="3" colspan="3" bgcolor="#262626"></td>
    </tr>
<tr>
    <td colspan="3" bgcolor="#FFFFFF"><div style="margin:0 40px;"><img src="<?php echo $template;?>images/vie_pedagoblanc.jpg" width="240" height="30" alt="Sciences Po et vous" /></div></td>
    </tr>

<tr>
    <td height="20" colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>

<tr>
    <td colspan="3" bgcolor="#FFFFFF"><div style="margin:0 40px;">
	<?php
	
	$news->set_contenu("vie_pedagogique_list","event_bloc.php");
	
	?></div>
</td>
</tr>



<tr>
    <td height="20" colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <td height="40" colspan="3" align="right" valign="middle"><a href="#haut" style="color:#333; text-decoration:none"><img src="<?php echo $template;?>images/up.gif" alt="up" width="13" height="13" border="0" />Retour haut de page</a></td>
   </tr>
  <tr>
<tr>
    <td height="3" colspan="3" bgcolor="#262626"></td>
    </tr>
<tr>
    <td colspan="3" bgcolor="#FFFFFF"><div style="margin:0 40px;"><img src="<?php echo $template;?>images/vie_scientifiqblanc.jpg" width="240" height="30" alt="La vie académique et vous" /></div></td>
    </tr>
<tr>
    <td height="20" colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>

<tr>
    <td colspan="3" bgcolor="#FFFFFF"><div style="margin:0 40px;">
	<?php
	
	$news->set_contenu("vie_scientifique_list","event_bloc.php");
	
	?></div>
</td>
</tr>

	
  <tr>
    <td height="20" colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <td height="40" colspan="3" align="right" valign="middle"><a href="#haut" style="color:#333; text-decoration:none"><img src="<?php echo $template;?>images/up.gif" alt="up" width="13" height="13" border="0" />Retour haut de page</a></td>
   </tr>
  <tr>
    <td height="70" colspan="3" align="center" valign="bottom"><strong>Enseigner à Sciences Po</strong> est une publication de la Communication de Sciences Po<br />
      <strong>Contact rédaction :</strong> <a href="mailto:actu@sciences-po.fr">actu@sciences-po.fr</a><br />
      <strong>Responsable de la publication :</strong> Cyril Delhay, Directeur de la Communication</td>
    </tr>
</table>
</div>
</div>