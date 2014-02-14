<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" width="710">
    <tr>
        <td width="130" valign="top">
        	<p style="font-family:Verdana, Geneva, sans-serif;font-size:11px;color:#336699;margin:0;"><?php echo $date?></p>
        </td>
        <td width="10">&nbsp;</td>
        <td valign="top">
        	<h2 style="font-family:Verdana, Geneva, sans-serif;font-size:11px;color:#333333;margin:0;font-weight:normal;"><a href="<?php echo $linkToActu ? $itemURL : $URL;?>" target="_blank"><?php echo $titre?></a><?php if($origine == "rss"){ ?> par <?php echo $texte;?><?php } ?></h2>
        </td>
    </tr>
</table>