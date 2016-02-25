<?php
/**
 * The template for displaying page NOT FOUND.
 *
 * @package Avvocato
 */
get_header();
?>
<section class="section section-page-title" <?php if(get_theme_mod('pwt_blog_image')) { ?> style="background-image: url('<?php echo esc_url(get_theme_mod('pwt_blog_image')); ?>')"  <?php }  else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/bgh.jpg" <?php }?>>
	<div class="overlay">
		<div class="container">
			<div class="gutter">
			    <p class="page-title"><?php _e( 'Not found', 'avvocato' ); ?></p>
			</div>
		</div> <!--  END container  -->
	</div> <!--  END overlay  -->
</section> <!--  END section-page-title  -->
<div class="section section-blog">
	<div class="container">
		<div class="column-container blog-container">			
			<div class="column-12-12 left">
				<div class="gutter">
					<div class="inner-page-container">
						<article class="single-post">	
							<div class="article-text">
								<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'avvocato' ); ?></p>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>
	</div> <!--  ENd container  -->
</div> <!--  END section-blog  -->
<?php
get_footer(); 
?>