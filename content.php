<?php
/**
 * @package BOXY
 */
global $boxy;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
<?php 
	    $featured_image = get_theme_mod( 'featured_image',true );
	    $featured_image_size = get_theme_mod ('featured_image_size','1');
		if( $featured_image ) : 
		        if ( $featured_image_size == '1' ) :?>		
						<div class="thumb">
						  <?php	if( $featured_image && has_post_thumbnail() ) : 
								    the_post_thumbnail('boxy-blog-full-width');
			                     endif;?>
			            </div> <?php
		        else: ?>
		 	            <div class="thumb">
		 	                 <?php if( has_post_thumbnail() && ! post_password_required() ) :   
					               the_post_thumbnail('boxy-small-featured-image-width');
								endif;?>
			             </div>  <?php				
	            endif; 
		endif; ?>  
		
		<div class="entry-body">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title( '', '' ); ?></a></h1>			  
	            <?php do_action('boxy_blog_top_meta'); ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'boxy' ) ); ?>
       </div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'boxy' ),
				'after'  => '</div>',
			) );
		?>
		
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<span class="posted-on"><?php boxy_post_date(); ?></span>
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
			  <?php if ( ! post_password_required() && ( comments_open() ) ) : ?>
		        <span class="comments-link"><?php comments_popup_link( __( '<i class="fa fa-comments"></i> Leave a comment', 'boxy' ), __( '1 Comment', 'boxy' ), __( '<i class="fa fa-comments"></i> % Comments', 'boxy' ) ); ?></span>
			<?php
			endif;?>
		<?php endif; // End if 'post' == get_post_type() ?>
		 
		<?php edit_post_link( __( '<span class="edit-link"><i class="fa fa-edit"></i> Edit</span>', 'boxy' ), '', '' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->