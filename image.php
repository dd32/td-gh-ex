<?php
/**
* The template for displaying image attachments
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Aguafuerte
* @since Aguafuerte 1.0.1
*/

// $aguafuerte_theme_options = aguafuerte_get_options( 'aguafuerte_theme_options' );
get_header(); ?>

<div class="inner">
    <div id="main-content">

        <?php while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>            

                <div class="entry-meta">
                    <span class="attachment-meta">

                        <?php 
                        $post_title = get_the_title( $post->post_parent );

                        if ( empty( $post_title ) || 0 == $post->post_parent )
                            printf('<time class="entry-date" datetime="%1$s">%2$s</time>', esc_attr( get_the_date('c')), esc_html(get_the_date()));

                        else {

                        // Translators: There is a space after "on".
                        _e('Published on ','aguafuerte');
                        printf('<time class="entry-date" datetime="%1$s">%2$s</time>', esc_attr( get_the_date('c')), esc_html(get_the_date()));

                        // Translators: There is a space before and after "in".
                        _e( ' in ', 'aguafuerte');

                        printf('<a href="%1$s" title="'.__('Return to:', 'aguafuerte').' %2$s" rel="gallery">%3$s</a>',
                            esc_url(get_permalink($post->post_parent)),
                            esc_attr( strip_tags($post_title)),
                            $post_title
                            );
                        }                            

                            $metadata = wp_get_attachment_metadata();
                            printf( '<span class="attachment-meta full-size-link"><a href="%1$s" title="%2$s">%3$s (%4$s &times; %5$s)</a></span>',
                                esc_url( wp_get_attachment_url() ),
                                esc_attr__( 'Link to full-size image', 'aguafuerte' ),
                                __( 'Full resolution', 'aguafuerte' ),
                                $metadata['width'],
                                $metadata['height']
                            );

                            edit_post_link( __( 'Edit', 'aguafuerte' ), '<span class="edit-link">', '</span>' );
                        ?>
                    </span>
                </div><!-- .entry-meta -->
            </header><!-- .entry-header -->                               

            <div class="entry-content">
                <nav id="image-navigation" class="navigation image-navigation">
                    <div class="nav-links">
                        <div class="nav-previous"><?php previous_image_link(false, '&larr;&nbsp; '.__('Previous', 'aguafuerte' ) ); ?></div>
                        <div class="nav-next"><?php next_image_link( false, __( 'Next', 'aguafuerte' ).' &nbsp; &rarr;' ); ?></div>
                    </div><!-- .nav-links -->
                </nav><!-- .image-navigation -->

                <div class="entry-attachment">
                    <?php
                        /**
                         * Filter the default Aguafuerte image attachment size.
                         * @since Aguafuerte 1.01
                         * @param string $image_size Image size. Default 'large'.
                         */
                        $image_size = apply_filters( 'aguafuerte_attachment_size', 'large');

                        echo wp_get_attachment_image( get_the_ID(), $image_size );
                    ?>

                    <?php if ( has_excerpt() ) : ?>
                        <div class="entry-caption">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-caption -->
                    <?php endif; ?>
                </div><!-- .entry-attachment -->

                <?php
                    the_content();
                    wp_link_pages( array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'aguafuerte' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'aguafuerte' ) . ' </span>%',
                        'separator'   => '<span class="screen-reader-text">, </span>',
                    ) );
                ?>
        
            </div><!-- .entry-content -->

        </article><!-- #post-## -->

        
        <?php endwhile; ?>   
    </div><!--/main-content-->
    <?php get_sidebar('sidebar'); ?>

</div><!--/inner-->
<?php get_footer(); ?>

