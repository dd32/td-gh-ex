    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="post-header">
            <h1 class="post-title"><?php the_title(); ?></h1>
        </header>
        <div class="post-content">
            <?php the_content();
            wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'content' ), 'after' => '</div>' ) ); ?>
        </div>
        <footer class="post-meta">
            <?php edit_post_link( __( 'Edit', 'content' ), '<span class="edit-link">', '</span>' ); ?>
        </footer>
    </article>