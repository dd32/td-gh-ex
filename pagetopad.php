			<?php 
			$d5smartiaoption = get_option('d5smartia_theme_options'); 
			if ( $d5smartiaoption['d5smartia_pagetopad'] != null ) :
			echo $d5smartiaoption['d5smartia_pagetopad'];
			else: ?>
			<img src="<?php echo get_template_directory_uri(); ?>/images/pagetopad.jpg" alt="Your 728 X 90 Ad Code"/>
			<?php endif; ?>

