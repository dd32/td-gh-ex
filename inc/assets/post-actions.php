<?php
/*-----------------------------------------------------------------
 * SINGLE POST
-----------------------------------------------------------------*/
add_action( 'igthemes_single_post', 'igthemes_post_header', 10 );
add_action( 'igthemes_single_post', 'igthemes_post_content', 20 );
add_action( 'igthemes_single_post', 'igthemes_post_footer', 30 );

/*-----------------------------------------------------------------
 * POST HEADER
-----------------------------------------------------------------*/
if ( ! function_exists( 'igthemes_loop_content_image' ) ) {
    function igthemes_loop_content_image($image) {
        $image = igthemes_post_thumbnail( 'full' );
        return $image;
    }
}
add_filter( 'igthemes_loop_content_images', 'igthemes_loop_content_image' );

if ( ! function_exists( 'igthemes_post_header' ) ) {
	// start function
    function igthemes_post_header() { ?>

 	  <header class="entry-header">
		<?php
			if ( is_single() ) {
                igthemes_post_thumbnail( 'full' );
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
                apply_filters( 'igthemes_loop_content_images', 'igthemes_loop_content_image' ); 
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php igthemes_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
          
	   </header><!-- .entry-header -->
   <?php }
}
/*-----------------------------------------------------------------
 * POST CONTENT
-----------------------------------------------------------------*/
if ( ! function_exists( 'igthemes_loop_content_post' ) ) {
    function igthemes_loop_content_post($excerpt) {
        $excerpt = the_excerpt();
        return $excerpt;
    }
}
add_filter( 'igthemes_loop_content_posts', 'igthemes_loop_content_post' );

if ( ! function_exists( 'igthemes_post_content' ) ) {
	// start function
	function igthemes_post_content() {  ?>

		<div class="entry-content">
        <?php
            if ( is_singular() ) {
			 
            the_content( sprintf(
                /* translators: %s: Name of current post. */
                wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'base-wp' ), array( 'span' => array( 'class' => array() ) ) ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ) );

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'base-wp' ),
                'after'  => '</div>',
            ) );
		  }
        else { 
            apply_filters( 'igthemes_loop_content_posts', 'igthemes_loop_content_post' ); 
        } 
        ?>
		</div><!-- .entry-content -->

    <?php  } 
}


/*-----------------------------------------------------------------
 * POST FOOTER
-----------------------------------------------------------------*/
if ( ! function_exists( 'igthemes_post_footer' ) ) {
	// start function
	function igthemes_post_footer() { ?>
	<footer class="entry-footer">
		<?php igthemes_entry_footer(); ?>
	</footer><!-- .entry-footer -->
<?php }
}