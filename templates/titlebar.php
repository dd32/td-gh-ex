<?php if ( !is_front_page() ) : ?>
    
    <header class="entry-header">
        
        <?php if ( is_home() ) : ?>
            
            <?php echo '<h1 class="entry-title">' . get_theme_mod( 'kra-blog-title', false ) . '</h1>'; ?>
            
        <?php else: ?>
            
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            
        <?php endif; ?>
        
    </header><!-- .entry-header -->

<?php endif; ?>