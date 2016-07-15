<?php
/**
 * The template for displaying search
 *
 * @package Avvocato
 */
get_header();
?>
<section class="section section-page-title" <?php if(get_theme_mod('pwt_blog_image')) { ?> style="background-image: url('<?php echo esc_url(get_theme_mod('pwt_blog_image')); ?>')"  <?php }  ?>>
	<div class="overlay">
		<div class="container">
			<div class="gutter">
			    <p class="page-title"><?php printf( __( 'Search Results for: %s', 'avvocato' ), '<span>' . get_search_query() . '</span>' ); ?></p>
			</div>
		</div> <!--  END container  -->
	</div> <!--  END overlay  -->
</section> <!--  END section-page-title  -->
<?php
get_template_part( 'content', 'posts' ); 
get_footer(); 
?>