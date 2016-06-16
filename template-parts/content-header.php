<?php
/**
 * The template part for displaying content header
 *
 * @package KniffTech
 * @subpackage Bidnis
 * @since Bidnis 1.0
 */
?>
<header class="content-header">
	<?php bidnis_breadcrumbs(); ?>
	
	<h3 class="content-title">
		<?php
			if( is_archive() ){
				the_archive_title();
			
			}elseif( is_search() ){
				printf( __( 'Search Results for: %s', 'bidnis' ), '<span>' . esc_html( get_search_query() ) . '</span>' );	
			
			}elseif( is_404() ){
				_e( '404 Not Found', 'bidnis' );

			}elseif( get_the_title() == '' ){
				_e( 'Untitled Post', 'bidnis' );
			
			}else{
				the_title();
			
			}
		?>
	</h3>

	<?php ( is_archive() ) ? the_archive_description( '<div class="content-title-description">', '</div>' ) : false; ?>

	<?php ( is_single() && !is_page() ) ? get_template_part('template-parts/entry_meta') : false; ?>

	<?php if( is_single() ): ?>
		<div class="post-thumbnail">
			<?php if( has_post_thumbnail() && get_theme_mod('thumbnail_content', true) ){
				the_post_thumbnail();
			}
			
			echo ( wp_attachment_is_image( get_the_ID() ) ) ? wp_get_attachment_image( get_the_ID(), 'large') : false; ?>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
	
</header>