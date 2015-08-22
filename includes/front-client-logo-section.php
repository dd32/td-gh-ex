<?php $_client_logo_path = get_template_directory_uri().'/images/clients-logo/'; ?>
<div id="full-client-box" class="skt-section">
	<div class="container">
		<div class="row-fluid">
			<?php if(sketch_get_option($advertica_shortname."_clientsec_title")){?><h3 class="inline-border"><?php echo sketch_get_option($advertica_shortname."_clientsec_title"); ?></h3><span class="border_left"></span><?php } ?>
			<ul class="clients-items clearfix">
				<?php if(sketch_get_option($advertica_shortname.'_img1_icon')){ ?>
					<li class="span2"><a href="<?php if(sketch_get_option($advertica_shortname.'_img1_link')){ echo esc_url(sketch_get_option($advertica_shortname.'_img1_link','advertica-lite')); } ?>" title="<?php if(sketch_get_option($advertica_shortname.'_img1_title')){ echo sketch_get_option($advertica_shortname.'_img1_title','advertica-lite'); } ?>"><img alt="client-logo" src="<?php if(sketch_get_option($advertica_shortname.'_img1_icon')){ echo sketch_get_option($advertica_shortname.'_img1_icon','advertica-lite'); } ?>"></a></li>
				<?php } else { ?>
					<li class="span2"><a href="JavaScript:void(0);" title="<?php _e('Client Logo', 'advertica-lite'); ?>"><img alt="<?php _e('Client Logo', 'advertica-lite'); ?>" src="<?php echo $_client_logo_path.'client-logo1.png'; ?>"></a></li>
				<?php } ?>

				<?php if(sketch_get_option($advertica_shortname.'_img2_icon')){ ?>
					<li class="span2"><a href="<?php if(sketch_get_option($advertica_shortname.'_img2_link')){ echo esc_url(sketch_get_option($advertica_shortname.'_img2_link','advertica-lite')); } ?>" title="<?php if(sketch_get_option($advertica_shortname.'_img2_title')){ echo sketch_get_option($advertica_shortname.'_img2_title','advertica-lite'); } ?>"><img alt="client-logo" src="<?php if(sketch_get_option($advertica_shortname.'_img2_icon')){ echo sketch_get_option($advertica_shortname.'_img2_icon','advertica-lite'); } ?> "></a></li>
				<?php } else { ?>
					<li class="span2"><a href="JavaScript:void(0);" title="<?php _e('Client Logo', 'advertica-lite'); ?>"><img alt="<?php _e('Client Logo', 'advertica-lite'); ?>" src="<?php echo $_client_logo_path.'client-logo2.png'; ?>"></a></li>
				<?php } ?>

				<?php if(sketch_get_option($advertica_shortname.'_img3_icon')){ ?>
					<li class="span2"><a href="<?php if(sketch_get_option($advertica_shortname.'_img3_link')){ echo esc_url(sketch_get_option($advertica_shortname.'_img3_link','advertica-lite')); } ?>" title="<?php if(sketch_get_option($advertica_shortname.'_img3_title')){ echo sketch_get_option($advertica_shortname.'_img3_title','advertica-lite'); } ?>"><img alt="client-logo" src="<?php if(sketch_get_option($advertica_shortname.'_img3_icon')){ echo sketch_get_option($advertica_shortname.'_img3_icon','advertica-lite'); } ?>"></a></li>
				<?php } else { ?>
					<li class="span2"><a href="JavaScript:void(0);" title="<?php _e('Client Logo', 'advertica-lite'); ?>"><img alt="<?php _e('Client Logo', 'advertica-lite'); ?>" src="<?php echo $_client_logo_path.'client-logo3.png'; ?>"></a></li>
				<?php } ?>

				<?php if(sketch_get_option($advertica_shortname.'_img4_icon')){ ?>
					<li class="span2"><a href="<?php if(sketch_get_option($advertica_shortname.'_img4_link')){ echo esc_url(sketch_get_option($advertica_shortname.'_img4_link','advertica-lite')); } ?>" title="<?php if(sketch_get_option($advertica_shortname.'_img4_title')){ echo sketch_get_option($advertica_shortname.'_img4_title','advertica-lite'); } ?>"><img alt="client-logo" src="<?php if(sketch_get_option($advertica_shortname.'_img4_icon')){ echo sketch_get_option($advertica_shortname.'_img4_icon','advertica-lite'); } ?>"></a></li>
				<?php } else { ?>
					<li class="span2"><a href="JavaScript:void(0);" title="<?php _e('Client Logo', 'advertica-lite'); ?>"><img alt="<?php _e('Client Logo', 'advertica-lite'); ?>" src="<?php echo $_client_logo_path.'client-logo4.png'; ?>"></a></li>
				<?php } ?>

				<?php if(sketch_get_option($advertica_shortname.'_img5_icon')){ ?>
					<li class="span2"><a href="<?php if(sketch_get_option($advertica_shortname.'_img5_link')){ echo esc_url(sketch_get_option($advertica_shortname.'_img5_link','advertica-lite')); } ?>" title="<?php if(sketch_get_option($advertica_shortname.'_img5_title')){ echo sketch_get_option($advertica_shortname.'_img5_title','advertica-lite'); } ?>"><img alt="client-logo" src="<?php if(sketch_get_option($advertica_shortname.'_img5_icon')){ echo sketch_get_option($advertica_shortname.'_img5_icon','advertica-lite'); } ?>"></a></li>
				<?php } else { ?>
					<li class="span2"><a href="JavaScript:void(0);" title="<?php _e('Client Logo', 'advertica-lite'); ?>"><img alt="<?php _e('Client Logo', 'advertica-lite'); ?>" src="<?php echo $_client_logo_path.'client-logo5.png'; ?>"></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
