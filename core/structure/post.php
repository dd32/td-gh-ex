<?php
/**
 * Template functions used for the site posts.
 */
//PAGE HEADER
if ( ! function_exists( 'igthemes_post_header' ) ) {
    function igthemes_post_header() { ?>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php igthemes_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
    <?php  }
}
//PAGE CONTENT
if ( ! function_exists( 'igthemes_post_content' ) ) {
    function igthemes_post_content() { ?>
    <?php if ( has_post_thumbnail() & is_single()) { 
        the_post_thumbnail(); 
    } else { 
    if(igthemes_option('featured_image')==false) :?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail( 'large', array( 'itemprop' => 'image', 'class' => 'featured-img' ) ); ?>
        </a>
    <?php endif;
           } ?>
	<div class="entry-content">
		<?php 
            if(!is_singular() && igthemes_option('show_excerpt')==true) {
                the_excerpt();
            } else {
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'basic-shop' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'basic-shop' ),
                    'after'  => '</div>',
                ) );
            }
		?>
	</div><!-- .entry-content -->
    <?php  }
}
//PAGE FOOTER
if ( ! function_exists( 'igthemes_post_footer' ) ) {
    function igthemes_post_footer() { ?>
	<footer class="entry-footer">
		<?php igthemes_entry_footer(); ?>
	</footer><!-- .entry-footer -->
    <?php  }
}