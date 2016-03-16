<?php
/**
 * @package BOXY
 */
global $boxy;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<div class="entry-meta">
			<?php boxy_posted_on(); ?>
		</div><!-- .entry-meta -->

	<div class="entry-content">  
	
<?php
$single_featured_image = get_theme_mod( 'single_featured_image',true); 
$single_featured_image_size = get_theme_mod ('single_featured_image_size','1');
if ($single_featured_image ) :
	 if ( $single_featured_image_size == '1' ) :?>
	 		<div class="post-thumb blog-thumb">
	 <?php  if( has_post_thumbnail() && ! post_password_required() ) :   
				the_post_thumbnail('boxy-blog-large-width');
			endif;?>
			</div><?php
		 else: ?>
		 	<div class="post-thumb blog-thumb"><?php
		 	if( has_post_thumbnail() && ! post_password_required() ) :   
					the_post_thumbnail('boxy-small-featured-image-width');
			endif;?>
			</div><?php
	endif;  
endif;?>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'boxy' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'boxy' ) );
				if ( $categories_list ) :
			?>
			<span class="cat-links">
				<i class="fa fa-list-alt"></i>
				<?php printf( __( ' %1$s', 'boxy' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'boxy' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<i class="fa fa-tag"></i>
				<?php printf( __( ' %1$s', 'boxy' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->