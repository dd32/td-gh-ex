<?php
global $options;
foreach ($options as $value) {
    if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } } ?>

	 <?php if ($altop_bottombar_image == "1") { ?> <div id="bottombar" class="purple"> <?php } ?>
		<?php if ($altop_bottombar_image == "2") { ?> <div id="bottombar" class="grey"> <?php } ?>
			<?php if ($altop_bottombar_image == "0") { ?> <div id="bottombar" class="bot-color"> <?php } ?>	
				<?php if ($altop_bottombar_image == "") { ?> <div id="bottombar" class="purple"> <?php } ?>
	
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('bottombar') ) : ?>
		<?php endif; ?>
		
</div>