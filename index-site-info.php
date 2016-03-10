<?php 
$corpbiz_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'corpbiz_options', array() ), $corpbiz_options ); ?>
<div class="homepage_top_callout">
	<div class="container">
		<div class="row">
			<div class="col-md-12">		
				<h2><?php if($current_options['site_title_one'] !='') { ?>
					<span><?php echo $current_options['site_title_one']; ?></span> 
					<?php } 
					if($current_options['site_title_two'] !='')
					{  echo $current_options['site_title_two']; } ?>
				</h2>
				<?php if($current_options['site_description'] !='') { ?>
				<p><?php echo $current_options['site_description']; ?></p>
				<?php } ?>
			</div>
			<div class="homepage_top_callout_btntop">
				<?php if($current_options['siteinfo_button_one_text'] !='') { ?>
				<a href="<?php if($current_options['siteinfo_button_one_link'] !=''){ echo $current_options['siteinfo_button_one_link']; } ?>" class="btn_red" <?php if($current_options['siteinfo_button_one_target'] ==true){ echo 'target="_blank"'; } ?> ><?php echo $current_options['siteinfo_button_one_text']; ?></a>
				<?php }
				if($current_options['siteinfo_button_two_text'] !='') { ?>
				<a href="<?php if($current_options['siteinfo_button_two_link'] !=''){ echo $current_options['siteinfo_button_two_link']; } ?>" class="btn_green" <?php if($current_options['siteinfo_button_two_target'] ==true){ echo 'target="_blank"'; } ?> ><?php echo $current_options['siteinfo_button_two_text']; ?></a>
				<?php } ?>
			</div>		
		</div>
	</div>
</div>

