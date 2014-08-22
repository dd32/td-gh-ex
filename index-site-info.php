<?php  $current_options = get_option('corpbiz_options'); ?>
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
				<a href="#" class="btn_red"><?php echo $current_options['siteinfo_button_one_text']; ?></a>
				<?php }
				if($current_options['siteinfo_button_two_text'] !='') { ?>
				<a href="#" class="btn_green"><?php echo $current_options['siteinfo_button_two_text']; ?></a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>