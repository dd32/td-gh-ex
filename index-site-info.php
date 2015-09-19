<?php $corpbiz_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'corpbiz_options', array() ), $corpbiz_options ); 
 if($current_options['home_call_out_area_enabled'] == false) { ?>
<div class="homepage_top_callout">
	<div class="container">
		<div class="row">
			<div class="col-md-12">		
			<h2><?php if($current_options['site_title_one'] !='') { ?>
				<span><?php echo esc_html($current_options['site_title_one']); ?></span> 
				<?php } 
				if($current_options['site_title_two'] !='')
				{  echo esc_html($current_options['site_title_two']); } ?>
				</h2>
				<?php if($current_options['site_description'] !='') { ?>
				<p><?php echo esc_html($current_options['site_description']); ?></p>
				<?php } ?>
			</div>
			<div class="homepage_top_callout_btntop">
				<?php if($current_options['siteinfo_button_one_text'] !='') { ?>
				<a href="#" class="btn_red"><?php echo esc_html($current_options['siteinfo_button_one_text']); ?></a>
				<?php }
				if($current_options['siteinfo_button_two_text'] !='') { ?>
				<a href="#" class="btn_green"><?php echo esc_html($current_options['siteinfo_button_two_text']); ?></a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>