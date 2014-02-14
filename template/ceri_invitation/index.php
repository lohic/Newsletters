<div class="newsletter">
<div id="content" style="margin:auto;width:840px;">
	<table width="840" cellpadding="0" cellspacing="0" border="0">
    <tr>
    	<td colspan="2" align="center">
        <p style="color:#333333;font-size:10px;"><a name="haut" id="haut2"></a>Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#ff9900">cliquez ici</a></p>
  	  </td>
      </tr>
    <tr>
      <td width="343" height="190" background="<?php echo $template;?>images/top.jpg">&nbsp;</td>
      <td rowspan="4" align="left" valign="top" background="" bgcolor="#f0f0f0">
	  
	  <?php $news->set_contenu("invitations_list","bloc.php"); ?>
      <table width="497" border="0" cellspacing="0" cellpadding="0">
    <!--<tr>
        <td width="15" height="50"></td>
        <td height="50" colspan="3"><img src="<?php echo $template;?>images/CERI-60ans.gif" alt="Le CERI a soixante ans" width="467" height="50" border="0" /></td>
        <td width="15" height="50"></td>
    </tr>-->

        
        <tr>
            <td width="15" height="15"></td>
            <td height="15" colspan="3"></td>
            <td width="15" height="15"></td>
        </tr>    </table>
      
      </td>
    </tr>
    <tr>
      <td width="343" height="42" bgcolor="#FFFFFF" background="<?php echo $template;?>images/header-back.jpg"><img src="<?php echo $template;?>images/logo.jpg" alt="Le CERI" width="343" height="42" border="0" /><h1 style="margin:5px;font-weight:normal;text-transform:uppercase;font-size:20px;color:#BBB;"><?php echo $news->get_newsletter_info()->nom; ?></h1></td>
    </tr>
    <tr>
    	<td width="343" height="70"><img src="<?php echo $template;?>images/logo2.jpg" alt="Sciences Po | Ceri - CNRS" width="343" height="70" border="0" /></td>
   	  </tr>
    <tr>
      <td width="343" background="<?php echo $template;?>images/bottom.jpg">&nbsp;</td>
      </tr>
    
    
    </table>
	<p>&nbsp;</p>
</div>
</div>