    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post-header">
            <header>
                <h1><?php the_author(); ?></h1>
                <h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'content' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php echo get_the_date(); ?></a></h2>
            </header>
            <?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'Content_status_avatar', '48' ) ); ?>
        </div>
        <div class="post-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'content' ) ); ?>
        </div>
        <footer class="post-meta">
            <?php if ( comments_open() ) : ?>
            <div class="comments-link">
                <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'content' ) . '</span>', __( '1 Reply', 'content' ), __( '% Replies', 'content' ) ); ?>
            </div>
            <?php endif;
            edit_post_link( __( 'Edit', 'content' ), '<span class="edit-link">', '</span>' ); ?>
        </footer>
    </article>