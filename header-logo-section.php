<!-- Logo goes here -->
	<div class="container">
		<div class="row">
		<?php ?>
		<?php $current_options=get_option('elegance_lite_options'); ?>
		<?php if($current_options['logo_section_settings']=='on') { ?>
			<div class="site-logo">
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="elegance">
				<?php
					if($current_options['text_title'] =="on")
					{ echo "<div class=elegance_title_head>" . get_bloginfo( ). "</div>"; }
					else if($current_options['upload_image_logo']!='') 
					{ ?>
					<img src="<?php echo esc_url($current_options['upload_image_logo']); ?>" style="height:<?php if($current_options['height']!='') { echo esc_html($current_options['height']); } ?>px; width:<?php if($current_options['width']!='') { echo esc_html($current_options['width']); } ?>px;" alt="logo" />
					<?php } ?>
				</a></h1>
			</div>
		</div>
	<?php } ?>	
	</div>
<!-- /Logo goes here -->