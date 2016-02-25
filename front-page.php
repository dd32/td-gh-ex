<?php 
/**
 * 
 * @package Avvocato 
 */
get_header(); 
if ( have_posts() ) : 
?>
<div class="section section-carousel">		
	<div class="owl-carousel main-carousel">
		<div class="item" <?php if(get_theme_mod('pwt_slider_image_upload_1')) { ?> style="background-image: url(<?php echo esc_url(get_theme_mod('pwt_slider_image_upload_1')); ?>);"<?php } else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/slider1.jpg" <?php }?>>
			<div class="overlay">
				<div class="container">
					<div class="gutter">
						<div class="carousel-text column-9-12 center text-center animate-top-down">
							<h4><?php echo esc_html(get_theme_mod('pwt_slider_title_1',__( 'High Qualified Lawyers here', 'avvocato' ))); ?></h4>
							<p><?php echo esc_html(get_theme_mod('pwt_slider_content_1',__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy', 'avvocato' ))); ?></p>
						</div>
					</div>
				</div>
			</div> 
		</div>		
		<div class="item" <?php if(get_theme_mod('pwt_slider_image_upload_2')) { ?> style="background-image: url(<?php echo esc_url(get_theme_mod('pwt_slider_image_upload_2')); ?>);"<?php } else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/slider2.jpg" <?php }?>>
			<div class="overlay">
				<div class="container">
					<div class="gutter">
						<div class="carousel-text column-9-12 center text-center animate-top-down">
							<h4><?php echo esc_html(get_theme_mod('pwt_slider_title_2',__( 'Lawyers here High Qualified', 'avvocato' ))); ?></h4>
							<p><?php echo esc_html(get_theme_mod('pwt_slider_content_2',__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy', 'avvocato' ))); ?></p>
						</div>
					</div>
				</div>
			</div> 
		</div>				
	</div>
</div>
<div class="section section-boxes">
	<div class="container">
		<div class="column-container boxes-container">
			<div class="column-3-12">
				<div class="gutter">
					<article class="article-box">
						<div class="article-icon">
							<a class="fa fa-<?php echo esc_html(get_theme_mod('pwt_whyus_icon_1',__( 'graduation-cap', 'avvocato' ))); ?>" href="<?php echo esc_url(get_theme_mod('pwt_whyus_button_link_1',__( '#', 'avvocato' ))); ?>"></a>
						</div>
						<div class="article-text">
							<h2><a href="<?php echo esc_url(get_theme_mod('pwt_whyus_button_link_1',__( '#', 'avvocato' ))); ?>"><?php echo esc_html(get_theme_mod('pwt_whyus_title_1',__( 'Lorem ipsum', 'avvocato' ))); ?></a></h2>
							<p><?php echo esc_html(get_theme_mod('pwt_whyus_content_1',__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'avvocato' ))); ?></p>
							<a class="button" href="<?php echo esc_url(get_theme_mod('pwt_whyus_button_link_1',__( '#', 'avvocato' ))); ?>"><?php echo esc_html(get_theme_mod('pwt_whyus_button_text_1',__( 'Read More', 'avvocato' ))); ?></a>
						</div>
					</article>
				</div>
			</div>
			<div class="column-3-12">
				<div class="gutter">
					<article class="article-box">
						<div class="article-icon">
							<a class="fa fa-<?php echo esc_html(get_theme_mod('pwt_whyus_icon_2',__( 'book', 'avvocato' ))); ?>" href="<?php echo esc_url(get_theme_mod('pwt_whyus_button_link_2',__( '#', 'avvocato' ))); ?>"></a>
						</div>
						<div class="article-text">
							<h2><a href="<?php echo esc_url(get_theme_mod('pwt_whyus_button_link_2',__( '#', 'avvocato' ))); ?>"><?php echo esc_html(get_theme_mod('pwt_whyus_title_2',__( 'Lorem ipsum', 'avvocato' ))); ?></a></h2>
							<p><?php echo esc_html(get_theme_mod('pwt_whyus_content_2',__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'avvocato' ))); ?></p>
							<a class="button" href="<?php echo esc_url(get_theme_mod('pwt_whyus_button_link_2',__( '#', 'avvocato' ))); ?>"><?php echo esc_html(get_theme_mod('pwt_whyus_button_text_2',__( 'Read More', 'avvocato' ))); ?></a>
						</div>
					</article>
				</div>
			</div>
			<div class="column-3-12">
				<div class="gutter">
					<article class="article-box">
						<div class="article-icon">
							<a class="fa fa-<?php echo esc_html(get_theme_mod('pwt_whyus_icon_3',__( 'briefcase', 'avvocato' ))); ?>" href="<?php echo esc_url(get_theme_mod('pwt_whyus_button_link_3',__( '#', 'avvocato' ))); ?>"></a>
						</div>
						<div class="article-text">
							<h2><a href="<?php echo esc_url(get_theme_mod('pwt_whyus_button_link_3',__( '#', 'avvocato' ))); ?>"><?php echo esc_html(get_theme_mod('pwt_whyus_title_3',__( 'Lorem ipsum', 'avvocato' ))); ?></a></h2>
							<p><?php echo esc_html(get_theme_mod('pwt_whyus_content_3',__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'avvocato' ))); ?></p>
							<a class="button" href="<?php echo esc_url(get_theme_mod('pwt_whyus_button_link_3',__( '#', 'avvocato' ))); ?>"><?php echo esc_html(get_theme_mod('pwt_whyus_button_text_3',__( 'Read More', 'avvocato' ))); ?></a>
						</div>
					</article>
				</div>
			</div>
			<div class="column-3-12">
				<div class="gutter">
					<article class="article-box">
						<div class="article-icon">
							<a class="fa fa-<?php echo esc_html(get_theme_mod('pwt_whyus_icon_4',__( 'institution', 'avvocato' ))); ?>" href="<?php echo esc_url(get_theme_mod('pwt_whyus_button_link_4',__( '#', 'avvocato' ))); ?>"></a>
						</div>
						<div class="article-text">
							<h2><a href="<?php echo esc_url(get_theme_mod('pwt_whyus_button_link_4',__( '#', 'avvocato' ))); ?>"><?php echo esc_html(get_theme_mod('pwt_whyus_title_4',__( 'Lorem ipsum', 'avvocato' ))); ?></a></h2>
							<p><?php echo esc_html(get_theme_mod('pwt_whyus_content_4',__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'avvocato' ))); ?></p>
							<a class="button" href="<?php echo esc_url(get_theme_mod('pwt_whyus_button_link_4',__( '#', 'avvocato' ))); ?>"><?php echo esc_html(get_theme_mod('pwt_whyus_button_text_4',__( 'Read More', 'avvocato' ))); ?></a>
						</div>
					</article>
				</div>
			</div>				
		</div>
		<div class="gutter">
			<div class="table-download">
				<div class="table-row">
					<div class="table-cell column-9-12">
						<p><?php echo esc_html(get_theme_mod('pwt_info_box_text',__( 'It is a long established fact that a reader will be distracted lorem ipsum...', 'avvocato' ))); ?></p>
					</div>
					<div class="table-cell column-3-12">
						<a class="button-large" href="<?php echo esc_url(get_theme_mod('pwt_info_box_button_link',__( '#', 'avvocato' ))); ?>"><?php echo esc_html(get_theme_mod('pwt_info_box_button_text',__( 'Contact Us', 'avvocato' ))); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div> <!--  END container  -->
</div> <!--  END section-boxes  -->
<?php
if ( 'posts' == get_option( 'show_on_front')) {
	get_template_part( 'content', 'posts' ); 
} 
else {	
	get_template_part( 'content', 'home' ); 
} 
endif; 
get_footer(); ?>