<?php
/**
 * The main template file.
 *
 * @package Avvocato
 */
get_header();
?>
<section class="section section-page-title" <?php if(get_theme_mod('pwt_blog_image')) { ?> style="background-image: url('<?php echo esc_url(get_theme_mod('pwt_blog_image')); ?>')"  <?php }  else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/bgh.jpg" <?php }?>>
	<div class="overlay">
		<div class="container">
			<div class="gutter">
			    <p class="page-title"><?php echo esc_html(get_theme_mod('pwt_blog_page_title',__( 'Our Blog', 'avvocato' ))); ?></p>
				<p><?php echo esc_html(get_theme_mod('pwt_blog_subtitle',__( 'Class aptent tactic socislifd lorem ipsum dummy', 'avvocato' ))); ?></p>
			</div>
		</div> <!--  END container  -->
	</div> <!--  END overlay  -->
</section> <!--  END section-page-title  -->
<?php
get_template_part( 'content', 'posts' ); 
get_footer(); 
?>