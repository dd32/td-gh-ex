<?php
/**
 * @package Greenr
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
<?php 
	    $featured_image = get_theme_mod( 'featured_image',true );
	    $featured_image_size = get_theme_mod ('featured_image_size','1');
		if( $featured_image ) : 
		        if ( $featured_image_size == '1' ) :?>		
						<div class="thumb">
						  <?php	if( $featured_image && has_post_thumbnail() ) : 
								    the_post_thumbnail('greenr-blog-full-width');
			                     endif;?>
			            </div> <?php
		        else: ?>
		 	            <div class="thumb">
		 	                 <?php if( has_post_thumbnail() && ! post_password_required() ) :   
					               the_post_thumbnail('greenr-small-featured-image-width');
								endif;?>
			             </div>  <?php				
	            endif; 
		endif; ?>  
		<div class="entry-body">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title( '', '' ); ?></a></h1>
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'greenr' ), 
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>
		</div>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'greenr' ),
				'after'  => '</div>',
			) );
		?>
			<br class="clear" />
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php greenr_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
