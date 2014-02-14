<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">
	<table width="800" border="0" cellspacing="0" cellpadding="0" background="#FFF">
	<tr>
		<td width="15" bgcolor="#CCCCCC"></td>
		<td colspan="4" align="right" bgcolor="#CCCCCC"><div style="color:#4c4c4c;font-size:10px;margin:5px 0px;"><a name="haut" id="haut2"></a>Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#0947a3">cliquez ici</a></div></td>
		<td width="15" bgcolor="#CCCCCC"></td>
	</tr>
	
    <tr>
      <td height="100" colspan="6" valign="top" bgcolor="#0947a3" background="<?php echo $template;?>images/header2.gif" >
	  <p style="margin-right:30px;padding-top:0px;color:#0947a3;font-size:12px;text-transform:uppercase; text-align:right"><?php 
	if(isset($ladate)){
	setlocale(LC_ALL, 'fr_FR');
	$timestamp_tab = explode('-',$ladate);
	$timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
	
		echo utf8_encode(strftime('%e %B %Y',$timestamp));
	}else{
		echo '&nbsp;';	
	}
	?></p>
	<p style="margin-right:30px;padding-top:25px;color:#4c4c4c;font-size:12px; text-align:right">Follow us on <a href="http://www.facebook.com/sciencespo" title="Compte Facebook de Sciences Po"><img src="<?php echo $template;?>images/icone-facebook.gif" width="16" height="16" alt="facebook" /></a> <a href="http://twitter.com/#!/sciencespo" title="Flux Twitter de Sciences Po"><img src="<?php echo $template;?>images/icone-twitter.gif" width="16" height="16" alt="twitter" /></a> <a href="http://www.sciencespo.fr/chaire-sante/fr/rssnews" title="Flux RSS des actualités du site Chaire Santé"><img src="<?php echo $template;?>images/icone-rss.gif" width="16" height="16" alt="rss feed" /></a></p>
	</td>
    </tr>
    <tr>
      <td width="15" 	height="15" bgcolor="#CCCCCC"></td>
      <td width="20" 	height="15" bgcolor="#FFFFFF"></td>
      <td width="234" 	height="15" valign="top" bgcolor="#FFFFFF"></td>
      <td width="1" 	height="15" valign="top" bgcolor="#FFFFFF"></td>
      <td width="515" height="15" valign="top" bgcolor="#FFFFFF"></td>
      <td width="15"  height="15" bgcolor="#CCCCCC"></td>
    </tr>
  <tr>
    <td colspan="3" valign="top" background="<?php echo $template;?>images/back-left.gif" bgcolor="#FFFFFF"><table width="269" border="0" cellspacing="0" cellpadding="0">
    	<tr>
    		<td width="55" colspan="2" valign="top"><img src="<?php echo $template;?>images/rub-left.gif" width="55" height="40" border="0" /></td>
    		<td valign="top"><h1 style="margin:5px 0 0 10px ;color:#0947a3;font-size:20px;padding-top:0px;font-weight:normal;">BILLET D'ACTU</h1></td>
    		</tr>
    	<tr>
    		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
    		<td width="40" valign="top">&nbsp;</td>
    		<td colspan="1" valign="top"><?php $news->set_contenu("actualite_list","mini_bloc.php"); ?></td>
    		</tr>
    	<tr>
    		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
    		<td width="40" valign="top">&nbsp;</td>
    		<td colspan="1" valign="top">&nbsp;</td>
    		</tr>
    	<tr>
    		<td width="55" colspan="2" valign="top"><img src="<?php echo $template;?>images/rub-left.gif" width="55" height="40" border="0" /></td>
    		<td valign="top"><h1 style="margin:5px 0 0 10px ;color:#0947a3;font-size:20px;padding-top:0px;font-weight:normal;">FOCUS</h1></td>
    		</tr>
    	<tr>
    		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
    		<td width="40" valign="top">&nbsp;</td>
    		<td colspan="1" valign="top"><?php $news->set_contenu("focus_list","mini_bloc.php"); ?></td>
    		</tr>
    	<tr>
    		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
    		<td width="40" valign="top">&nbsp;</td>
    		<td colspan="1" valign="top">&nbsp;</td>
    		</tr>
    	</table></td>
    <td width="1" valign="top" bgcolor="#BBBBBB"></td>
    
    <td colspan="2" valign="top" background="<?php echo $template;?>images/back-right.gif" bgcolor="#FFFFFF" >
	
	<table width="530" border="0" cellspacing="0" cellpadding="0">
    	<tr>
    		<td height="40" colspan="2" align="right" valign="top"><h1 style="margin:5px 10px 0 0 ;color:#0947a3;font-size:20px;padding-top:0px;font-weight:normal;">À LA UNE</h1></td>
    		<td width="55" height="40" colspan="3" align="right" valign="top"><img src="<?php echo $template;?>images/rub-right.gif" width="55" height="40" border="0" /></td>
    		</tr>
    	<tr>
    		<td valign="top">&nbsp;</td>
    		<td valign="top"><?php
	
	$news->set_contenu("une_list","post_bloc.php");
		
	?></td>
    		<td width="25" valign="top">&nbsp;</td>
    		<td width="17" valign="top">&nbsp;</td>
    		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
    		</tr>
    	<tr>
    		<td colspan="2" valign="top">&nbsp;</td>
    		<td width="25" valign="top">&nbsp;</td>
    		<td width="17" valign="top">&nbsp;</td>
    		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
    		</tr>
    	<tr>
    		<td colspan="2" align="right" valign="top"><h1 style="margin:5px 10px 0 0 ;color:#0947a3;font-size:20px;padding-top:0px;font-weight:normal;">VIENT DE PARAÎTRE</h1></td>
    		<td colspan="3" align="right" valign="top"><img src="<?php echo $template;?>images/rub-right.gif" width="55" height="40" border="0" /></td>
    		</tr>
    	<tr>
    		<td valign="top">&nbsp;</td>
    		<td valign="top"><?php
	
	$news->set_contenu("parution_list","post_bloc.php");
		
	?></td>
    		<td width="25" valign="top">&nbsp;</td>
    		<td valign="top">&nbsp;</td>
    		<td valign="top" bgcolor="#CCCCCC">&nbsp;</td>
    		</tr>
    	<tr>
    		<td width="383" colspan="2" valign="top">&nbsp;</td>
    		<td width="25" valign="top">&nbsp;</td>
    		<td width="17" valign="top">&nbsp;</td>
    		<td width="15" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
    		</tr>
    	</table></td>
    </tr>
  
  <tr>
    <td width="15" 	bgcolor="#CCCCCC"></td>
    <td width="20" 	bgcolor="#FFFFFF"></td>
    <td width="234" bgcolor="#FFFFFF"></td>
    <td width="1" 	bgcolor="#FFFFFF"></td>
    <td bgcolor="#FFFFFF"></td>
    <td width="15" 	bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6" bgcolor="#FFFFFF" background="<?php echo $template;?>images/foot.gif" height="15"  >&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6" bgcolor="#e8e8e8" height="80"  >
    	<div style="padding:10px 30px 10px;font-size:12px;">
        <?php $news->set_footer();?>
        </div>
      </td>
  </tr>
  <tr>
  	<td height="50" colspan="6" bgcolor="#CCCCCC">
    </td>
  </tr>
</table>
</div>
</div>
