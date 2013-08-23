    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="post-header">
            <?php if ( ! is_sticky() ) : 
                the_post_thumbnail();
            endif;
            if ( is_single() ) : ?>
                <h2 class="post-title"><?php the_title(); ?></h2>
            <?php else : ?>
                <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'content' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <?php endif;
            if ( comments_open() ) : ?>
                <div class="comments-link">
                    <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'content' ) . '</span>', __( '1 Reply', 'content' ), __( '% Replies', 'content' ) ); ?>
                </div>
            <?php endif; ?>
        </header>
        <?php if ( is_home() && is_single() ) { ?>
            <div class="post-summary">
                <?php the_excerpt(); ?>
            </div>
        <?php } 
        if ( is_search() ) : ?>
            <div class="post-summary">
                <?php the_excerpt(); ?>
            </div>
        <?php else : ?>
        <div class="post-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'content' ));
            wp_link_pages( 
                array( 
                    'before' => '<div class="numbered-pagination">', 
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>'
                )
            ); ?>
        </div>
        <?php endif; ?>
        <footer class="post-meta">
            <?php content_entry_meta();
            edit_post_link( __( 'Edit', 'content' ), '<span class="edit-link">', '</span>' );
            if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
                <div class="author-info">
                    <div class="author-avatar">
                        <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'content_author_bio_avatcontent_size', 68 ) ); ?>
                    </div>
                    <div class="author-description">
                        <h2><?php printf( __( 'About %s', 'content' ), get_the_author() ); ?></h2>
                        <p><?php the_author_meta( 'description' ); ?></p>
                        <p class="author-link"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'content' ), get_the_author() ); ?></a></p>
                    </div>
                </div>
            <?php endif; ?>
        </footer>
    </article>