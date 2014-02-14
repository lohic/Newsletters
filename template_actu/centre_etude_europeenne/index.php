
    <?php
    setlocale(LC_ALL, 'fr_FR');
    $timestamp_tab = explode('-',$info['date']);
    $timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
    ?>
    <?php if(isset($info['id'])){ ?>
    
    <style>
		ul.medialist li:before{
			content:url(<?php echo $templateFolder ?>/img/clip.png)" - ";	
		}
		ul.medialist li.jpg:before, ul.medialist li.gif:before, ul.medialist li.png:before, ul.medialist li.jpeg:before{
			content:url(<?php echo $templateFolder ?>/img/picture.png)" - ";	
		}
		ul.medialist li.pdf:before{
			content:url(<?php echo $templateFolder ?>/img/clip.png)" - ";	
		}
		ul.medialist li.doc:before{
			content:url(<?php echo $templateFolder ?>/img/doc_empty.png)" - ";	
		}
		ul.medialist li.xls:before{
			content:url(<?php echo $templateFolder ?>/img/chart_bar.png)" - ";	
		}
		ul.medialist li.vcard:before{
			content:url(<?php echo $templateFolder ?>/img/contact_card.png)" - ";	
		}
		ul.medialist li.mov:before, ul.medialist li.wmv:before, ul.medialist li.mp4:before{
			content:url(<?php echo $templateFolder ?>/img/movie.png)" - ";	
		}
		ul.medialist li.mp3:before, ul.medialist li.wav:before, ul.medialist li.aif:before{
			content:url(<?php echo $templateFolder ?>/img/music.png)" - ";	
		}
	</style>
    
    <div id="actu">
    <div id="header" style="background-image:url(<?php echo $templateFolder ?>/img/header.gif)">
    <h1>Centre d'histoire</h1>
    <p class="date"><?php echo strftime('%B %Y',$timestamp); ?></p>
    </div>
    
    <div id="content">
        <?PHP if(isset($info['image'])){?><img src='<?php echo '../actu_images/'.$info['id'].'/'.$info['image']; ?>' width="295"/><?php } ?>
        <h1><?php echo $info['titre']; ?></h1>
        <h2><?php echo $info['soustitre']; ?></h2>
        <div><?php echo $info['texte']; ?></div>
        <div class="reset"></div>
        <?php if(isset($info['URL'])){ ?>
        <p class="lien"><a href="<?php echo $info['URL']; ?>" target="_blank" >&gt; <?php if(isset($info['moreTXT'])){ echo $info['moreTXT']; }else{ echo 'En savoir plus';} ?></a></p>
        <?php } ?>
        <?php echo $info['medialiste']; ?>
        
    <?php }else{ ?>
    	
        <h1>L'actualité demandée n'existe pas.</h1>
    
	<?php } ?>
    </div>
    
    <div id="footer" style="background-image:url(<?php echo $templateFolder ?>/img/footer.gif)"></div>
</div>