<?php
/**
 * @package Greenr
 */
   
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-meta heade-entry-meta">
		<?php greenr_posted_on(); ?>
	</div><!-- .entry-meta -->

	<div class="entry-content">  
	
<?php
$single_featured_image = get_theme_mod( 'single_featured_image',true); 
$single_featured_image_size = get_theme_mod ('single_featured_image_size','1');
if ($single_featured_image ) :
	 if ( $single_featured_image_size == '1' ) :?>
	 		<div class="post-thumb">
	 <?php  if( has_post_thumbnail() && ! post_password_required() ) :   
				the_post_thumbnail('greenr-blog-large-width'); 
			endif;?>
			</div><?php
		 else: ?>
		 	<div class="post-thumb"><?php
		 	if( has_post_thumbnail() && ! post_password_required() ) :   
					the_post_thumbnail('greenr-small-featured-image-width');
			endif;?>
			</div><?php
	endif;  
endif;?>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'greenr' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php greenr_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
