<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellini
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("row");?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
<div class="blog__post col-md-12">
	<div class="col-md-8 layout-golden--one__left">
		<?php echo bellini_post_thumbnail();?>
    </div> <!-- layout left end -->

    <div data-sr="enter right, move 40px" class="col-md-4 layout-golden--one__right">
	    <div class="blog__post__right">

	    	<div class="blog-post__meta">
		    	<?php bellini_published_on();?>
	    	</div>

		    <header class="entry-header">
				<?php the_title( sprintf( '<h3 itemprop="headline" class="entry-title"><a href="%s" class="element-title element-title--post" rel="bookmark" itemprop="name">',
				esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			</header><!-- .entry-header -->

		    <div class="blog__post__excerpt" itemprop="description">
		       <?php
					the_excerpt( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bellini' ),
						array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
				?>
		    </div><!-- .blog__post__excerpt -->

			<a class="button--secondary--post" href="<?php the_permalink();?>">
			<button class="button button--secondary" role="button">
	        	<?php _e('Read More', 'bellini'); ?>
	        </button>
	        </a>



	    </div><!-- Blog Post right end -->


    </div><!-- layout right end -->
</div>
</article><!-- #post-## -->

