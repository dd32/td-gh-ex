<?php
/*
** Template to Render Social Icons on Top Bar
*/
?>

<ul>
	<?php
	for ($i = 1; $i < 8; $i++) : 
		$social = esc_html(get_theme_mod('adviso_social_'.$i));
		$social_url = esc_url(get_theme_mod('adviso_social_url'.$i));
		if ( ($social != 'none') && ($social != '') && ($social_url !='' ) ) : ?>
		    
	            <li>
	                <a class="hvr-sweep-to-bottom" href="<?php echo $social_url; ?>">
	                    <i class="fa fa-fw fa-<?php echo $social; ?>"></i>
	                </a>
	            </li>
		<?php endif;
	
	endfor; ?>
</ul>