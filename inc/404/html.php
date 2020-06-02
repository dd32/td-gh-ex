<article id="title-image-content" class="404error" <?php post_class(); ?>>
            
        <header id="title-and-image">
            
            <video autoplay loop muted><source src="<?php $semper_fi_lite_404_video = absint ( get_theme_mod( '404_video_1' ) ); if ( $semper_fi_lite_404_video != '' ) { echo  esc_url( wp_get_attachment_url( $semper_fi_lite_404_video ) ); } else { echo esc_url( get_template_directory_uri() ) . '/inc/404/images/bradley-and-mousse-are-thirsty.mp4'; } ?>" type="video/mp4" /></video>
            
            <h2 class='header-text' itemprop="headline"><?php _e( '404 Error - Page Not Found' , 'semper-fi-lite' ); ?></h2>
            
        </header>
            
        <main id="the-article">

            <h3 class="post_title"><?php _e( "Oh No, we can't find what your looking for!" , 'semper-fi-lite' ); ?></h3>

            <p><?php _e( 'The 404 or Not Found error message is a HTTP standard response code indicating that the client was able to communicate with the server, but the server could not find what was requested.' , 'semper-fi-lite' ); ?></p>

            <p><?php _e( 'The web site hosting server will typically generate a "404 Not Found" web page when a user attempts to follow a broken or dead link; hence the 404 error is one of the most recognizable errors users can find on the web.' , 'semper-fi-lite' ); ?></p>

            <p><?php _e( 'A 404 error should not be confused with "server not found" or similar errors, in which a connection to the destination server could not be made at all. A 404 error indicates that the requested resource may be available again in the future; however, the fact does not guarantee the same content.' , 'semper-fi-lite' ); ?></p>

            <h4><?php _e( 'So what can we do?' , 'semper-fi-lite' ); ?></h4>

            <p><?php _e( 'For starters, you could just head to the' , 'semper-fi-lite' ); ?> <a href="<?php echo esc_url( home_url() );  ?>"><?php _e( 'home page' , 'semper-fi-lite' ); ?></a></p>
            
        </main>
            
<?php do_action('semper_fi_lite-categories-and-tags-single'); ?>

        <main id="the-article">

            <h3 class="post_title"><?php _e( 'Finally, you might try searching the database for what you are trying to find.' , 'semper-fi-lite' ) ?></h3>
            
            <?php get_search_form(); ?>
            
        </main>
    
    </article>
