<div class="newsletter">
<div id="content" style="margin:auto;width:800px;">
  <table width="800" border="0" cellspacing="0" cellpadding="0" background="#FFF">
    <tr>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
    <td align="right" bgcolor="#CCCCCC"><span style="color:#333333;font-size:10px;"><a name="haut" id="haut2"></a>Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:#006766">cliquez ici</a></span></td>
    <td width="15" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="3" bgcolor="#FFFFFF" background="<?php $header = $news->get_header("header.gif"); echo $header->image;?>" height="<?php echo $header->h;?>" ></td>
  </tr>
    <tr>
    	<td bgcolor="#CCCCCC">&nbsp;</td>
    	<td height="15" bgcolor="#FFFFFF">&nbsp;</td>
    	<td bgcolor="#CCCCCC">&nbsp;</td>
    	</tr>
  <tr>
  	<td colspan="3" bgcolor="#CCCCCC"><?php
	
	$news->set_contenu("flash_list","post_bloc.php");
	
	?></td>
  	</tr>
  <tr>
  	<td width="15" bgcolor="#CCCCCC">&nbsp;</td>
  	<td bgcolor="#FFFFFF">&nbsp;</td>
  	<td width="15" bgcolor="#CCCCCC">&nbsp;</td>
  	</tr>
  <tr>
    <td colspan="3" bgcolor="#FFFFFF" background="<?php echo $template;?>images/foot.gif" height="95"  >
    	<div style="padding:10px 30px;font-size:10px;">
        <?php $news->set_footer();?>
        </div>
      </td>
  </tr>
  <tr>
  	<td height="50" colspan="3" bgcolor="#CCCCCC">
    </td>
  </tr>
</table>
</div>
</div>