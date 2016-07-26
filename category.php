<?php
/**
 * The template for displaying category
 *
 *
 * @package Avvocato
 */
get_header();
?>
<section class="section section-page-title" <?php if(get_theme_mod('avvocato_blog_image')) { ?> style="background-image: url('<?php echo esc_url(get_theme_mod('avvocato_blog_image')); ?>')"  <?php }  ?>>
	<div class="overlay">
		<div class="container">
			<div class="gutter">
			    <p class="page-title"><?php the_archive_title() ?></p>
			</div>
		</div> <!--  END container  -->
	</div> <!--  END overlay  -->
</section> <!--  END section-page-title  -->
<?php
get_template_part( 'content', 'posts' ); 
get_footer(); 
?>