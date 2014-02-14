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
        <h1 style="margin:0;color:#FFF;font-size:30px;font-family:Arial, sans-serif;font-weight:normal;">NEWSLETTER</h1>
        <p style="margin:0;color:#FFF;font-size:13px;text-transform:capitalize;">
        <?php 
        
        setlocale(LC_ALL, 'fr_FR');
        $timestamp_tab = explode('-',$ladate);
        $timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
        
        echo utf8_encode(strftime('%e %B %Y',$timestamp));
        
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
        
        <table width="800" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            <td width="15">&nbsp;</td>
            <td valign="top">
            <div style="background:#FFFFFF">
           	<h2 style="font-family:Arial, sans-serif;font-size:32px;margin:10px;font-weight:normal;color:#48494a;border-bottom:solid 1px #ff9900;padding-top:10px;">Édito</h2>
              <?php $news->set_contenu("edito_list","bloc_edito.php"); ?>
              </div>
              
              <h2 style="font-family:Arial, sans-serif;font-size:22px;margin:10px;margin-left:0px;font-weight:normal;color:#FFFFFF;">VIENT DE PARAÎTRE</h2>
              <div style="border-bottom:solid 3px #ff9900">
			  <?php $news->set_contenu("parution_list","bloc_paraitre.php"); ?>
              </div>
              <h2 style="font-family:Arial, sans-serif;font-size:22px;margin:10px;margin-left:0px;font-weight:normal;color:#FFFFFF;">COUP D'ŒIL</h2>
              <div style="border-bottom:solid 3px #ff9900">
			  <?php $news->set_contenu("coup_oeil_list","bloc.php"); ?>
              </div>
              <h2 style="font-family:Arial, sans-serif;font-size:22px;margin:10px;margin-left:0px;font-weight:normal;color:#FFFFFF;">BRÈVES</h2>
              <div style="border-bottom:solid 3px #ff9900">
              <?php $news->set_contenu("breves_list","bloc.php"); ?>
              </div></td>
            <td width="15"></td>
            <td width="190" valign="top">
            <h2 style="font-family:Arial, sans-serif;font-size:22px;margin:10px;margin-left:0px;font-weight:normal;color:#FFFFFF;">ÉVÉNEMENTS</h2>
            <div style="background:#FFF;border-bottom:solid #ff9900 3px;margin-bottom:30px">
            <?php $news->set_contenu("evenements_list","bloc_evenements.php"); ?>
            <div style="margin:0 15px;">
            <?php
             $inline['ul'] = 'padding:0; list-style-position:inside; list-style:none; text-transform:uppercase;';
			 $inline['li'] = '';
			
			$news->set_contenu("evenements_suite_list","bloc_evenements.php",0,"ET AUSSI...",$inline); ?>
            </div>
            </div>
            
            <h2 style="font-family:Arial, sans-serif;font-size:22px;margin:10px;margin-left:0px;font-weight:normal;color:#FFFFFF;">PUBLICATIONS</h2>
            <?php $news->set_contenu("publications_list","bloc_publications.php"); ?>
            
            </td>
            <td width="15"></td>
            </tr>
        
        	<tr>
        	  <td>&nbsp;</td>
        	  <td valign="top">&nbsp;</td>
        	  <td></td>
        	  <td valign="top">&nbsp;</td>
        	  <td></td>
      	  </tr>
        
        </table>
        
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