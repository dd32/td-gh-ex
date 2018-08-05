<?php
/*
** Template to Render Social Icons on Top Bar
*/
?>

<ul>
	<?php
	for ($i = 1; $i < 8; $i++) : 
		$social = esc_html(get_theme_mod('adviso_social_'.$i));
		if ( ($social != 'none') && ($social != '') ) : ?>
		    
	            <li>
	                <a class="hvr-sweep-to-bottom" href="<?php echo esc_url( get_theme_mod('adviso_social_url'.$i) ); ?>">
	                    <i class="fa fa-fw fa-<?php echo $social; ?>"></i>
	                </a>
	            </li>
		<?php endif;
	
	endfor; ?>
</ul>