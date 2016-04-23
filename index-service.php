<?php
$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), default_data() );
?>
<!-- Service Section -->
<section id="section" class="service">
	<div class="container">
	
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					
					<?php if( $current_options['tagline_title'] != '' ): ?>
					<h1 class="section-heading txt-color">
						<?php echo esc_attr($current_options['tagline_title']); ?>
					</h1>
					<?php endif; ?>
					
					<?php if( $current_options['tagline_contents'] != '' ): ?>
					<p>
						<?php echo esc_attr($current_options['tagline_contents']); ?>
					</p>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
		<!-- /Section Title -->	
		
		<div class="row">
			
			<?php for( $i=1; $i<=4; $i++ ){ ?>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="post">
					
					<?php if( $current_options['service'.$i.'_title'] != '' ){ ?>
					<div class="entry-header">
						<h4 class="entry-title"><?php echo esc_attr($current_options['service'.$i.'_title']); ?></h4>
					</div>
					<?php } ?>
					
					<?php if( $current_options['service'.$i.'_image'] != '' ){ ?>
					<figure class="post-thumbnail"><img src="<?php echo esc_url($current_options['service'.$i.'_image']); ?>" alt="service <?php echo $i; ?>"></figure>
					<?php }  ?>
					
					<?php if( $current_options['service'.$i.'_desc'] != '' ){ ?>
					<div class="entry-content"><?php echo esc_attr($current_options['service'.$i.'_desc']); ?></div>	
					<?php } ?>
					
				</div>
			</div>
			<?php } ?>
		</div>
				
	</div>
</section>
<!-- End of Service Section -->

<div class="clearfix"></div>