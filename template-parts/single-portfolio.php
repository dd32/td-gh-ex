
<?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="post-header">
                <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->

            <div class="post-content">

                <div class="entry-content">
                    <?php the_content(); ?>
                    <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'absolutte' ),
                            'after'  => '</div>',
                        ));
                    ?>
                </div><!-- .entry-content -->

                <div class="clearfix"></div>

                <?php if( has_term( '', get_post_type() . '_category', $post->ID ) || has_term( '', get_post_type() . '_tag', $post->ID ) ): ?>
                <footer class="entry-footer">
        			<div class="metadata">
                        <ul>
                            <?php if( has_term( '', get_post_type() . '_category', $post->ID ) ){ ?>
                            <li class="meta_categories">
                                <?php esc_html_e( 'Category:', 'absolutte' );?>
                                <?php echo get_the_term_list( $post->ID, get_post_type() . '_category', '', ' ' ); ?>
                            </li>
                            <?php } ?>
                            <?php if( has_term( '', get_post_type() . '_tag', $post->ID ) ){ ?>
                            <li class="meta_tags">
                                <?php esc_html_e( 'Tags:', 'absolutte' );?>
                                <?php echo get_the_term_list( $post->ID, get_post_type() . '_tag', '', ', ' ); ?>
                            </li>
                            <?php } ?>
                        </ul>
        	            <div class="clearfix"></div>
        	        </div><!-- /metadata -->
        	    </footer><!-- .entry-footer -->
                <?php endif; ?>

            </div><!-- /post_content -->

        </article><!-- #post-## -->

        <?php absolutte_post_navigation(); ?>

    <?php endwhile; // End of the loop.?>