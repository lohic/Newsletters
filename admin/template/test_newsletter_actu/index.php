<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">
<table width="800px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" align="center" bgcolor="#ff0000"><span style="color:#FFF"><a name="haut" id="haut"></a>Si vous ne visualisez pas correctement la Newsletter, <a href="http://news.sciences-po.fr/archive-<?php echo $news->unique_id();?>.html" style="color:#000">cliquez ici</a></span></td>
  </tr>
  <tr>
    <td colspan="4"><img src="<?php $header = $news->get_header(); echo $header->image;?>" width="<?php echo $header->w;?>" height="<?php echo $header->h;?>" alt="Science Po" /></td>
    </tr>
  <!-- //////////////// -->
  <!-- BLOC DE MENU     -->
  <!-- //////////////// -->
  <tr>
    <td colspan="4" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/agenda.gif" width="196" height="30" alt="À vos agendas" /></td>
    </tr>
  <tr>
    <td colspan="4" valign="top">
	<?php
	
	$news->set_sommaire("actu_list",false);

	?>
	<!--
	<ul id="sommaire">
      <li>LE PRIX DU LIVRE JURIDIQUE</li>
      <li>CONFÉRENCE JEUNE POLITIQUE</li>
      <li>3 QUESTIONS À C. WELTER</li>
    </ul>-->
	NEWSLETTER ACTU</td>
    </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
    </tr>
  <!-- //////////////// -->
  <!-- FIN DE BLOC DE MENU     -->
  <!-- //////////////// -->


  <!-- //////////////// -->
  <!-- BLOC DE RUBRIQUE     -->
  <!-- //////////////// -->
  <tr>
    <td height="3" colspan="4" bgcolor="#262626"></td>
    </tr>
  <tr>
    <td width="240" align="right" bgcolor="#FFFFFF"><img src="<?php echo $template;?>images/agenda_N.gif" width="240" height="27" alt="La une" /></td>
    <td width="240" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td width="240" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>

  <tr>
    <td height="20" colspan="4" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <!-- //////////////// -->
  <!-- FIN DE BLOC DE RUBRIQUE     -->
  <!-- //////////////// -->


<tr>
    <td colspan="4" bgcolor="#FFFFFF"><div style="margin:0 40px;">
	<?php
	
	$news->set_contenu("evenements_list","event_bloc.php");
	
	?></div>
</td>
</tr>

<tr>
    <td colspan="4" bgcolor="#CCCCCC"><div style="margin:0 40px;">blabnlablaalb</div></td>
</tr>

<tr>
    <td colspan="4" bgcolor="#FFFFFF"><div style="margin:0 40px;">
	<?php
	
	$news->set_contenu("actu_list","event_bloc.php");
	
	?></div>
</td>
</tr>

	
  <tr>
    <td height="20" colspan="4" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <td height="40" colspan="4" align="right" valign="middle"><a href="#haut" style="color:#333; text-decoration:none"><img src="<?php echo $template;?>images/up.gif" alt="up" width="13" height="13" border="0" />Retour haut de page</a></td>
   </tr>
  <tr>
    <td height="70" colspan="4" align="center" valign="bottom">La newsletter est une publication de la direction de la communication de Science Po<br />
      <strong>Contact rédaction :</strong> <a href="mailto:newsletter@sciences-po.fr">newsletter@sciences-po.fr</a><br />
      <strong>Rédacteur en chef :</strong> Medhi Hamadi, <a href="mailto:medhi.hamadi@sciences-po.fr">medhi.hamadi@sciences-po.fr</a><br />
      <strong>Responsable de la publication :</strong> Cyril Delhay, Directeur de la Communication</td>
    </tr>
</table>
</div>
</div>