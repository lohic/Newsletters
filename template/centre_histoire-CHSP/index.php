	<table class="wrap" align="center" border="0" cellpadding="10" cellspacing="0" width="650">
    	<tbody>
        	<tr>
            	<td>
                <p style="font-family: georgia,serif;color:#333333;font-size:10px;text-align:center;"><a name="haut" id="haut2"></a>Si vous ne visualisez pas correctement la Newsletter, <a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html" style="color:rgb(201, 2, 95)">cliquez ici</a></p>
                </td>
            </tr>
         </tbody>
    </table>
    <table class="wrap" style="background-image: url(<?php echo $template?>img/bg.jpg); background-repeat: repeat; background-position: 50px 0pt; background-attachment: scroll;" align="center" bgcolor="#f7f7f7" border="0" cellpadding="10" cellspacing="0" width="650">
        <tbody>
            <tr>
                <td>
                	<img src="<?php echo $template?>img/logo-650.png" alt="CHSP, centre d'histoire de Sciences Po" width="650" />
                	<hr style="color:#7F7F7F;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" noshade="noshade" size="1" width="650" />
                    <table border="0" cellpadding="0" cellspacing="0" width="650">
                        <tbody>
                            <tr>
                            <td id="titre_entete" style="padding: 20px 0pt 0pt; color: rgb(201, 2, 95); font-style: normal; font-variant: normal; font-weight: normal; font-size: 44px; font-family: georgia,serif; line-height: normal; text-transform: uppercase;" valign="top" width="325">
                                    La lettre<br />
                                <span class="date" style="color:#000;font-size:30px;font-weight:normal;text-transform:none;">
                                <p style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;"><?php 
	
	setlocale(LC_ALL, 'fr_FR');
	$timestamp_tab = explode('-',$ladate);
	$timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
	
	echo utf8_encode(strftime('%B %Y',$timestamp));
	
	?></p>
                                </span></td>
                                <td id="sommaire" style="text-align: right; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; font-family: georgia,serif; line-height: normal; text-transform: uppercase; padding: 15px 0pt 0pt; margin: 0pt;" valign="top" width="300">
                                    <p style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:15px;margin-bottom:0;margin-right:0;margin-left:0;">
                                    <span class="item" style="color:#7f7f7f;background-color:#E6E6E6;padding-top:3px;padding-bottom:3px;padding-right:10px;padding-left:3px;">
                                    <a href="#agenda" style="text-decoration: none; color:#7F7F7F">01. L'agenda</a></span>
                                    </p>
                                    <p style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:15px;margin-bottom:0;margin-right:0;margin-left:0;">
                                    <span class="item" style="color:#7f7f7f;background-color:#E6E6E6;padding-top:3px;padding-bottom:3px;padding-right:10px;padding-left:3px;"><a href="#actualites" style="text-decoration: none; color:#7F7F7F">02. Les actualités</a></span>
                                    </p>
                                    <p style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:15px;margin-bottom:0;margin-right:0;margin-left:0;">
                                    <span class="item" style="color:#7f7f7f;background-color:#E6E6E6;padding-top:3px;padding-bottom:3px;padding-right:10px;padding-left:3px;"><a href="#publications" style="text-decoration: none; color:#7F7F7F">03. Les publications</a></span>
                                    </p>
                                    <p style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:15px;margin-bottom:0;margin-right:0;margin-left:0;">
                                    <span class="item" style="color:#7f7f7f;background-color:#E6E6E6;padding-top:3px;padding-bottom:3px;padding-right:10px;padding-left:3px;"><a href="#archives" style="text-decoration: none; color:#7F7F7F">04. Les archives</a></span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
              <td style="padding-top: 0pt;">
                	
                    <hr class="margeTop" style="color:#7F7F7F;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:20px;margin-bottom:0;margin-right:0;margin-left:0;" noshade="noshade" size="1" width="650" />
					<table border="0" cellpadding="0" cellspacing="0" height="163" width="650">
                        <tbody>
                            <tr>
                                <td class="fond_h1" colspan="3" style="background-color: rgb(230, 230, 230); color: rgb(127, 127, 127);" align="left" valign="top">
                                    <a name="agenda" id="agenda" ></a>
                                    <h1 style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;outline-color:0;font-style:normal;font-variant:normal;font-weight:normal;font-size:16px;font-family:georgia, serif;line-height:normal;width:300px;padding-top:3px;padding-bottom:5px;padding-right:0;padding-left:5px;">01. L'agenda</h1>
                                </td>
                            </tr>
                            <tr>
                              	<td class="paragraphe" align="left" valign="top" width="325"><?php $news->set_contenu("manifestation_1_list","bloc.php"); ?>
                           	    <p>&nbsp;</p></td>
                                <td class="paragraphe" align="left" valign="top" width="325"><?php $news->set_contenu("manifestation_2_list","bloc.php"); ?></td>
                            </tr>
                        </tbody>
                    </table>
                	
                    
                    
                    <!--<hr class="margeTop" style="color:#7F7F7F;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:20px;margin-bottom:0;margin-right:0;margin-left:0;" noshade="noshade" size="1" width="650" />
                    <table border="0" cellpadding="0" cellspacing="0" height="163" width="650">
                        <tbody>
                            <tr>
                                <td class="fond_h1" colspan="3" style="background-color: rgb(230, 230, 230); color: rgb(127, 127, 127);" align="left" valign="top">
                                    <a name="seminaires" id="seminaires" ></a>
                                    <h1 style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;outline-color:0;font-style:normal;font-variant:normal;font-weight:normal;font-size:16px;font-family:georgia, serif;line-height:normal;width:300px;padding-top:3px;padding-bottom:5px;padding-right:0;padding-left:5px;">02. Projets et séminiaires de recherches</h1>
                                </td>
                            </tr>
                            <tr>
                                <td class="paragraphe" align="left" valign="top" width="325"><?php //$news->set_contenu("projets_1_list","bloc.php"); ?></td>
                            	<td class="paragraphe" align="left" valign="top" width="325"><?php //$news->set_contenu("projets_2_list","bloc.php"); ?></td>
                            </tr>
                        </tbody>
                    </table>-->
                
                
                
                <hr class="margeTop" style="color:#7F7F7F;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:20px;margin-bottom:0;margin-right:0;margin-left:0;" noshade="noshade" size="1" width="650" />
                <table border="0" cellpadding="0" cellspacing="0" height="163" width="650">
                    <tbody>
                        <tr>
                            <td class="fond_h1" colspan="3" style="background-color: rgb(230, 230, 230); color: rgb(127, 127, 127);" align="left" valign="top">
                            	<a name="actualites" id="actualites" ></a>
                            	<h1 style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;outline-color:0;font-style:normal;font-variant:normal;font-weight:normal;font-size:16px;font-family:georgia, serif;line-height:normal;width:300px;padding-top:3px;padding-bottom:5px;padding-right:0;padding-left:5px;">02. Actualités</h1>
                            </td>
                        </tr>
                        <tr>
                            <td class="paragraphe" align="left" valign="top" width="325"><?php $news->set_contenu("actualites_1_list","bloc.php"); ?></td>
                            <td class="paragraphe" align="left" valign="top" width="325"><?php $news->set_contenu("actualites_2_list","bloc.php"); ?></td>
                        </tr>
                    </tbody>
                </table>
                
                
                <hr class="margeTop" style="color:#7F7F7F;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:20px;margin-bottom:0;margin-right:0;margin-left:0;" noshade="noshade" size="1" width="650" />
                <table border="0" cellpadding="0" cellspacing="0" height="163" width="650">
                    <tbody>
                        <tr>
                            <td class="fond_h1" colspan="3" style="background-color: rgb(230, 230, 230); color: rgb(127, 127, 127);" align="left" valign="top">
                            	<a name="publications" id="publications" ></a>
                            	<h1 style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;outline-color:0;font-style:normal;font-variant:normal;font-weight:normal;font-size:16px;font-family:georgia, serif;line-height:normal;width:300px;padding-top:3px;padding-bottom:5px;padding-right:0;padding-left:5px;">03. Publications</h1>
                            </td>
                        </tr>
                        <tr>
                            <td class="paragraphe" align="left" valign="top" width="325"><?php $news->set_contenu("publications_1_list","bloc.php"); ?></td>
                            <td class="paragraphe" align="left" valign="top" width="325"><p><?php $news->set_contenu("publications_2_list","bloc.php"); ?></td>
                        </tr>
                    </tbody>
                </table>
                
                
                <!--<hr class="margeTop" style="color:#7F7F7F;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:20px;margin-bottom:0;margin-right:0;margin-left:0;" noshade="noshade" size="1" width="650" />
                <table border="0" cellpadding="0" cellspacing="0" height="163" width="650">
                    <tbody>
                        <tr>
                            <td class="fond_h1" colspan="3" style="background-color: rgb(230, 230, 230); color: rgb(127, 127, 127);" align="left" valign="top">
                            	<a name="formation" id="formation" ></a>
                            	<h1 style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;outline-color:0;font-style:normal;font-variant:normal;font-weight:normal;font-size:16px;font-family:georgia, serif;line-height:normal;width:300px;padding-top:3px;padding-bottom:5px;padding-right:0;padding-left:5px;">05. Formations des doctorants</h1>
                            </td>
                        </tr>
                        <tr>
                            <td class="paragraphe" align="left" valign="top" width="325"><?php //$news->set_contenu("formations_1_list","bloc.php"); ?></td>
                            <td class="paragraphe" align="left" valign="top" width="325"><?php //$news->set_contenu("formations_2_list","bloc.php"); ?></td>
                        </tr>
                    </tbody>
                </table>
                
                
                <hr class="margeTop" style="color:#7F7F7F;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:20px;margin-bottom:0;margin-right:0;margin-left:0;" noshade="noshade" size="1" width="650" />
                <table border="0" cellpadding="0" cellspacing="0" height="163" width="650">
                    <tbody>
                        <tr>
                            <td class="fond_h1" colspan="3" style="background-color: rgb(230, 230, 230); color: rgb(127, 127, 127);" align="left" valign="top">
                            	<a name="candidature" id="candidature" ></a>
                            	<h1 style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;outline-color:0;font-style:normal;font-variant:normal;font-weight:normal;font-size:16px;font-family:georgia, serif;line-height:normal;width:300px;padding-top:3px;padding-bottom:5px;padding-right:0;padding-left:5px;">06. Appel à candidature</h1>
                            </td>
                        </tr>
                        <tr>
                            <td class="paragraphe" align="left" valign="top" width="325"><?php //$news->set_contenu("candidature_1_list","bloc.php"); ?></td>
                            <td class="paragraphe" align="left" valign="top" width="325"><?php //$news->set_contenu("candidature_2_list","bloc.php"); ?></td>
                        </tr>
                    </tbody>
                </table>
                
                <hr class="margeTop" style="color:#7F7F7F;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:20px;margin-bottom:0;margin-right:0;margin-left:0;" noshade="noshade" size="1" width="650" />
                <table border="0" cellpadding="0" cellspacing="0" height="163" width="650">
                    <tbody>
                        <tr>
                            <td class="fond_h1" colspan="3" style="background-color: rgb(230, 230, 230); color: rgb(127, 127, 127);" align="left" valign="top">
                            	<a name="divers" id="divers" ></a>
                            	<h1 style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;outline-color:0;font-style:normal;font-variant:normal;font-weight:normal;font-size:16px;font-family:georgia, serif;line-height:normal;width:300px;padding-top:3px;padding-bottom:5px;padding-right:0;padding-left:5px;">07. Divers</h1>
                            </td>
                        </tr>
                        <tr>
                            <td class="paragraphe" align="left" valign="top" width="325"><?php //$news->set_contenu("divers_1_list","bloc.php"); ?></td>
                            <td class="paragraphe" align="left" valign="top" width="325"><?php //$news->set_contenu("divers_2_list","bloc.php"); ?></td>
                        </tr>
                    </tbody>
                </table>-->
                
				<hr class="margeTop" style="color:#7F7F7F;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:20px;margin-bottom:0;margin-right:0;margin-left:0;" noshade="noshade" size="1" width="650" />
                <table border="0" cellpadding="0" cellspacing="0" height="163" width="650">
                    <tbody>
                        <tr>
                            <td class="fond_h1" colspan="3" style="background-color: rgb(230, 230, 230); color: rgb(127, 127, 127);" align="left" valign="top">
                            	<a name="archives" id="archives" ></a>
                            	<h1 style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;outline-color:0;font-style:normal;font-variant:normal;font-weight:normal;font-size:16px;font-family:georgia, serif;line-height:normal;width:300px;padding-top:3px;padding-bottom:5px;padding-right:0;padding-left:5px;">04. Les archives</h1>
                            </td>
                        </tr>
                        <tr>
                            <td class="paragraphe" align="left" valign="top" width="325"><?php $news->set_contenu("archives_1_list","bloc.php"); ?></td>
                            <td class="paragraphe" align="left" valign="top" width="325"><?php $news->set_contenu("archives_2_list","bloc.php"); ?></td>
                        </tr>
                    </tbody>
                </table>
                
                </td>
            </tr>
        </tbody>
    </table>
    <table id="footer" style="background-color: rgb(230, 230, 230);" align="center" cellpadding="0" cellspacing="0" height="30">
        <tbody>
            <tr>
                <td style="text-align: center; font-family: arial,sans-serif; font-size: 11px; color: rgb(179, 179, 179);" valign="middle" width="670"><?php $news->set_footer();?></td>
            </tr>
        </tbody>
</table>