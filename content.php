<?php

/**
 * The default template for displaying content
 * Used for both single and index/archive/search.
 * @package WordPress
 * @subpackage belfast
 * @since belfast 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<div class="col-md-11">

        <header class="entry-header">

            

            <div class="entry-thumbnail">
				<?php 
				if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ){
					the_post_thumbnail();
				}
				
				?>
				<div class="entry-meta">
				<?php _e('By ', 'belfast'); ?> <?php if ( 'post' == get_post_type() ) {

                    printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',

                        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),

                        esc_attr( sprintf( __( 'View all posts by %s', 'belfast' ), get_the_author() ) ),

                        get_the_author()

                    );

                } ?>, <?php belfast_entry_date(); ?>

				</div><!-- .entry-meta -->
            </div>

            <?php if ( is_single() ) : ?>

            <h1 class="entry-title"><?php the_title(); ?></h1>

            <?php else : ?>

            <h2 class="entry-title">

                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>

            </h2>

            <?php endif; // is_single() ?>

    
<div class="clr"></div>
            

        </header><!-- .entry-header -->
<div class="clr"></div>


		<?php if ( is_single() ) : // Only display Excerpts for Search ?>

        <div class="entry-summary">

            <?php 
			the_content();
			//
			belfast_link_pages();
			?>
            

        </div><!-- .entry-summary -->
 <?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'belfast') . '</span> ', ' ', '</p>'); ?>  
        <?php else : ?>

        <div class="entry-content">

            <?php the_excerpt(); ?>

        </div><!-- .entry-content -->

        <?php endif; ?>

        
        <?php if ( is_single() ) : // Only display Excerpts for Search ?>
        
        <div class="more-link">
            <?php belfast_post_nav(); ?>
         </div>  
        <?php endif; ?>

       

    </div>

</article><!-- #post -->

