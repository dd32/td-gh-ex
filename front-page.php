<?php 
/**
 * 
 * @package Aedificator 
 */
get_header(); 
if ( have_posts() ) : 
?>
<div class="owl-carousel welcome-carousel">
	<div class="item animate-top-down"  <?php if(get_theme_mod('pwt_slider_image_upload_1')) { ?> style="background-image: url(<?php echo esc_url(get_theme_mod('pwt_slider_image_upload_1')); ?>);"<?php } else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/slider1.jpg" <?php }?>>
		<div class="container">
			<div class="gutter clearfix">
				<div class="welcome-text column-5-12 center">
					<h6>
					<span><?php echo esc_html(get_theme_mod('pwt_slider_title_1_1',__( 'we', 'aedificator' ))); ?></span> 
					<span class="x-large"><?php echo esc_html(get_theme_mod('pwt_slider_title_2_1',__( 'make', 'aedificator' ))); ?></span> 
					<span class="xx-large"><?php echo esc_html(get_theme_mod('pwt_slider_title_3_1',__( 'future', 'aedificator' ))); ?></span>
					</h6>
					<p><?php echo esc_html(get_theme_mod('pwt_slider_content_1',__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration', 'aedificator' ))); ?></p>
					<?php if(strlen(get_theme_mod('pwt_button_slider_text_1',__( 'Our Service', 'aedificator' )))>0) { ?><a class="button" href="<?php echo esc_url(get_theme_mod('pwt_button_color_link_1')); ?>"><?php echo esc_html(get_theme_mod('pwt_button_slider_text_1',__( 'Our Service', 'aedificator' ))); ?></a><?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="item animate-top-down"  <?php if(get_theme_mod('pwt_slider_image_upload_2')) { ?> style="background-image: url(<?php echo esc_url(get_theme_mod('pwt_slider_image_upload_2')); ?>);"<?php } else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/slider2.jpg" <?php }?>>
		<div class="container">
			<div class="gutter clearfix">
				<div class="welcome-text column-5-12 center">
					<h6>
					<span><?php echo esc_html(get_theme_mod('pwt_slider_title_1_2',__( 'we', 'aedificator' ))); ?></span> 
					<span class="x-large"><?php echo esc_html(get_theme_mod('pwt_slider_title_2_2',__( 'make', 'aedificator' ))); ?></span> 
					<span class="xx-large"><?php echo esc_html(get_theme_mod('pwt_slider_title_3_2',__( 'future', 'aedificator' ))); ?></span>
					</h6>
					<p><?php echo esc_html(get_theme_mod('pwt_slider_content_2',__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration', 'aedificator' ))); ?></p>
					<?php if(strlen(get_theme_mod('pwt_button_slider_text_2',__( 'Contact Us', 'aedificator' )))>0) { ?><a class="button" href="<?php echo esc_url(get_theme_mod('pwt_button_color_link_2')); ?>"><?php echo esc_html(get_theme_mod('pwt_button_slider_text_2',__( 'Our Service', 'aedificator' ))); ?></a><?php } ?>
				</div>
			</div>
		</div>
	</div>	
</div> <!--  END welcome-carousel  -->
<div class="section section-get-quote">
	<div class="container">
		<div class="gutter">
			<div class="get-quote-block" <?php if(get_theme_mod('pwt_slider_bar_below_bg_images')) { ?> style="background-image: url('<?php echo esc_url(get_theme_mod('pwt_slider_bar_below_bg_images')); ?>')"  <?php } else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/bgq.jpg" <?php }?>>
				<div class="section-overlay">
					<p><?php echo esc_html(get_theme_mod('pwt_slider_bar_below_text',__( 'We are ready to serve you better than other !! For more info Contact us now', 'aedificator' ))); ?></p>
					<a class="button" href="<?php echo esc_url(get_theme_mod('pwt_slider_bar_below_button_link')); ?>"><?php echo esc_html(get_theme_mod('pwt_slider_bar_below_button_text',__( 'get a quote', 'aedificator' ))); ?></a>
				</div>
			</div>
		</div>
	</div> <!--  END container  -->
</div> <!--  END section-get-quote  -->
<div class="section section-we-are">
	<div class="container">
		<div class="column-container we-are-container">
			<div class="column-4-12">
				<div class="gutter">
					<article class="article-we-are">
						<div class="article-image">
							<a href="<?php echo esc_url(get_theme_mod('pwt_who_we_are_link_1')); ?>"><?php if(get_theme_mod('pwt_who_we_are_image_1')) { ?><img src="<?php echo esc_url(get_theme_mod('pwt_who_we_are_image_1')); ?>" alt="" /><?php } else { ?> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/wwa1.jpg" alt="" /> <?php } ?></a>
							<a class="fa fa-link" href="<?php echo esc_url(get_theme_mod('pwt_who_we_are_link_1')); ?>"></a>
						</div>
						<div class="article-text">
							<h2><a href="<?php echo esc_url(get_theme_mod('pwt_who_we_are_link_1')); ?>"><?php echo esc_html(get_theme_mod('pwt_who_we_are_title_1',__( 'Who we are', 'aedificator' ))); ?></a></h2>
							<p><?php echo esc_html(get_theme_mod('pwt_who_we_are_content_1',__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some lorem ipsum', 'aedificator' ))); ?></p>
						</div>
					</article>
				</div>
			</div>
			<div class="column-4-12">
				<div class="gutter">
					<article class="article-we-are">
						<div class="article-image">
							<a href="<?php echo esc_url(get_theme_mod('pwt_who_we_are_link_2')); ?>"><?php if(get_theme_mod('pwt_who_we_are_image_2')) { ?><img src="<?php echo esc_url(get_theme_mod('pwt_who_we_are_image_2')); ?>" alt="" /><?php } else { ?> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/wwa2.jpg" alt="" /> <?php } ?></a>
							<a class="fa fa-link" href="<?php echo esc_url(get_theme_mod('pwt_who_we_are_link_2')); ?>"></a>
						</div>
						<div class="article-text">
							<h2><a href="<?php echo esc_url(get_theme_mod('pwt_who_we_are_link_2')); ?>"><?php echo esc_html(get_theme_mod('pwt_who_we_are_title_2',__( 'Our Visions', 'aedificator' ))); ?></a></h2>
							<p><?php echo esc_html(get_theme_mod('pwt_who_we_are_content_2',__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some lorem ipsum', 'aedificator' ))); ?></p>
						</div>
					</article>
				</div>
			</div>
			<div class="column-4-12">
				<div class="gutter">
					<article class="article-we-are">
						<div class="article-image">
							<a href="<?php echo esc_url(get_theme_mod('pwt_who_we_are_link_3')); ?>"><?php if(get_theme_mod('pwt_who_we_are_image_3')) { ?><img src="<?php echo esc_url(get_theme_mod('pwt_who_we_are_image_3')); ?>" alt="" /><?php } else { ?> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/wwa3.jpg" alt="" /> <?php } ?></a>
							<a class="fa fa-link" href="<?php echo esc_url(get_theme_mod('pwt_who_we_are_link_3')); ?>"></a>
						</div>
						<div class="article-text">
							<h2><a href="<?php echo esc_url(get_theme_mod('pwt_who_we_are_link_3')); ?>"><?php echo esc_html(get_theme_mod('pwt_who_we_are_title_3',__( 'Our Objectives', 'aedificator' ))); ?></a></h2>
							<p><?php echo esc_html(get_theme_mod('pwt_who_we_are_content_3',__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some lorem ipsum', 'aedificator' ))); ?></p>
						</div>
					</article>
				</div>
			</div>				
		</div>
	</div> <!--  END container  -->
</div> <!--  END section-we-are  -->
<section class="section section-starting-point" <?php if(get_theme_mod('pwt_history_bg')) { ?> style="background-image: url('<?php echo esc_url(get_theme_mod('pwt_history_bg')); ?>')"  <?php } else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/bgh.jpg" <?php }?>>
	<div class="section-overlay">
		<div class="container">
			<div class="gutter">
				<div class="starting-point">
					<h4><?php echo esc_html(get_theme_mod('pwt_history_title',__( 'The starting point of all achievement is desire', 'aedificator' ))); ?></h4>
					<p class="italic"><?php echo esc_html(get_theme_mod('pwt_history_content',__( 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s', 'aedificator' ))); ?></p>					
					<a class="button" href="<?php echo esc_url(get_theme_mod('pwt_history_button_link')); ?>"><?php echo esc_html(get_theme_mod('pwt_history_button_text',__( 'Contact Us', 'aedificator' ))); ?></a>
				</div>
			</div>
		</div> <!--  END container  -->
	</div> <!--  END section-overlay  -->
</section> <!--  END section-starting-point  -->
<?php
if ( 'posts' == get_option( 'show_on_front')) {	
	get_template_part( 'content', 'posts' ); 
} 
else {	
	get_template_part( 'content', 'home' ); 
} 
endif; 
get_footer(); ?>