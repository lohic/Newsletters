<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">
	<table width="800" border="0" cellspacing="0" cellpadding="0" background="#FFF">
  
    <tr>
        <td width="17" bgcolor="#CCCCCC">&nbsp;</td>
        <td colspan="2" align="center" bgcolor="#CCCCCC">
        <p style="color:#333333;font-size:10px;"><a name="haut" id="haut2"></a>Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#ff9900">cliquez ici</a></p>
        </td>
        <td width="17" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
    
    <tr>
        <td bgcolor="#ff9900" >&nbsp;</td>
        <td colspan="2" bgcolor="#ff9900" >&nbsp;</td>
        <td bgcolor="#ff9900" >&nbsp;</td>
    </tr>
    
    <tr>
        <td width="17" bgcolor="#ff9900" >&nbsp;</td>
        <td width="481" bgcolor="#ff9900" >
        <h1 style="margin:0;color:#FFF;font-size:30px;font-family:Arial, sans-serif;font-weight:normal;margin:0;">NOUVELLE PARUTION</h1>
        <p style="margin:0;color:#FFF;font-size:13px;text-transform:capitalize;">
        <?php 
        
        setlocale(LC_ALL, 'fr_FR');
        $timestamp_tab = explode('-',$ladate);
        $timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
        
        echo utf8_encode(strftime('%B %Y',$timestamp));
        
        ?>
        </p></td>
        <td width="272" align="right" bgcolor="#ff9900" ><img src="<?php echo $template;?>images/logo-ceri.gif" alt="Sciences Po | Ceri - CNRS" width="272" height="60" border="0" /></td>
        <td bgcolor="#ff9900" >&nbsp;</td>
    </tr>
    
    <tr bgcolor="#ff9900">
        <td width="17">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td width="17">&nbsp;</td>
    </tr>
    
    <tr>
        <td colspan="4" bgcolor="#CCCCCC" background="<?php echo $template;?>images/fond.jpg" >
			<?php $news->set_contenu("parution_list","bloc.php"); ?>
        </td>
    </tr>
    
  <tr>
    <td colspan="4" bgcolor="#494646" height="95"  >
    	<div style="font-size:14px;color:#ff9900;text-align:center">
        <?php $news->set_footer();?>
        </div>
      </td>
  </tr>
  
  <tr>
  	<td height="15" colspan="4" bgcolor="#494646"></td>
  </tr>
</table>
</div>
</div>