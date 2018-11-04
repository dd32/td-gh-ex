			
<?php
 	if (themeszen_get_option('arena_about_status', 'on') == 'on') {
		?>		
<!-- Portfolio Section -->
<section class="about-section">			
			
			<div class="container">
	
		<!-- Section Title -->
                    <div class="about_heading_container"> 
                        <h2 class="themeszen_about_main_head">
						<?php if(esc_html(themeszen_get_option('themeszen_about_main_head')) != NULL){ echo esc_html(themeszen_get_option('themeszen_about_main_head'));} else echo __('Who we are', 'arena'); ?></h2>
                        <h4 class="themeszen_about_main_desc"><?php if(esc_html(themeszen_get_option('themeszen_about_main_desc')) != NULL){ echo esc_html(themeszen_get_option('themeszen_about_main_desc'));} else echo __('Something about us.', 'arena');?>
						</h4>
                    </div>
		<!-- /Section Title -->
		
		<div class="row box-wrapper">

			<?php for ($i = 1; $i <= 3; $i++) { ?>
		
				<div class="col-md-4 col-sm-4">
				
					<div class="box-head">
								
	<?php if(esc_url(themeszen_get_option('arena_boxlink' . $i)) != NULL){ ?> <a href="<?php echo esc_url(themeszen_get_option('arena_boxlink' . $i)); ?>"><?php }?><img src="<?php if(esc_url(themeszen_get_option('arena_boximage' . $i)) != NULL){ echo esc_url(themeszen_get_option('arena_boximage' . $i));} else echo get_template_directory_uri() . '/images/pic' .$i. '.jpg' ?>" alt="<?php echo esc_html(themeszen_get_option('arena_boxhead' . $i)); ?>" />
		<?php if(esc_url(themeszen_get_option('arena_boxlink' . $i)) != NULL){ ?></a><?php }?>

					
					</div> <!--box-head close-->
					
				<div class="title-box">						
						
				<div class="title-head">
				
<?php if(esc_url(themeszen_get_option('arena_boxlink' . $i)) != NULL){ ?> <a href="<?php echo esc_url(themeszen_get_option('arena_boxlink' . $i)); ?>"><?php }?>				
				
				<?php if(esc_html(themeszen_get_option('arena_boxhead' . $i)) != NULL){ echo esc_html(themeszen_get_option('arena_boxhead' . $i));} else echo __('Step'. $i, 'arena'); ?>
				
		<?php if(esc_url(themeszen_get_option('arena_boxlink' . $i)) != NULL){ ?></a><?php }?>
						
			</div>		
				</div>
					
					<div class="box-content">

				<?php if(esc_textarea(themeszen_get_option('arena_boxtext' . $i)) != NULL){ echo esc_textarea(themeszen_get_option('arena_boxtext' . $i));} else echo __('Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. Donec est est, rutrum vitae bibendum vel, suscipit non metus.', 'arena'); ?>
					
					</div> <!--box-content close-->
					<div class="clear"></div>
			
				</div><!--boxes  end-->
				
		<?php } ?>
			
	</div>
		</div>
		
</section>
<!-- /about Section -->

<div class="clearfix"></div>	
<?php }  ?>		
