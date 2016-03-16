<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bakes_And_Cakes
 */


global $post;
$bakes_and_cakes_sidebar_layout = '';

if( $post )
$bakes_and_cakes_sidebar_layout = get_post_meta( $post->ID, 'bakes_and_cakes_sidebar_layout', true ); 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

 <?php if( has_post_thumbnail() ){ ?>
        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
            <?php if( has_post_thumbnail() ){ ?>
                    <div class="post-thumbnail">
                         <?php ( is_active_sidebar( 'right-sidebar' ) && ( $bakes_and_cakes_sidebar_layout == 'right-sidebar' ) ) ? the_post_thumbnail( 'bakes-and-cakes-image' ) : the_post_thumbnail( 'bakes-and-cakes-image-full' ) ; ?>
                    </div>
            <?php }?>
        </a>
    <?php } ?>
    <div class="text-holder">
		<header class="entry-header">
			<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php bakes_and_cakes_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
		<?php 
			if( is_single() ){
                the_content( sprintf(
    				/* translators: %s: Name of current post. */
    				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bakes-and-cakes' ), array( 'span' => array( 'class' => array() ) ) ),
    				the_title( '<span class="screen-reader-text">"', '"</span>', false )
    			) );
            }else{
                if( false === get_post_format() ){
                    echo wpautop( bakes_and_cakes_excerpt( get_the_content(), 550, '.', false, false ) );
                }else{
                    the_content( sprintf(
        				/* translators: %s: Name of current post. */
        				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bakes-and-cakes' ), array( 'span' => array( 'class' => array() ) ) ),
        				the_title( '<span class="screen-reader-text">"', '"</span>', false )
        			) );
                }
            }

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bakes-and-cakes' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	
		<?php if( !is_single() ){ ?>
	    <footer class="entry-footer">
			<a href="<?php the_permalink(); ?>" class="readmore"><?php esc_html_e( 'Read More', 'bakes-and-cakes' ); ?></a>
		</footer><!-- .entry-footer -->
	    <?php }?>
	</div>

</article><!-- #post-## -->
